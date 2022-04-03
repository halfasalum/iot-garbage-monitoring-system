<?php
defined('BASEPATH') or exit('No direct script access allowed');

include "Base.php";

class Auth extends Base
{

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {

        if (isset($_POST['login'])) {
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required');
            if ($this->form_validation->run()) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $condition = array(
                    "username" => $username,
                    'user_status' => 1
                );
                $user = $this->get('tbl_users', $condition, null);
                if ($user) {
                    if (self::pass_compare($user->user_id, $user->password, $password)) {
                            $data = array(
                                'isLoggedIn' => true,
                                'lastLogin' => self::time(),
                                'fullName' => $user->user_fullname,
                                'user_id' => $user->user_id,
                                'image' => $user->user_image,
                                'company' => $user->user_company,
                                'managerial'    => $user->managerial
                            );
                            $this->session->set_userdata($data);
                        $condition = array('user_id' => $user->user_id);
                        $data = array('last_login' => self::time());
                        $this->updateV2('tbl_users', $condition, $data);

                        $this->log('LOGIN', "has login");
                        $this->modules();
                        redirect('Home');
                    } else {
                        $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => 'Invalid username or password.');
                    }
                } else {
                    $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => 'Invalid username or password.');
                }
            } else {
                $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => $this->formValidationErrors());
            }
        }
        if ($this->session->userdata('token_expire')) {
            $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => 'Reset link has expire.');
            $this->session->unset_userdata('token_expire');
        }
        if ($this->session->userdata('session_expire')) {
            $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => 'Your session has expire. Please log in.');
            $this->session->unset_userdata('session_expire');
        }
        if ($this->session->userdata('token_null')) {
            $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => 'Your action is not allowed.');
            $this->session->unset_userdata('token_null');
        }
        if ($this->session->userdata('reset_success')) {
            $this->page_data['message'] = array('class' => 'success', 'header' => 'Success !', 'description' => 'Your password is successful updated. Please log in.');
            $this->session->unset_userdata('reset_success');
        }
        if ($this->session->userdata('company_registration')) {
            $this->page_data['message'] = array('class' => 'success', 'header' => 'Success !', 'description' => 'Your company and account is successful registered. Please log in.');
            $this->session->unset_userdata('company_registration');
        }
        $this->page_data['page'] = 'auth/login.php';
        $this->renderPage($this->page_data);
    }

    public function account()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('a_password', 'password', 'trim|required|min_length[8]|matches[re_password]');
            $this->form_validation->set_rules('re_password', 're password', 'trim|required|min_length[8]');
            if ($this->form_validation->run()) {
                $data = array(
                    'company_name' => $this->input->post('c_name'),
                    'company_phone' => $this->input->post('c_phone'),
                    'company_email' => $this->input->post('c_email'),
                    'company_address' => $this->input->post('c_address'),
                    'company_created' => self::time()
                );
                $companyId                  = $this->insert('tbl_companies',$data);
                $data = array(
                    'username' => $this->input->post('a_username'),
                    'user_email' => $this->input->post('a_email'),
                    'user_company' => $companyId
                );
                $user_id = $this->insert('tbl_users', $data);
                $password = $this->input->post('a_password');
                $username = $this->input->post('a_username');
                $email    = $this->input->post('a_email');
                $message                    = $this->registrationTemplate('client',$username,$password);
                $this->sendEmail($email,$message,'REGISTRATION');
                $password = $user_id . $password;
                $hash = password_hash($password, PASSWORD_BCRYPT);
                $condition = array('user_id' => $user_id);
                $data = array('password' => $hash);
                $this->updateV2('tbl_users', $condition, $data);
                $condition = array('role_status' => 1, 'system_reserved' => 1,'role_company'=>0,'is_default'=>1);
                $role = $this->get('tbl_role', $condition, null);
                if (isset($role)) {
                        $data = array('user_id' => $user_id, 'role_id' => $role->role_id);
                        $this->insert('tbl_user_role', $data);
                }
                $subscription           = $this->input->post('package');
                if ($subscription == 1){
                    $data							= array(
                        'company_id'				=>$companyId
                    );
                    $this->insert('tbl_daily_config',$data);
                    $data							= array(
                        'company_id'				=>$companyId
                    );
                    $this->insert('tbl_company_config',$data);
                    $condition						= array('subscription_id'=>$subscription);
                    $subscription					= $this->get('tbl_subscription',$condition,null);
                    $month							= $subscription->months;
                    $subscriptionStart				= date('Y-m-d');
                    $subscriptionEnd				= date('Y-m-d',strtotime($subscriptionStart . " +$month months"));
                    $sms							= $subscription->sms;
                    $users							= $subscription->users;
                    $branches						= $subscription->branches;
                    $zones							= $subscription->zones;
                    $customers						= $subscription->customers;
                    $data							= array(
                        'company_id'				=> $companyId,
                        'license_id'				=> $companyId,
                        'subscription_id'			=> $subscription->subscription_id,
                        'sms_offered'				=> $sms,
                        'branch_offered'			=> $branches,
                        'zones_offered'				=> $zones,
                        'users_offered'				=> $users,
                        'customers_offered'			=> $customers,
                        'sub_start'					=> $subscriptionStart,
                        'sub_end'					=> $subscriptionEnd,
                    );
                    $company_subscription			= $this->insert('tbl_company_subscription',$data);

                    $data				= array(
                        'user_id'		=> $user_id,
                        'company'		=> $this->input->post('c_name'),
                        'company_id'	=> $companyId,
                        'email'			=> $this->input->post('a_email'),
                        'last_login'	=> self::time(),
                        'login'			=> TRUE
                    );
                    $this->session->set_userdata($data);
                    redirect('Home');
                }else{
                    //modules for payment
                }
            } else {
                $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => $this->formValidationErrors());
            }
        }
        $this->page_data['page'] = 'auth/account.php';
        $this->renderPage($this->page_data);
    }

    public function company()
    {
        if (isset($_POST['register'])) {
            $this->form_validation->set_rules('companyName', 'company name', 'trim|required');
            $this->form_validation->set_rules('companyAddress', 'company address', 'trim|required');
            $this->form_validation->set_rules('fullName', 'full name', 'trim|required');
            $this->form_validation->set_rules('email', 'account email', 'trim|required');
            $this->form_validation->set_rules('phone', 'account phone', 'trim|required');
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required|matches[re-password]|min_length[8]');
            $this->form_validation->set_rules('re-password', 're-password', 'trim|required|min_length[8]');
            if ($this->form_validation->run()) {
                $condition = array('company_name' => $this->input->post('companyName'), 'company_status' => 1);
                if (sizeof($this->get('tbl_companies', $condition, true)) == 0) {
                    $username = $this->input->post('username');
                    $condition = array('username' => $username, 'userStatus' => 1);
                    if (sizeof($this->get('tbl_users', $condition, true)) == 0) {
                        $username = $this->input->post('username');
                        $condition = array('username' => $username, 'userStatus' => 1);
                        if (sizeof($this->get('tbl_users', $condition, true)) == 0) {
                            $data = array('company_name' => $this->input->post('companyName'), 'company_address' => $this->input->post('companyAddress'), 'company_created' => self::time());
                            $company_id = $this->insert('tbl_companies', $data);
                            $data = array('fullName' => $this->input->post('fullName'), 'email' => $this->input->post('email'), 'phone' => $this->input->post('phone'), 'user_company' => $company_id);
                            $user_id = $this->insert('tbl_users', $data);
                            $password = $this->input->post('password');
                            $password = $user_id . $password;
                            $hash = password_hash($password, PASSWORD_BCRYPT);
                            $condition = array('user_id' => $user_id);
                            $data = array('username' => $username, 'password' => $hash);
                            $this->updateV2('tbl_users', $condition, $data);
                            $condition = array('role_status' => 1, 'is_global' => 1);
                            $roles = $this->get('tbl_role', $condition, true);
                            if (isset($roles)) {
                                foreach ($roles as $role) {
                                    $data = array('user_id' => $user_id, 'role_id' => $role->role_id);
                                    $this->insert('tbl_user_role', $data);
                                }
                            }
                            $this->session->set_userdata('company_registration', true);
                            redirect('Auth');
                        } else {
                            $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => 'Email address already registered');
                        }
                    } else {
                        $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => 'Username already registered');
                    }
                } else {
                    $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => 'Company already registered');
                }
            } else {
                $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => $this->formValidationErrors());
            }
        }
        $this->page_data['button'] = '<button type="submit" class="btn btn-alt-primary" name="register"><i class="fa fa-plus mr-10"></i> Register Company</button>';
        $this->page_data['page'] = 'auth/company.php';
        $this->renderPage($this->page_data);
    }

    public function validateCompany()
    {
        $error = null;
        $this->form_validation->set_rules('c_name', 'company name', 'trim|required|min_length[3]');
        if ($this->form_validation->run()) {
            $condition = array('company_name' => $this->input->post('c_name'), 'company_status' => 1);
            $company = $this->get('tbl_companies', $condition, true);
            if (sizeof($company) > 0) {
                $error = "Company is already registered";
            }
        } else {
            $error = $this->formValidationErrors();
        }
        echo json_encode(array("status" => TRUE, 'feedback' => $error));
    }

    public function validateEmail()
    {
        $error = null;
        $this->form_validation->set_rules('c_email', 'company email', 'trim|required|min_length[3]');
        if ($this->form_validation->run()) {
            $condition = array('company_email' => $this->input->post('c_email'), 'company_status' => 1);
            $company = $this->get('tbl_companies', $condition, true);
            if (sizeof($company) > 0) {
                $error = "Company email is already registered";
            }
        } else {
            $error = $this->formValidationErrors();
        }
        echo json_encode(array("status" => TRUE, 'feedback' => $error));
    }

    public function validateAccountEmail()
    {
        $error = null;
        $this->form_validation->set_rules('a_email', 'administrator email', 'trim|required|min_length[3]');
        if ($this->form_validation->run()) {
            $condition = array('user_email' => $this->input->post('a_email'), 'user_status' => 1);
            $company = $this->get('tbl_users', $condition, true);
            if (sizeof($company) > 0) {
                $error = "Administrator email is already registered";
            }
        } else {
            $error = $this->formValidationErrors();
        }
        echo json_encode(array("status" => TRUE, 'feedback' => $error));
    }

    public function validateAccountUsername()
    {
        $error = null;
        $this->form_validation->set_rules('a_username', 'administrator username', 'trim|required|min_length[3]');
        if ($this->form_validation->run()) {
            $condition = array('username' => $this->input->post('a_username'), 'user_status' => 1);
            $company = $this->get('tbl_users', $condition, true);
            if (sizeof($company) > 0) {
                $error = "Administrator username is already registered";
            }
        } else {
            $error = $this->formValidationErrors();
        }
        echo json_encode(array("status" => TRUE, 'feedback' => $error));
    }

    public function packageSelection()
    {
        $error = null;
        $package = null;
        $this->form_validation->set_rules('package', 'subscription package', 'trim|required');
        if ($this->form_validation->run()) {
            $condition = array('subscription_id' => $this->input->post('package'));
            $subscription = $this->get('tbl_subscription', $condition, null);
            if (isset($subscription) && $subscription != null) {
                $package = '
                <a class="block block-rounded text-center" href="javascript:void(0)">
                                            <div class="block-content bg-primary">
                                                <div class="h1 font-w700 mb-5 text-white">0 TZS</div>
                                                <div class="h5 text-muted text-white-op">1 month</div>
                                            </div>
                                            <div class="block-content">
                                                <p><strong>1</strong> Branch</p>
                                                <p><strong>2</strong> Zones</p>
                                                <p><strong>50</strong> Customers</p>
                                                <p><strong>5</strong> Users</p>
                                                <p><strong>3 Months</strong> Support</p>
                                            </div>
                                        </a>
                ';
            } else {
                $error = "An error occurred while getting package details";
            }
        } else {
            $error = $this->formValidationErrors();
        }
        echo json_encode(array("status" => TRUE, 'feedback' => $error, 'package' => $package));
    }

    public function lock()
    {
        if (!$this->session->userdata('isLoggedIn')) {
            $this->session->set_userdata('session_expire', true);
            redirect('Auth');
        }
        $lock = $this->session->set_userdata('lock', TRUE);
        if (isset($_POST['unLock'])) {
            $this->form_validation->set_rules('password', 'password', 'required|trim');
            if ($this->form_validation->run()) {
                $user_id = $this->session->userdata('user_id');
                $password = $this->input->post('password');
                $condition = array(
                    "user_id" => $user_id
                );
                $user = $this->get('tbl_users', $condition, null);
                if ($user) {
                    if (self::pass_compare($user->user_id, $user->password, $password)) {
                        $data = array(
                            'isLoggedIn' => true,
                            'lastLogin' => self::time(),
                            'fullName' => $user->user_fullname,
                            'user_id' => $user->user_id,
                            'image' => $user->user_image,
                            'company' => $user->user_company,
                        );
                        $this->session->set_userdata($data);
                        $condition = array('user_id' => $user->user_id);
                        $data = array('last_login' => self::time());
                        $this->updateV2('tbl_users', $condition, $data);

                        $this->log('LOGIN', "has login from lock screen");
                        $this->modules();
                        $this->session->unset_userdata('lock');
                        redirect('Home');
                    } else {
                        $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => 'Invalid password.');
                    }
                } else {
                    $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => 'User not found. Please log in');
                }
            } else {
                $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => $this->formValidationErrors());
            }
        }
        $this->page_data['page'] = 'auth/lock.php';
        $this->renderPage($this->page_data);
    }

    public function forgot()
    {
        if (isset($_POST['forget'])) {
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $username = $this->input->post('username');
                $condition = array('username' => $username);
                $details = $this->get('tbl_users', $condition, null);
                if ($details) {
                    $token = rand(111111, 999999);
                    $message = '<p>Please use the link below to reset your password</p><p>' . anchor("Auth/token/$token", '<strong>Click here to reset your password</strong>', array('target' => '_blank')) . '</p>';
                    $data = array('pass_token' => $token, 'token_inserted' => self::time());
                    $this->update('tbl_users', 'user_id', $details->user_id, $data);
                    $this->sendEmail($details->user_email, $message, 'RESET PASSWORD');
                    $this->page_data['message'] = array("class" => "success", "header" => "Success !", "description" => 'Reset link has been sent to your email');
                } else {
                    $this->page_data['message'] = array("class" => "danger", "header" => "Error !", "description" => 'User account not found');
                }
            } else {
                $this->page_data['message'] = array("class" => "danger", "header" => "Error !", "description" => $this->formValidationErrors());
            }
        }
        $this->page_data['page'] = 'auth/forgot.php';
        $this->renderPage($this->page_data);
    }

    public function register()
    {
        $this->page_data['verify'] = TRUE;
        $this->page_data['button'] = '<button type="submit" class="btn btn-alt-primary" name="register"><i class="fa fa-plus mr-10"></i> Get Registered</button>';
        if (isset($_POST['register'])) {
            $email = $this->input->post('email');
            $this->form_validation->set_rules('email', 'email', 'trim|required');
            if ($this->form_validation->run()) {
                $condition = array('user_email' => $email);
                $account = $this->get('tbl_users', $condition, true);
                if (sizeof($account) == 0) {
                    $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => 'An account with the provided email is not found');
                } else {
                    if (is_null($account->username)) {
                        $this->page_data['verify'] = FALSE;
                        $this->page_data['account'] = $account;
                        $this->page_data['button'] = '<button type="submit" class="btn btn-alt-primary" name="update"><i class="fa fa-edit mr-10"></i> Update Information</button>';
                    } else {
                        $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => 'An account with the provided email is already registered');
                    }
                }
            } else {
                $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => $this->formValidationErrors());
            }
        }

        if (isset($_POST['update'])) {
            $this->page_data['button'] = '<button type="submit" class="btn btn-alt-primary" name="update"><i class="fa fa-edit mr-10"></i> Update Information</button>';
            $this->page_data['verify'] = FALSE;
            $email = $this->input->post('userId');
            $condition = array('user_email' => $email);
            $account = $this->get('tbl_users', $condition, null);
            $this->page_data['account'] = $account;
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required|matches[re-password]|min_length[8]');
            $this->form_validation->set_rules('re-password', 're-password', 'trim|required|min_length[8]');
            if ($this->form_validation->run()) {
                $username = $this->input->post('username');
                $condition = array('username' => $username, 'userStatus' => 1);
                if (sizeof($this->get('tbl_users', $condition, true)) == 0) {
                    $password = $this->input->post('password');
                    $password = $account->user_id . $password;
                    $hash = password_hash($password, PASSWORD_BCRYPT);
                    $condition = array('user_id' => $account->user_id);
                    $data = array('username' => $username, 'password' => $hash);
                    $this->updateV2('tbl_users', $condition, $data);
                    $condition = array('role_status' => 1, 'is_default' => 1, 'role_company' => $account->user_company);
                    $roles = $this->get('tbl_role', $condition, true);
                    if (isset($roles)) {
                        foreach ($roles as $role) {
                            $data = array('user_id' => $account->user_id, 'role_id' => $role->role_id);
                            $this->insert('tbl_user_role', $data);
                        }
                    }
                    $this->page_data['message'] = array('class' => 'success', 'header' => 'Success !', 'description' => 'Your account is successful activated. Please Sign in');
                    $this->page_data['verify'] = TRUE;
                    $this->page_data['button'] = '<button type="submit" class="btn btn-alt-primary" name="register"><i class="fa fa-plus mr-10"></i> Get Registered</button>';
                } else {
                    $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => 'Username you choose is already used');
                }
            } else {
                $this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => $this->formValidationErrors());
            }
        }
        $this->page_data['page'] = 'auth/register.php';
        $this->renderPage($this->page_data);
    }

    public function verify()
    {

    }

    public function token($token = null)
    {
        if ($token == null) {
            $this->session->set_userdata('token_null', true);
            redirect("Auth");
        }
        $condition = array('pass_token' => $token);
        $details = $this->get('tbl_users', $condition, null);
        if ($details) {
            $now = self::time();
            $now = strtotime($now);

            $token_time = $details->token_inserted;
            $token_time = strtotime($token_time);
            if (round(abs($now - $token_time) / 60) <= 120) {
                if (isset($_POST['reset'])) {
                    $this->form_validation->set_rules('password', 'password', 'trim|required|matches[re-password]|min_length[8]');
                    $this->form_validation->set_rules('re-password', 're-password', 'trim|required|min_length[8]');
                    if ($this->form_validation->run() == TRUE) {
                        $password = $this->input->post('password');
                        $password = $details->user_id . $password;
                        $hash = password_hash($password, PASSWORD_BCRYPT);
                        $data = array("password" => $hash, 'pass_token' => NULL, 'token_inserted' => NULL);
                        $this->update('tbl_users', 'user_id', $details->user_id, $data);
                        $this->session->set_userdata('reset_success', true);
                        redirect("Auth");
                    } else {
                        $this->page_data['message'] = array("class" => "danger", 'header' => 'Error !', "description" => $this->formValidationErrors());
                    }
                }
                $this->page_data['page'] = 'auth/resetPassword.php';
                $this->renderPage($this->page_data);
            } else {
                redirect("Auth");
            }
        } else {
            $this->session->set_userdata('token_expire', true);
            redirect("Auth");
        }
    }

    public function signOut()
    {
        $this->log('LOG OUT', "has log out");
        $this->session->sess_destroy();
        redirect('Auth');
    }
}
