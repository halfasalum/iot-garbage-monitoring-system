<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Base extends CI_Controller
{

    //Global Variables
    public $page_data = [];

    public function __construct()
    {
        parent:: __construct();
        /*$lock					= $this->session->userdata('lock');
        if ($lock == TRUE) {
            $url					= $this->router->fetch_class().'/'.$this->router->fetch_method();
            if (is_null($url)){
                if (!is_null($this->uri->segment(3))) $url = $url.'/'.$this->uri->segment(3);
                if (!is_null($this->uri->segment(4))) $url = $url.'/'.$this->uri->segment(4);
                $this->session->set_userdata('url',$url);
            }
        }
        $url = $this->router->fetch_class() . '/' . $this->router->fetch_method();
        if (!is_null($this->uri->segment(3))) $url = $url . '/' . $this->uri->segment(3);
        if (!is_null($this->uri->segment(4))) $url = $url . '/' . $this->uri->segment(4);
        $this->page_data['class'] = $this->router->fetch_class();
        $this->session->set_userdata('url', $url);*/
    }

    /*
     * Render page
     */

    public static function phoneFormat($phone = null)
    {
        if ($phone == null) {
            return FALSE;
        } else {
            $phone = str_replace(array('(', ')', '-', ' '), '', $phone);
            $sub = substr($phone, 0, 1);
            $sub = 255;
            $phone = $sub . substr($phone, 1, 9);
            if (strlen($phone) == 12) {
                return $phone;
            } else {
                return FALSE;
            }
        }
    }

    /*
     * receiving updates from device
     * */

    public function trashState($number = 0, $status = 1){
        $condition          = array('device_number'=>$number);
        $data               = array('device_status'=>$status);
        $this->updateV2('tbl_trash',$condition,$data);
    }

    /*
     * Phone format
     */

    public static function pass_compare($id = null, $password = null, $user_pass = null)
    {
        if ($id == null || $password == null) {
            redirect("Auth");
        } else {
            if (password_verify(self::pass_encrypt($id, $user_pass), $password))
                return TRUE;
        }
    }

    public static function pass_encrypt($id = null, $password = null)
    {
        if ($id == null || $password == null) {
            redirect("Auth");
        } else {
            $password = $id . $password;
            if (password_hash($password, PASSWORD_BCRYPT))
                return $password;
        }
    }

    public function renderPage($page_data)
    {
        $role = $this->session->userdata('user_role');
        $this->page_data['nav'] = '';
        $this->page_data['nav'] = 'nav/' . $this->session->userdata('nav') . '.php';
        $this->page_data['header'] = 'common/__header.php';
        $this->page_data['footer'] = 'common/__footer.php';
        if ($this->router->fetch_class() == 'Auth') {
            $this->load->view('v2/index_auth', $this->page_data);
        } else {
            $this->load->view('v2/index_pages', $this->page_data);
        }
    }

    /*
     * Form validation
     */

    public function deleteFile($filename = null, $sfc_att_id = null, $state = FALSE)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        if (!is_null($filename)) {
            define('EXT', '.' . pathinfo(__FILE__, PATHINFO_EXTENSION));
            /*define('FCPATH', __FILE__);
            define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));*/
            define('PUBPATH', str_replace(SELF, '', FCPATH)); // added
            $path = PUBPATH . 'assets/img/' . $filename;
            $path = str_replace('/', '\\', $path);
            unlink($path);
        }
        if (!is_null($sfc_att_id)) {
            $data = array('att_status' => 2);
            $this->update('tbl_sfc_attachments', 'sfc_att_id', $sfc_att_id, $data);
            if ($state == TRUE) {
                echo json_encode(array('status' => TRUE));
            }
        }

    }

    /*
     * Users Logs
     */

    public function update($table = null, $identifier = null, $value = null, $data = null)
    {
        if ($table == null || $data == null) {
            //display error
        }
        $this->BaseModel->update($table, $identifier, $value, $data);
        $passwordExpire = $this->session->userdata('passwordExpire');
        if (!is_null($passwordExpire))
            $this->session->unset_userdata('passwordExpire');
    }

    /*
     * SendEmail
     */

    public function formValidationErrors()
    {
        $errors = $this->form_validation->error_array();
        if (sizeof($errors) > 0) {
            $indxErr = array();
            foreach ($errors as $err) {
                $indxErr[] = $err;
            }
            return $indxErr[0];
        }
    }

    /*
     * Compare user password
     */

    public function log($activity = null, $description = null)
    {
        $userId = $this->session->userdata('user_id');
        $name = $this->session->userdata('fullName');

        $data = array(
            'log_action' => $activity,
            'log_description' => $name . ' ' . $description,
            'log_browser' => $this->agent->browser() . ' - ' . $this->agent->version(),
            'log_ip' => $this->input->ip_address(),
            'log_time' => self::time(),
            'log_user' => $userId,
            'log_platform' => $this->agent->platform(),
            'log_company' => $this->session->userdata('company'),
        );
        $this->insert('tbl_users_logs', $data);

    }

    /*
     * Encrypt user password
     */

    public static function time()
    {
        return date('Y-m-d H:i:s');
    }

    /*
     * Upload files
     */

    public function insert($table = null, $data = null)
    {
        if ($table == null || $data == null) {
            //Display php error;
        }
        return $this->BaseModel->insert($table, $data);
    }

    /*
     * User Log In
     */

    function uploadImage($target_file, $attr)
    {
        $target_file = addslashes($target_file);
        $target_file = str_replace(' ', '_', $target_file);
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
        $config['max_size'] = 10240; // Can be set to particular file size , here it is 4 MB(4096 Kb)
        $config['overwrite'] = true;
        $config['remove_spaces'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($attr)) {
            show_error($this->upload->display_errors());
        } else {
            return $target_file;
        }
    }

    /*
     * User Log Out
     */

    public function login($ajax = true)
    {
        $userId = $this->session->userdata('user_id');
        $data = array('isOnline' => 1);
        $this->update('tbl_users', 'userId', $userId, $data);
        if ($ajax == true) {
            echo json_encode(array('status', $ajax));
        }
    }

    /*
     * Audit Trial
     */

    public function logOut($ajax = true)
    {
        $userId = $this->session->userdata('user_id');
        $data = array('last_login' => self::time());
        $this->update('tbl_users', 'user_id', $userId, $data);
        if ($ajax == true) {
            echo json_encode(array('status', $ajax));
        }
    }

    /*
     * Lock Account
     */

    public function auditTrial()
    {
        return $this->BaseModel->audit();
    }

    /*
     * Lock Screen
     */

    public function lock()
    {
        $lock = $this->session->userdata('lock');
        if ($lock != TRUE) {
            $this->session->set_userdata('lock', TRUE);
        }
        echo json_encode(array('status' => TRUE));
    }

    /*
     * Download file
     */

    public function lockScreen()
    {
        $lock = $this->session->userdata('lock');
        if ($lock == TRUE) {

            if (isset($_POST['unLock'])) {
                $password = sha1($this->input->post('password'));
                $userId = $this->session->userdata('user_id');
                $condition = 'userId = ' . $userId . ' AND password = ' . $this->db->escape($password);
                $validate = $this->get('tbl_users', $condition, null);
                if ($validate) {
                    $condition = "roleId = " . $validate->userRole . " and roleStatus = 1";
                    $role = $this->get('tbl_system_roles', $condition, null);
                    $lock = $this->session->unset_userdata('lock');
                    $url = $this->session->userdata('url');
                    redirect($url);
                    /*$url			= $this->session->userdata('url');
                    redirect($url);*/
                } else {
                    $this->page_data['message'] = array('class' => 'danger', 'Incorrect password');
                }
            }
            $this->page_data['page_name'] = 'Lock Screen';
            $this->page_data['header'] = 'modules/common/__header.php';
            $this->page_data['footer'] = 'modules/common/__footer.php';
            $this->page_data['page'] = 'login/lock.php';
            $this->load->view('index', $this->page_data);
        } else {
            redirect('Auth');
        }

    }


    /*
     * Password generate
     */

    public function download($file = null)
    {
        if ($file == null) {
            redirect('Auth');
        }
        $this->load->helper('download');
        force_download('./assets/img/' . $file, NULL);
    }

    /*
     * Module controls
     */

    public function password_generate($staff_id = null, $password = null, $role = null, $username = null)
    {
        $data = array("password" => $password, 'user_ref' => $staff_id, 'username' => $username, 'login_role' => $role, 'login_status' => 1, 'last_login' => self::time());
        $user = $this->insert('tbl_login', $data);
        if ($user) {
            $pass = $user . $password;
            //$hash 			= ;
            $data = array("password" => password_hash($pass, PASSWORD_BCRYPT));
            $this->update('tbl_login', 'login_id', $user, $data);
            return TRUE;
        } else {
            $return = FALSE;
        }

    }

    /*
     * Company branches nd
     */

    public function moduleControls($id = null)
    {
        if ($id > 0) {
            $condition = array('role_id' => $id, 'role_control_status' => 1);
            $roleControls = $this->get('tbl_role_control', $condition, true);
            $data = array();
            foreach ($roleControls as $roleControl) {
                $data[] = $roleControl->control_id;
            }
        }
        $control = '';
        if ($this->session->userdata('managerial')) {
            $condition = array('module_status' => 1);
        } else {
            $condition = array('module_status' => 1, 'is_global' => 1);
        }

        $modules = $this->get('tbl_module', $condition, true);
        if (isset($modules)) {
            foreach ($modules as $module) {
                $control .= '<li class="dd-item" data-id="11">
														<div class="dd-handle">
															<i class="fa fa-cog mr-5"></i> ' . $module->module_desc . '</div>';

                $condition = array('module_id' => $module->module_id);
                $moduleControls = $this->get('tbl_module_control', $condition, true);
                if (isset($moduleControls)) {
                    $control .= '<ol class="dd-list">';
                    foreach ($moduleControls as $moduleControl) {
                        $selected = '';
                        if (isset($data)) {
                            if (in_array($moduleControl->control_id, $data)) {
                                $selected = 'checked';
                            }
                        }

                        $control .= '
						<li class="dd-item" data-id="12">
							<div>
								<input type="checkbox" value="' . $moduleControl->control_id . '" name="control[]" ' . $selected . '> ' . $moduleControl->control_name . '
							</div>									
						</li>';
                    }
                    $control .= '</ol>';
                }
                $control .= '</li>';
            }
        }
        return $control;
    }

    public function companyBranch($id = null)
    {
        if ($id > 0) {
            $condition = array('role_id' => $id, 'role_control_status' => 1);
            $roleControls = $this->get('tbl_role_control', $condition, true);
            $data = array();
            foreach ($roleControls as $roleControl) {
                $data[] = $roleControl->control_id;
            }
        }
        $control = '';
        if ($this->session->userdata('managerial')) {
            $condition = array('module_status' => 1);
        } else {
            $condition = array('module_status' => 1, 'is_global' => 1);
        }

        $modules = $this->get('tbl_module', $condition, true);
        if (isset($modules)) {
            foreach ($modules as $module) {
                $control .= '<li class="dd-item" data-id="11">
														<div class="dd-handle">
															<i class="fa fa-cog mr-5"></i> ' . $module->module_desc . '</div>';

                $condition = array('module_id' => $module->module_id);
                $moduleControls = $this->get('tbl_module_control', $condition, true);
                if (isset($moduleControls)) {
                    $control .= '<ol class="dd-list">';
                    foreach ($moduleControls as $moduleControl) {
                        $selected = '';
                        if (isset($data)) {
                            if (in_array($moduleControl->control_id, $data)) {
                                $selected = 'checked';
                            }
                        }

                        $control .= '
						<li class="dd-item" data-id="12">
							<div>
								<input type="checkbox" value="' . $moduleControl->control_id . '" name="control[]" ' . $selected . '> ' . $moduleControl->control_name . '
							</div>									
						</li>';
                    }
                    $control .= '</ol>';
                }
                $control .= '</li>';
            }
        }
        return $control;
    }

    /*
     * User modules
     */

    public function companyBranchesZones($id)
    {
        if ($id > 0) {
            $condition = array('officer_id' => $id, 'officer_zone_status' => 1);
            $officerZones = $this->get('tbl_officer_zone', $condition, true);

            $condition = array('officer_id' => $id, 'officer_branch_status' => 1);
            $officerBranches = $this->get('tbl_officer_branch', $condition, true);
            $dataZone = array();
            $dataBranch = array();
            foreach ($officerZones as $officerZone) {
                $dataZone[] = $officerZone->zone_id;
            }

            foreach ($officerBranches as $officerBranch) {
                $dataBranch[] = $officerBranch->branch_id;
            }
        }
        $zone = '';
        if ($this->session->userdata('managerial')) {
            $condition = array('module_status' => 1);
        } else {
            $condition = array('module_status' => 1, 'is_global' => 1);
        }
        $condition = array('branch_status !=' => 4, 'branch_company' => $this->session->userdata('company'));
        $branches = $this->get('tbl_branch', $condition, true);
        if (isset($branches)) {
            foreach ($branches as $branch) {
                $selectedBranch = '';
                if (isset($dataBranch)) {
                    if (in_array($branch->branch_id, $dataBranch)) {
                        $selectedBranch = 'checked';
                    }
                }
                $zone .= '<li class="dd-item" data-id="11">
														<div class="dd-handle">
															<div>
								<input type="checkbox" value="' . $branch->branch_id . '" name="branch[]" ' . $selectedBranch . '> ' . $branch->branch_name . '
							</div>
															</div>';

                $condition = array('zone_branch' => $branch->branch_id);
                $moduleControls = $this->get('tbl_zone', $condition, true);
                if (isset($moduleControls)) {
                    $zone .= '<ol class="dd-list">';
                    foreach ($moduleControls as $moduleControl) {
                        $selected = '';
                        if (isset($dataZone)) {
                            if (in_array($moduleControl->zone_id, $dataZone)) {
                                $selected = 'checked';
                            }
                        }

                        $zone .= '
						<li class="dd-item" data-id="12">
							<div>
								<input type="checkbox" value="' . $moduleControl->zone_id . '" name="zone[]" ' . $selected . '> ' . $moduleControl->zone_name . '
							</div>									
						</li>';
                    }
                    $zone .= '</ol>';
                }
                $zone .= '</li>';
            }
        }
        return $zone;
    }

    public function modules($userId = null)
    {
        $array = array();
        $array_1 = array();
        !is_null($userId) ?: $userId = $this->session->userdata('user_id');
        $role = '';
        $condition = array('user_id' => $userId, 'user_role_status' => 1);
        $assignedRoles = $this->get('tbl_user_role', $condition, true);
        if (isset($assignedRoles)) {
            foreach ($assignedRoles as $assignedRole) {
                $condition = array('role_id' => $assignedRole->role_id, 'role_control_status' => 1);
                $join = 'tbl_module_control';
                $value = 'tbl_role_control.control_id = tbl_module_control.control_id';
                $array_1 = $this->get('tbl_role_control', $condition, true, $join, $value);
                $array = array_merge($array, $array_1);
            }
            //var_dump($array);
            $arrayItem = array();
            $controls = array();
            foreach ($array as $item) {
                //$items		= array_push($arrayItem,$item->module_id);
                $arrayItem[] = $item->module_id;
                $controls[] = $item->control_id;
                //echo $item->module_id.'<br>';
            }
            $this->session->set_userdata('controls', $controls);
            $modules = array_unique($arrayItem);
            foreach ($modules as $module) {
                $condition = array('module_id' => $module, 'module_status' => 1);
                $moduleDetail = $this->get('tbl_module', $condition, null);
                if ($moduleDetail) {
                    $role .= '
			<div class="col-6 col-md-4 col-xl-2">
				<a class="block block-link-shadow text-center" href="' . site_url($moduleDetail->module_class) . '" data-toggle="popover" title="' . $moduleDetail->module_desc . ' Info" data-placement="top" data-content="' . $moduleDetail->module_tooltip . '" >
					<div class="block-content">
						<p class="mt-5">
							<i class="si ' . $moduleDetail->module_icon . ' fa-3x"></i>
						</p>
						<p class="font-w600">' . $moduleDetail->module_desc . '</p>
					</div>
				</a>
			</div>
			';
                }

            }
        } else {
            $role .= '
			<div class="col-6 col-md-4 col-xl-2">
				<a class="block block-link-shadow text-center" href="#">
					<div class="block-content">
						<p class="mt-5">
							<i class="si si-ban fa-3x"></i>
						</p>
						<p class="font-w600">No Module</p>
					</div>
				</a>
			</div>
			';
        }
        $this->session->set_userdata('modules', $role);
        //echo $role;
    }

    public function loanEnd($process = null)
    {
        $error = null;
        /*$nextDay			= date('Y-m-d');
        $today				= date('Y-m-d');
        $today				= strtotime($today);*/
        $amount = str_replace(array(',', '.00'), '', $this->input->post('totalLoan'));
        $startingDate1 = $this->input->post('startingDate');
        $start = $this->input->post('startingDate');
        $dayOfToday = date('D', strtotime($start));
        $startingDate = strtotime($startingDate1);
        if ($dayOfToday != 'Sun' || $dayOfToday != 'Sat') {
            $startingDate1 = date('Y-m-d', strtotime($startingDate1 . ' -1 day'));
            $condition = array('company_id' => $this->session->userdata('company'));
            $settings = $this->get('tbl_company_config', $condition, null);

            $period = $this->input->post('loanPeriod');
            $returnType = $this->input->post('returnType');
            $schedule = self::returnCalendar($amount, $period, $returnType, $startingDate1, $process);

            if ($returnType == 2) {
                $days = $period * 7;
                for ($i = 1; $i <= $days; $i++) {
                    $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +1 day'));
                    if ($settings->skip_weekend == 1) {
                        $day = date('D', strtotime($nextDay));
                        if ($day == 'Sat') {
                            $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +3 day'));
                        } elseif ($day == 'Sun') {
                            $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +2 day'));
                        }
                    }
                    $startingDate1 = $nextDay;
                }

            } elseif ($returnType == 3) {
                $weeks = $period;
                for ($i = 1; $i <= $weeks; $i++) {
                    $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +1 week'));
                    if ($settings->skip_weekend == 1) {
                        $day = date('D', strtotime($nextDay));
                        if ($day == 'Sat') {
                            $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +3 day'));
                        } elseif ($day == 'Sun') {
                            $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +2 day'));
                        }
                    }
                    $startingDate1 = $nextDay;
                }

            } elseif ($returnType == 4) {
                $months = $period / 4;
                for ($i = 1; $i <= $months; $i++) {
                    $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +1 months'));
                    if ($settings->skip_weekend == 1) {
                        $day = date('D', strtotime($nextDay));
                        if ($day == 'Sat') {
                            $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +3 day'));
                        } elseif ($day == 'Sun') {
                            $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +2 day'));
                        }
                    }
                    $startingDate1 = $nextDay;
                }
            } else {
                for ($i = 1; $i <= $settings->collection_days; $i++) {
                    $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +1 day'));
                    if ($settings->skip_weekend == 1) {
                        $day = date('D', strtotime($nextDay));
                        if ($day == 'Sat') {
                            $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +3 day'));
                        } elseif ($day == 'Sun') {
                            $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +2 day'));
                        }
                    }
                    $startingDate1 = $nextDay;
                }
            }

        } else {
            $error = 'Loan should not start on weekend';
        }

        echo json_encode(array('error' => $error, 'endingDate' => $nextDay, 'schedule' => $schedule));
    }

    private function returnCalendar($totalLoan = 0, $period = null, $returnType = null, $loan_start = null, $process = false)
    {
        $table = '';
        $condition = array('company_id' => $this->session->userdata('company'));
        $settings = $this->get('tbl_company_config', $condition, null);
        $condition = array('customer_id' => $this->input->post('customer'));
        $customer = $this->get('tbl_customers', $condition, null);
        $returnAmount = 0;
        if ($totalLoan > 0) {

            $table .= "<div class='row mb-5'>";
            $table .= "<div class='col-md-6'><button type='button' class='btn btn-block btn-primary rounded-sm' id='processLoan' value='1'> Process Loan</button></div>";
            $table .= "<div class='col-md-6'><button type='button' class='btn btn-block btn-dark rounded-sm'> Download Returns</button></div>";
            $table .= "</div>";
            $table .= "<table class='table table-hover table-sm table-bordered'>";
            $table .= "<thead>";
            $table .= "<tr>";
            $table .= "<td>SN</td>";
            $table .= "<td>DATE</td>";
            $table .= "<td>AMOUNT</td>";
            $table .= "</tr>";
            $table .= "</thead>";
            $table .= "<tbody>";

            $startingDate1 = $loan_start;
            $start = $loan_start;
            $dayOfToday = date('D', strtotime($start));
            $sum_return = 0;
            $return = $totalLoan;
            if ($period > 0) {

                if ($returnType == 2) {
                    $remain = $totalLoan;
                    $days = $period * 7;
                    $perDay = round($totalLoan / $days, 0, PHP_ROUND_HALF_UP);

                    if ($process) {
                        $loan_id = self::newLoan($customer, $totalLoan, $returnType, $period);
                    }


                    for ($i = 1; $i <= $days; $i++) {
                        $remain -= $perDay;
                        if ($i == $days) {
                            $perDay += $remain;
                        }
                        $sum_return += $perDay;

                        $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +1 day'));
                        $nextDay_1 = date('D, d M Y', strtotime($startingDate1 . ' +1 day'));
                        if ($settings->skip_weekend == 1) {
                            $day = date('D', strtotime($nextDay));
                            if ($day == 'Sat') {
                                $nextDay_1 = date('D, d M Y', strtotime($startingDate1 . ' +3 day'));
                                $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +3 day'));
                            } elseif ($day == 'Sun') {
                                $nextDay_1 = date('D, d M Y', strtotime($startingDate1 . ' +2 day'));
                                $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +2 day'));
                            }
                        }
                        $startingDate1 = $nextDay;

                        $table .= "<tr>";
                        $table .= "<td>$i</td>";
                        $table .= "<td>$nextDay_1</td>";
                        $table .= "<td>" . number_format($perDay, 2) . "</td>";
                        $table .= "</tr>";

                        if ($process) {

                            self::customerReturn($customer, $nextDay, $perDay, $loan_id);

                            if ($i == $days) {
                                self::lastReturn($loan_id, $settings, $customer);
                            }
                        }

                    }

                } elseif ($returnType == 3) {
                    $weeks = $period;

                    $months = $period / 4;
                    $perDay = $totalLoan / $months;
                    $remain = $totalLoan;

                    if ($process) {

                        $loan_id = self::newLoan($customer, $totalLoan, $returnType, $period);
                    }

                    for ($i = 1; $i <= $weeks; $i++) {

                        $remain -= $perDay;
                        if ($i == $months) {
                            $perDay = $remain + $perDay;
                        }

                        $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +1 week'));
                        $nextDay_1 = date('D, d M Y', strtotime($startingDate1 . ' +1 week'));
                        if ($settings->skip_weekend == 1) {
                            $day = date('D', strtotime($nextDay));
                            if ($day == 'Sat') {
                                $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +3 day'));
                                $nextDay_1 = date('D, d M Y', strtotime($startingDate1 . ' +3 day'));
                            } elseif ($day == 'Sun') {
                                $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +2 day'));
                                $nextDay_1 = date('D, d M Y', strtotime($startingDate1 . ' +2 day'));
                            }
                        }
                        $startingDate1 = $nextDay;
                        $table .= "<tr>";
                        $table .= "<td>$i</td>";
                        $table .= "<td>$nextDay_1</td>";
                        $table .= "<td>0</td>";
                        $table .= "</tr>";

                        if ($process) {

                            self::customerReturn($customer, $nextDay, $perDay, $loan_id);

                            if ($i == $months) {
                                self::lastReturn($loan_id, $settings, $customer);
                            }
                        }

                    }

                } elseif ($returnType == 4) {
                    $months = $period / 4;
                    $perDay = $totalLoan / $months;
                    $remain = $totalLoan;
                    if ($process) {

                        $loan_id = self::newLoan($customer, $totalLoan, $returnType, $period);
                    }
                    for ($i = 1; $i <= $months; $i++) {

                        $remain -= $perDay;
                        if ($i == $months) {
                            $perDay = $remain + $perDay;
                        }

                        $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +1 month'));
                        $nextDay_1 = date('D, d M Y', strtotime($startingDate1 . ' +1 month'));
                        if ($settings->skip_weekend == 1) {
                            $day = date('D', strtotime($nextDay));
                            if ($day == 'Sat') {
                                $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +3 day'));
                                $nextDay_1 = date('D, d M Y', strtotime($startingDate1 . ' +3 day'));
                            } elseif ($day == 'Sun') {
                                $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +2 day'));
                                $nextDay_1 = date('D, d M Y', strtotime($startingDate1 . ' +2 day'));
                            }
                        }
                        $startingDate1 = $nextDay;
                        $table .= "<tr>";
                        $table .= "<td>$i</td>";
                        $table .= "<td>$nextDay_1</td>";
                        $table .= "<td>" . number_format($perDay, 2) . "</td>";
                        $table .= "</tr>";

                        if ($process) {

                            self::customerReturn($customer, $nextDay, $perDay, $loan_id);

                            if ($i == $months) {
                                self::lastReturn($loan_id, $settings, $customer);
                            }
                        }

                    }
                } else {
                    //reserved
                }

            } else {
                $days = $settings->collection_days;
                $perDay = $totalLoan / $days;
                $remain = $totalLoan;

                if ($process) {
                    $data = array(
                        'customer' => $customer->customer_id,
                        'loan_amount' => str_replace(array(',', '.00'), '', $this->input->post('loanAmount')),
                        'loan_interest_amount' => str_replace(array(',', '.00'), '', $this->input->post('loanInterest')),
                        'loan_total_amount' => $totalLoan,
                        'loan_balance' => $totalLoan,
                        'company_id' => $customer->customer_company,
                        'branch_id' => $customer->customer_branch,
                        'zone_id' => $customer->customer_zone,
                        'officer_id' => $this->session->userdata('user_id'),
                        'requested_date' => date('Y-m-d'),
                        'starting_date' => $this->input->post('startingDate'),
                        'ending_date' => $this->input->post('endingDate'),
                        'loan_stage_approval' => 1,
                        'loan_period' => $period,
                        'return_type' => $returnType,
                    );
                    $loan_id = self::newLoan($customer, $totalLoan, $returnType, $period);
                }


                for ($i = 1; $i <= $settings->collection_days; $i++) {
                    $remain -= $perDay;
                    if ($i == $settings->collection_days) {
                        $perDay = $remain + $perDay;
                    }
                    $nextDay_1 = date('D, d M Y', strtotime($startingDate1 . ' +1 day'));
                    $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +1 day'));
                    if ($settings->skip_weekend == 1) {
                        $day = date('D', strtotime($nextDay));
                        if ($day == 'Sat') {
                            $nextDay_1 = date('D, d M Y', strtotime($startingDate1 . ' +3 day'));
                            $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +3 day'));
                        } elseif ($day == 'Sun') {
                            $nextDay_1 = date('D, d M Y', strtotime($startingDate1 . ' +2 day'));
                            $nextDay = date('Y-m-d', strtotime($startingDate1 . ' +2 day'));
                        }
                    }
                    $startingDate1 = $nextDay;
                    $table .= "<tr>";
                    $table .= "<td>$i</td>";
                    $table .= "<td>$nextDay_1</td>";
                    $table .= "<td>" . number_format($perDay, 2) . "</td>";
                    $table .= "</tr>";

                    if ($process) {

                        self::customerReturn($customer, $nextDay, $perDay, $loan_id);

                        if ($i == $settings->collection_days) {
                            self::lastReturn($loan_id, $settings, $customer);
                        }
                    }

                }

            }
            $table .= "</tbody>";
            $table .= "</table>";
        }
        return $table;
    }

    protected function newLoan($customer = null, $totalLoan = 0, $returnType = null, $period = null)
    {
        $data = array(
            'customer' => $customer->customer_id,
            'loan_amount' => str_replace(array(',', '.00'), '', $this->input->post('loanAmount')),
            'loan_interest_amount' => str_replace(array(',', '.00'), '', $this->input->post('loanInterest')),
            'loan_total_amount' => $totalLoan,
            'loan_balance' => $totalLoan,
            'company_id' => $customer->customer_company,
            'branch_id' => $customer->customer_branch,
            'zone_id' => $customer->customer_zone,
            'officer_id' => $this->session->userdata('user_id'),
            'requested_date' => date('Y-m-d'),
            'starting_date' => $this->input->post('startingDate'),
            'ending_date' => $this->input->post('endingDate'),
            'loan_stage_approval' => 1,
            'loan_period' => $period,
            'return_type' => $returnType,
        );
        return $this->insert('tbl_loans', $data);
    }

    protected function customerReturn($customer = null, $nextDay = nulll, $perDay = null, $loan_id = null)
    {
        $data = array(
            'return_customer' => $customer->customer_id,
            'return_date' => $nextDay,
            'target_amount' => $perDay,
            'company_id' => $customer->customer_company,
            'branch_id' => $customer->customer_branch,
            'zone_id' => $customer->customer_zone,
            'return_officer' => $this->session->userdata('user_id'),
            'loan' => $loan_id,
        );
        $this->insert('tbl_customer_loan_returns', $data);
    }

    protected function lastReturn($loan_id = null, $settings = null, $customer = null)
    {
        $condition = array('loan_id' => $loan_id);
        if ($settings->loan_request_approval) {
            $data = array('loan_status' => 11, 'loan_stage_approval' => 1, 'loan_number' => date('dmy') . $loan_id);
        } else {
            $data = array('loan_status' => 11, 'loan_stage_approval' => 2, 'loan_number' => date('dmy') . $loan_id);
        }
        $this->updateV2('tbl_loans', $condition, $data);
        /*$condition          = array('customer_id'=>$customer->customer_id);
        $data               = array('last_loan'=>$loan_id);
        $this->updateV2('tbl_customers',$condition,$data);*/
    }

    public function updateV2($table = null, $condition = null, $data = null)
    {
        if ($table == null || $data == null) {
            //display error
        }
        $this->BaseModel->updateV2($table, $condition, $data);
        $passwordExpire = $this->session->userdata('passwordExpire');
        if (!is_null($passwordExpire))
            $this->session->unset_userdata('passwordExpire');
    }

    public function loanInterest($period = null)
    {
        $error = null;
        $condition = array('company_id' => $this->session->userdata('company'));
        $settings = $this->get('tbl_company_config', $condition, null);
        $amount = str_replace(array(',', '.00'), '', $this->input->post('loanAmount'));
        $total = 0;
        $interest = 0;
        $return = 0;
        $period = $this->input->post('loanPeriod');
        if ($period > 0) {
            $returnType = $this->input->post('returnType');
            if ($returnType == 2) {
                $days = $period * 7;
                if ($period > 3) {
                    $months = $period / 4;
                    $interest = ($months * $settings->loan_interest * $amount) / 100;
                } else {
                    $interest = $settings->loan_interest * $amount / 100;
                }
                $total = $amount + $interest;
                $return = $total / $days;
                $return = round($return, 0, PHP_ROUND_HALF_UP);
            } elseif ($returnType == 3) {
                $months = $period / 4;
                $interest = ($months * $settings->loan_interest * $amount) / 100;
                $total = $amount + $interest;
                $return = $total / $period;
                $return = round($return, 0, PHP_ROUND_HALF_UP);
            } elseif ($returnType == 4) {
                $months = $period / 4;
                $interest = ($months * $settings->loan_interest * $amount) / 100;
                $total = $amount + $interest;
                $return = $total / $months;
                $return = round($return, 0, PHP_ROUND_HALF_UP);
            }
        } else {

            $interest = $settings->loan_interest * $amount / 100;
            $total = $amount + $interest;
            $return = $total / $settings->collection_days;
        }
        echo json_encode(array('error' => $error, 'interest' => number_format($interest, 2), 'total' => number_format($total, 2), 'returns' => number_format($return, 2)));
    }

    public function transaction_handle($transaction_id = 123, $ref_num = 345, $transaction_number = 978, $transaction_amount = 18750, $transaction_loan = "02032211")
    {
        if (!is_null($transaction_id)) {
            $condition = array('loan_number' => $transaction_loan);
            $loan = $this->get('tbl_loans', $condition, null);
            if ($loan) {
                $data = array(
                    'ref_number' => $ref_num,
                    'transaction_number' => $transaction_id,
                    'transaction_amount' => $transaction_amount,
                    'transaction_loan' => $transaction_loan,
                    'transaction_date' => self::time(),
                    'transaction_company' => $loan->company_id,
                );
                $transaction = $this->insert('tbl_transactions', $data);
                $condition = array(
                    'loan' => $loan->loan_id,
                    'return_date' => date('Y-m-d'),
                    'is_collected' => 1,
                    'loan_return_status !=' => 4
                );
                $join = 'tbl_loans';
                $value = 'tbl_loans.loan_id = tbl_customer_loan_returns.loan';
                $join1 = 'tbl_customers';
                $value1 = 'tbl_customers.customer_id = tbl_customer_loan_returns.return_customer';
                $return = $this->get('tbl_customer_loan_returns', $condition, null, $join, $value, $join1, $value1);
                $customer_phone = $return->customer_phone;
                $target = $return->target_amount;
                $count = round($transaction_amount / $target, 0);
                if ($count > 1) {
                    $condition = array(
                        'loan' => $loan->loan_id,
                        'return_date >' => date('Y-m-d'),
                        'is_collected' => 1,
                        'loan_return_status !=' => 4
                    );
                    $returns = $this->get('tbl_customer_loan_returns', $condition, true);
                    if (sizeof($returns) > 0) {
                        foreach ($returns as $return) {
                            $i = 1;
                            if ($i <= $count) {
                                $condition = array(
                                    'loan_return_id' => $return->loan_return_id
                                );
                                $data = array(
                                    'loan_return_status' => 9,
                                    'is_collected' => 0,
                                    'supervisor_approve' => 3,
                                    'is_accepted' => 1,
                                );
                                $this->updateV2('tbl_customer_loan_returns', $condition, $data);
                                $i++;
                            } else {
                                break;
                            }
                        }

                    }
                }
                $condition = array(
                    'loan' => $loan->loan_id,
                    'return_date' => date('Y-m-d'),
                    'is_collected' => 1,
                    'loan_return_status' => 8,
                );
                var_dump($condition);
                $data = array(
                    'returned_amount' => $transaction_amount,
                    'loan_return_status' => 9,
                    'ref_transaction' => $transaction,
                    'isTransaction' => 1,
                );
                $this->updateV2('tbl_customer_loan_returns', $condition, $data);
                $message = "Kiasi cha shilingi : $transaction_amount, kimepokelewa katika akaunti yako.";
                //self::sendSms($customer_phone,$message);
            }
        }
    }

    public function returnCalculation($return_id = null, $returnData = false)
    {
        $target = 0;
        $collected = 0;
        $balance = 0;
        $condition = array('officer_return_id' => $return_id);
        $return = $this->get('tbl_officer_loan_returns', $condition, null);
        if ($return) {
            $join = 'tbl_customers';
            $value = 'tbl_customers.customer_id = tbl_customer_loan_returns.return_customer';
            $join1 = 'tbl_loans';
            $value1 = 'tbl_loans.loan_id = tbl_customer_loan_returns.loan';
            $condition = array('return_officer' => $return->collection_officer, 'is_collected' => 1, 'loan_return_status !=' => 4, 'return_date' => $return->officer_return_date, 'loan_status' => 7);
            $customers = $this->get('tbl_customer_loan_returns', $condition, true, $join, $value, $join1, $value1);
            if (sizeof($customers) > 0) {
                foreach ($customers as $customer) {
                    $target += $customer->target_amount;
                    $collected += $customer->returned_amount;
                }
                $balance = $target - $collected;
            }

            if ($returnData) {
                return array('status' => true, 'target' => number_format($target, 2), 'collected' => number_format($collected, 2), 'balance' => number_format($balance, 2));
            }else{
                echo json_encode(array('status' => true, 'target' => number_format($target, 2), 'collected' => number_format($collected, 2), 'balance' => number_format($balance, 2)));
            }
        }
    }

    protected function pastSeven()
    {

        $jsonArray = array();
        $jsonArrayItem = array();
        $end = date('Y-m-d', strtotime(date('Y-m-d') . ' -1 day'));
        $start = date('Y-m-d', strtotime($end . ' -7 day'));

        $condition = array('officer_return_date' => $start, 'officer_return_status != ' => 4, 'officer_return_date <=' => $end, 'company_id' => $this->session->userdata('company'));
        $returns = $this->get('tbl_officer_loan_returns', $condition, true);
        if (sizeof($returns) > 0){
            foreach ($returns as $return) {
                $jsonArrayItem['Label'] = date('d-M-y', strtotime($return->officer_return_date));
                $jsonArrayItem['Value'] = $return->collected_amount;
            }
        }

        array_push($jsonArray, $jsonArrayItem);

        $chartConfigObj = array("chart" =>
            array(
                "caption" => "Past 7 days collections",
                //"subcaption"=> "NET INCOME : ".$this->netIncome($start,$end),
                "xAxisName" => "Date",
                "yAxisName" => "Sale",
                "numberSuffix" => " TZS",
                "exportEnabled" => "1",
                "showvalues" => "1",
                "theme" => "fusion",
                "anchorbgcolor" => "#72D7B2",
                "palettecolors" => "#72D7B2"
            )
        );
        $chartConfigObj["data"] = $jsonArray;


        //set the response content type as JSON
        //header('Content-type:application/json');
        $chartData = json_encode($chartConfigObj);
        return $chartData;
    }

    public function dueDate()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $date = $this->input->post('saleDate');

        $dueDate = date('Y-m-d', strtotime($date . ' +15 day'));

        echo json_encode(array('status' => TRUE, 'due' => $dueDate));
    }

    public function dueSales()
    {
        $amount = 0;
        $condition = array('sale_status  ' => 9, 'sale_company' => $this->session->userdata('company'));
        $dues = $this->get('tbl_sale', $condition, true);
        if (sizeof($dues) > 0) {
            foreach ($dues as $due) {
                $amount += $due->sale_total - $due->sale_paid;
            }
        }
        return number_format($amount, 2);
    }

    public function todaySales()
    {
        $amount = 0;
        $condition = array('sale_date ' => date('Y-m-d'), 'sale_status !=' => 4, 'sale_company' => $this->session->userdata('company'));
        $sales = $this->get('tbl_sale', $condition, true);
        if (sizeof($sales) > 0) {
            foreach ($sales as $sale) {
                $amount += $sale->sale_paid;
            }
        }
        return $amount;
    }

    public function todayExpenses()
    {
        $amount = 0;
        $condition = array('expense_date ' => date('Y-m-d'), 'expense_status' => 1, 'expense_company' => $this->session->userdata('company'));
        $sales = $this->get('tbl_expense', $condition, true);
        if (sizeof($sales) > 0) {
            foreach ($sales as $sale) {
                $amount += $sale->expense_amount;
            }
        }
        return $amount;
    }

    public function monthExpenses()
    {
        $amount = 0;
        $condition = array('expense_date >= ' => date('Y-m-01'), 'expense_date <=' => date('Y-m-d'), 'expense_status' => 1, 'expense_company' => $this->session->userdata('company'));
        $expenses = $this->get('tbl_expense', $condition, true);
        if (sizeof($expenses) > 0) {
            foreach ($expenses as $expense) {
                $amount += $expense->expense_amount;
            }
        }
        return $amount;
    }

    public function runService()
    {
        $now = date('H:i');
        $condition = array('service_status' => 1, 'service_run >=' => date('H:i:00'));
        $join = 'tbl_service_type';
        $value = 'tbl_service_type.type_id = tbl_services.service_type';
        $services = $this->get('tbl_services', $condition, true, $join, $value);
        if (sizeof($services) > 0) {
            foreach ($services as $service) {
                if ($now == date('H:i', strtotime($service->service_run))) {
                    $serviceKey = $service->type_id;
                    $serviceCompany = $service->service_company;
                    self::serviceSelector($serviceKey, $serviceCompany);
                    $condition = array('service_id' => $service->service_id);
                    $data = array('service_last_run' => self::time());
                    $this->updateV2('tbl_services', $condition, $data);
                }
            }
        }
    }

    protected function serviceSelector($serviceKey = 0, $company = null)
    {
        switch ($serviceKey) {
            case 1:
                self::BackupDatabase();
                break;
            case 2:
                self::dailyCollection($company);
                break;
            default:
                echo "Nothing to do";
        }
    }

    protected function BackupDatabase()
    {
        $this->load->dbutil();

        $prefs = array(
            'format' => 'zip',
            'filename' => 'QL - ' . date('Y-m-d H-i-sa'), '.sql'
        );
        $backup = $this->dbutil->backup($prefs);

        $db_name = 'QL - ' . date("Y-m-d-H-i-s") . '.zip';
        $save = 'assets/backup/' . $db_name;

        $this->load->helper('file');
        write_file($save, $backup);
        $message = 'QL Backup is successful taken on ' . date('Y-m-d');
        $this->sendEmail('zemburetheson@gmail.com', $message, 'Backup Notification', $save);
    }

    public function sendEmail($receiver = null, $message = null, $subject = null, $attach = null)
    {
        $this->load->library('email');
        $settings = $this->get('tbl_settings');
        $config = array(
            'protocol' => 'SMTP',
            'smtp_host' => $settings->smtpHost,
            'smtp_port' => $settings->smtpPort,
            'smtp_user' => $settings->smtpUser,
            'smtp_pass' => $settings->smtpPass,
            'charset' => 'utf-8',
            'wordwrap' => TRUE,
            'newline' => "\r\n",
            'crlf' => "\r\n",
            'mailtype' => 'html',
            //'starttls'  				=> TRUE,
            'priority' => 3
        );
        $this->email->initialize($config);
        $this->load->library('email', $config);
        $this->email->from('info@ahbab.co.tz', 'INFO');
        $this->email->to($receiver);
        $this->email->subject($subject);
        if (!is_null($attach))
            $this->email->attach($attach);
        $this->email->message($message);
        if (!$this->email->send()) {
            show_error($this->email->print_debugger());
        }
    }

    public function get($table = null, $condition = null, $multiple = null, $join_1 = null, $value_1 = null, $join_2 = null, $value_2 = null, $join_3 = null, $value_3 = null, $join_4 = null, $value_4 = null, $join_5 = null, $value_5 = null)
    {
        if ($table == null) {
            //display error
        }
        return $this->BaseModel->get($table, $condition, $multiple, $join_1, $value_1, $join_2, $value_2, $join_3, $value_3, $join_4, $value_4, $join_5, $value_5);
    }

    protected function dailyCollection($company_id = null, $date = null)
    {
        !is_null($date) ? $date : $date = date('Y-m-d');
        $condition = array('company_status' => 1, 'company_id !=' => 1, 'company_id' => $company_id);
        $companies = $this->get('tbl_companies', $condition, true);
        if (sizeof($companies) > 0) {
            foreach ($companies as $company) {
                $join = 'tbl_users';
                $value = 'tbl_users.user_id = tbl_officer_zone.officer_id';
                $condition = array('user_company' => $company->company_id, 'user_status' => 1);
                $officers = $this->get_distinct('tbl_officer_zone', 'officer_id', $condition, $join, $value);
                if (sizeof($officers) > 0) {
                    foreach ($officers as $officer) {
                        $join1 = 'tbl_zone';
                        $value1 = 'tbl_zone.zone_id = tbl_officer_zone.zone_id';
                        $condition = array('officer_id' => $officer->officer_id, 'officer_zone_status' => 1);
                        $zones = $this->get('tbl_officer_zone', $condition, true, $join1, $value1, $join, $value);
                        if (sizeof($zones) > 0) {
                            foreach ($zones as $zone) {
                                //$condition      = array('zone_id'=>$zone->zone_id,'return_officer'=>$officer->officer_id,'is_collected'=>1,'loan_return_status'=>8);
                                $join = 'tbl_loans';
                                $value = 'tbl_loans.loan_id = tbl_customer_loan_returns.loan';
                                $condition = array('tbl_customer_loan_returns.zone_id' => $zone->zone_id, 'return_officer' => $officer->officer_id, 'is_collected  ' => 1, 'loan_return_status' => 8, 'return_date' => $date, 'loan_status' => 7);
                                $customers = $this->get('tbl_customer_loan_returns', $condition, true, $join, $value);
                                if (sizeof($customers) > 0) {
                                    $target = 0;
                                    foreach ($customers as $customer) {
                                        //send sms to customer
                                        $condition = array('customer_id' => $customer->return_customer);
                                        $customer_data = $this->get('tbl_customers', $condition, null);
                                        $phone = $customer_data->customer_phone;
                                        $returnDate = $customer->return_date;
                                        $loanNumber = $customer->loan_number;
                                        $message = "Habari ndugu mteja, unakumbushwa kulipa rejesho lako la leo la tarehe : $returnDate. Nambari ya mkopo : $loanNumber";
                                        //self::sendSms($phone, $message);
                                        $target += $customer->target_amount;
                                    }
                                    $condition = array(
                                        'company_id' => $zone->user_company,
                                        'branch_id' => $zone->zone_branch,
                                        'zone_id' => $zone->zone_id,
                                        'officer_return_date' => $date,
                                        'collection_officer' => $officer->officer_id,
                                    );
                                    $isExist = $this->get('tbl_officer_loan_returns', $condition, true);
                                    if (sizeof($isExist) == 0) {
                                        $data = array(
                                            'target_amount' => $target,
                                            'company_id' => $zone->user_company,
                                            'branch_id' => $zone->zone_branch,
                                            'zone_id' => $zone->zone_id,
                                            'officer_return_date' => $date,
                                            'collection_officer' => $officer->officer_id,
                                        );
                                        $this->insert('tbl_officer_loan_returns', $data);
                                    }
                                }
                            }
                        }
                    }
                }
                $this->branch_collection($company->company_id, $date);
            }
        }

    }

    public function get_distinct($table = null, $column = null, $condition = null, $join_1 = null, $value_1 = null, $join_2 = null, $value_2 = null)
    {
        if ($table == null) {
            //display error
        }
        return $this->BaseModel->get_distinct($table, $column, $condition, $join_1, $value_1, $join_2, $value_2);
    }

    protected function sendSms($number = 255657183285, $message = null)
    {
        $api_key = 'c250d49436ffb9be';
        $secret_key = 'YTRkZTZiNDQ2OTI0NDNhYWNmOTM2MjY0YzBhYTA3NzUyMGIwZWM2OTQ3MWRlNzdhNDIxMmJmZmNmNzM3NTY3Nw==';


        $postData = array(
            'source_addr' => 'CMS',
            'encoding' => 0,
            'schedule_time' => '',
            'message' => "$message",
            'recipients' => [array('recipient_id' => '1', 'dest_addr' => "$number")]
        );

        $Url = 'https://apisms.beem.africa/v1/send';

        $ch = curl_init($Url);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));

        $response = curl_exec($ch);

        if ($response === FALSE) {
            echo $response;

            die(curl_error($ch));
        }
        //var_dump($response);
    }

    public function branch_collection($company = null, $date = null)
    {
        $condition = array('officer_return_status' => 8, 'officer_return_date' => $date);
        $branches = $this->get_distinct('tbl_officer_loan_returns', 'branch_id', $condition);
        if (sizeof($branches) > 0) {
            foreach ($branches as $branch) {
                $condition = array('branch_id' => $branch->branch_id, 'officer_return_status' => 8, 'officer_return_date' => $date);
                $branchReturns = $this->get('tbl_officer_loan_returns', $condition, true);
                if (sizeof($branchReturns) > 0) {
                    $target = 0;
                    foreach ($branchReturns as $branchReturn) {
                        $target += $branchReturn->target_amount;
                    }
                    $condition = array(
                        'company_id' => $company,
                        'branch_id' => $branch->branch_id,
                        'collection_date' => $date,
                    );
                    $isExist = $this->get('tbl_branch_returns', $condition, true);
                    if (sizeof($isExist) == 0) {
                        $data = array(
                            'target_amount' => $target,
                            'company_id' => $company,
                            'branch_id' => $branch->branch_id,
                            'collection_date' => $date,
                        );
                        $this->insert('tbl_branch_returns', $data);
                    }
                }
            }
        }
    }

    public function registrationTemplate($fullname = null, $username = null, $password = null)
    {
        $template = '
	   <!doctype html>
                <html>
                  <head>
                    <meta name="viewport" content="width=device-width" />
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <title>Registration</title>
                    <style>
                      /* -------------------------------------
                          GLOBAL RESETS
                      ------------------------------------- */
                      
                      /*All the styling goes here*/
                      
                      img {
                        border: none;
                        -ms-interpolation-mode: bicubic;
                        max-width: 100%; 
                      }
                
                      body {
                        background-color: #f6f6f6;
                        font-family: sans-serif;
                        -webkit-font-smoothing: antialiased;
                        font-size: 14px;
                        line-height: 1.4;
                        margin: 0;
                        padding: 0;
                        -ms-text-size-adjust: 100%;
                        -webkit-text-size-adjust: 100%; 
                      }
                
                      table {
                        border-collapse: separate;
                        mso-table-lspace: 0pt;
                        mso-table-rspace: 0pt;
                        width: 100%; }
                        table td {
                          font-family: sans-serif;
                          font-size: 14px;
                          vertical-align: top; 
                      }
                
                      /* -------------------------------------
                          BODY & CONTAINER
                      ------------------------------------- */
                
                      .body {
                        background-color: #f6f6f6;
                        width: 100%; 
                      }
                
                      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
                      .container {
                        display: block;
                        margin: 0 auto !important;
                        /* makes it centered */
                        max-width: 580px;
                        padding: 10px;
                        width: 580px; 
                      }
                
                      /* This should also be a block element, so that it will fill 100% of the .container */
                      .content {
                        box-sizing: border-box;
                        display: block;
                        margin: 0 auto;
                        max-width: 580px;
                        padding: 10px; 
                      }
                
                      /* -------------------------------------
                          HEADER, FOOTER, MAIN
                      ------------------------------------- */
                      .main {
                        background: #ffffff;
                        border-radius: 3px;
                        width: 100%; 
                      }
                
                      .wrapper {
                        box-sizing: border-box;
                        padding: 20px; 
                      }
                
                      .content-block {
                        padding-bottom: 10px;
                        padding-top: 10px;
                      }
                
                      .footer {
                        clear: both;
                        margin-top: 10px;
                        text-align: center;
                        width: 100%; 
                      }
                        .footer td,
                        .footer p,
                        .footer span,
                        .footer a {
                          color: #999999;
                          font-size: 12px;
                          text-align: center; 
                      }
                
                      /* -------------------------------------
                          TYPOGRAPHY
                      ------------------------------------- */
                      h1,
                      h2,
                      h3,
                      h4 {
                        color: #000000;
                        font-family: sans-serif;
                        font-weight: 400;
                        line-height: 1.4;
                        margin: 0;
                        margin-bottom: 30px; 
                      }
                
                      h1 {
                        font-size: 35px;
                        font-weight: 300;
                        text-align: center;
                        text-transform: capitalize; 
                      }
                
                      p,
                      ul,
                      ol {
                        font-family: sans-serif;
                        font-size: 14px;
                        font-weight: normal;
                        margin: 0;
                        margin-bottom: 15px; 
                      }
                        p li,
                        ul li,
                        ol li {
                          list-style-position: inside;
                          margin-left: 5px; 
                      }
                
                      a {
                        color: #3498db;
                        text-decoration: underline; 
                      }
                
                      /* -------------------------------------
                          BUTTONS
                      ------------------------------------- */
                      .btn {
                        box-sizing: border-box;
                        width: 100%; }
                        .btn > tbody > tr > td {
                          padding-bottom: 15px; }
                        .btn table {
                          width: auto; 
                      }
                        .btn table td {
                          background-color: #ffffff;
                          border-radius: 5px;
                          text-align: center; 
                      }
                        .btn a {
                          background-color: #ffffff;
                          border: solid 1px #3498db;
                          border-radius: 5px;
                          box-sizing: border-box;
                          color: #3498db;
                          cursor: pointer;
                          display: inline-block;
                          font-size: 14px;
                          font-weight: bold;
                          margin: 0;
                          padding: 12px 25px;
                          text-decoration: none;
                          text-transform: capitalize; 
                      }
                
                      .btn-primary table td {
                        background-color: #3498db; 
                      }
                
                      .btn-primary a {
                        background-color: #3498db;
                        border-color: #3498db;
                        color: #ffffff; 
                      }
                
                      /* -------------------------------------
                          OTHER STYLES THAT MIGHT BE USEFUL
                      ------------------------------------- */
                      .last {
                        margin-bottom: 0; 
                      }
                
                      .first {
                        margin-top: 0; 
                      }
                
                      .align-center {
                        text-align: center; 
                      }
                
                      .align-right {
                        text-align: right; 
                      }
                
                      .align-left {
                        text-align: left; 
                      }
                
                      .clear {
                        clear: both; 
                      }
                
                      .mt0 {
                        margin-top: 0; 
                      }
                
                      .mb0 {
                        margin-bottom: 0; 
                      }
                
                      .preheader {
                        color: transparent;
                        display: none;
                        height: 0;
                        max-height: 0;
                        max-width: 0;
                        opacity: 0;
                        overflow: hidden;
                        mso-hide: all;
                        visibility: hidden;
                        width: 0; 
                      }
                
                      .powered-by a {
                        text-decoration: none; 
                      }
                
                      hr {
                        border: 0;
                        border-bottom: 1px solid #f6f6f6;
                        margin: 20px 0; 
                      }
                
                      /* -------------------------------------
                          RESPONSIVE AND MOBILE FRIENDLY STYLES
                      ------------------------------------- */
                      @media only screen and (max-width: 620px) {
                        table[class=body] h1 {
                          font-size: 28px !important;
                          margin-bottom: 10px !important; 
                        }
                        table[class=body] p,
                        table[class=body] ul,
                        table[class=body] ol,
                        table[class=body] td,
                        table[class=body] span,
                        table[class=body] a {
                          font-size: 16px !important; 
                        }
                        table[class=body] .wrapper,
                        table[class=body] .article {
                          padding: 10px !important; 
                        }
                        table[class=body] .content {
                          padding: 0 !important; 
                        }
                        table[class=body] .container {
                          padding: 0 !important;
                          width: 100% !important; 
                        }
                        table[class=body] .main {
                          border-left-width: 0 !important;
                          border-radius: 0 !important;
                          border-right-width: 0 !important; 
                        }
                        table[class=body] .btn table {
                          width: 100% !important; 
                        }
                        table[class=body] .btn a {
                          width: 100% !important; 
                        }
                        table[class=body] .img-responsive {
                          height: auto !important;
                          max-width: 100% !important;
                          width: auto !important; 
                        }
                      }
                
                      /* -------------------------------------
                          PRESERVE THESE STYLES IN THE HEAD
                      ------------------------------------- */
                      @media all {
                        .ExternalClass {
                          width: 100%; 
                        }
                        .ExternalClass,
                        .ExternalClass p,
                        .ExternalClass span,
                        .ExternalClass font,
                        .ExternalClass td,
                        .ExternalClass div {
                          line-height: 100%; 
                        }
                        .apple-link a {
                          color: inherit !important;
                          font-family: inherit !important;
                          font-size: inherit !important;
                          font-weight: inherit !important;
                          line-height: inherit !important;
                          text-decoration: none !important; 
                        }
                        #MessageViewBody a {
                          color: inherit;
                          text-decoration: none;
                          font-size: inherit;
                          font-family: inherit;
                          font-weight: inherit;
                          line-height: inherit;
                        }
                        .btn-primary table td:hover {
                          background-color: #34495e !important; 
                        }
                        .btn-primary a:hover {
                          background-color: #34495e !important;
                          border-color: #34495e !important; 
                        } 
                      }
                
                    </style>
                  </head>
                  <body class="">
                    <!--span class="preheader">This is preheader text. Some clients will show this text as a preview.</span -->
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
                      <tr>
                        <td>&nbsp;</td>
                        <td class="container">
                          <div class="content">
                
                            <!-- START CENTERED WHITE CONTAINER -->
                            <table role="presentation" class="main">
                
                              <!-- START MAIN CONTENT AREA -->
                              <tr>
                                <td class="wrapper">
                                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td>
                                        <p>Dear ' . $fullname . ',</p>
                                        <p>Congratulation..!! You have successfully registered to TerminalX1 software.</p>
                                        <p>Use the descriptions below to sign in to your account. <b>Remember</b> for the privacy of your account do not share your password.</p>
                                        <p><b>Username: </b>' . $username . '<br><b>Password: </b>' . $password . '</p>
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                                          <tbody>
                                            <tr>
                                              <td align="left">
                                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                                  <tbody>
                                                    <tr>
                                                      <td> <a href="' . site_url('Auth') . '" target="_blank">Click here to sign-in</a> </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <p>For any glitches. Please feel free to contact us <br>| info@ahbab.co.tz | +255 657 183285 | +255 624 423285</p>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                
                            <!-- END MAIN CONTENT AREA -->
                            </table>
                            <!-- END CENTERED WHITE CONTAINER -->
                
                            <!-- START FOOTER -->
                            <div class="footer">
                              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td class="content-block">
                                    <span class="apple-link">All right reserved. Copyright &copy; ' . date('Y') . '</span>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="content-block powered-by">
                                    
                                  </td>
                                </tr>
                              </table>
                            </div>
                            <!-- END FOOTER -->
                
                          </div>
                        </td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                  </body>
                </html>
	    ';
        return $template;
    }

    protected function freeLoansCustomers($officer_id = null, $customer_id = null)
    {
        $customer = '';
        if (!is_null($officer_id)) {
            $condition = array('officer_id' => $officer_id, 'officer_zone_status' => 1);
            $join = 'tbl_zone';
            $value = 'tbl_zone.zone_id = tbl_officer_zone.zone_id';
            $zones = $this->get('tbl_officer_zone', $condition, true, $join, $value);
            if (sizeof($zones) > 0) {
                foreach ($zones as $zone) {
                    //$join               = 'tbl_loans';
                    //$value              = 'tbl_loans.loan_id = tbl_customers.last_loan';
                    $condition = array('customer_zone' => $zone->zone_id, 'customer_status' => 1, 'isTerminated' => 0);
                    $datas = $this->get('tbl_customers', $condition, true);
                    if (sizeof($datas) > 0) {
                        foreach ($datas as $data) {
                            $selected = '';
                            if ($data->customer_id == $customer_id) {
                                $selected = 'selected';
                            }
                            if ($data->last_loan != 1) {
                                $condition = array('customer' => $data->customer_id, 'loan_id >' => $data->last_loan, 'loan_status !=' => 4, 'loan_status !=' => 13);
                                $loans = $this->get('tbl_loans', $condition, true);
                                if (sizeof($loans) <= 0) {
                                    $customer .= '<option value="' . $data->customer_id . '" ' . $selected . '>' . $data->customer_fullname . '</option>';
                                }
                            } else {
                                $condition = array('customer' => $data->customer_id, 'loan_status !=' => 4, 'loan_status !=' => 13);
                                $loans = $this->get('tbl_loans', $condition, true);
                                if (sizeof($loans) == 0) {
                                    $customer .= '<option value="' . $data->customer_id . '" ' . $selected . '>' . $data->customer_fullname . '</option>';
                                }
                            }
                        }

                    }
                }
            } else {
                $customer = '<option selected disabled>No available customer</option>';
            }
        } else {
            $customer = '<option selected disabled>No available customer</option>';
        }
        return $customer;
    }

    protected function requestForm($customer_id = null)
    {
        $form = '';
        if (!is_null($customer_id)) {
            $condition = array('customer_id' => $customer_id);
            $join = 'tbl_loans';
            $value = 'tbl_loans.loan_id = tbl_customers.last_loan';
            $lastLoan = $this->get('tbl_customers', $condition, null, $join, $value);
            $condition = array('company_id' => $this->session->userdata('company'));
            $config = $this->get('tbl_company_config', $condition, null);
            if (!is_null($lastLoan) && !is_null($config)) {
                if ($lastLoan->last_loan == 1) {
                    if ($config->auto_startup_loan_calculation) {
                        $startup = 'readonly';
                    } else {
                        $startup = '';
                    }
                    $form .= '
	                <div class="form-group row">
                <label class="col-12" for="example-text-input">Startup Loan</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" value="' . number_format($lastLoan->estimated_income * $config->startup_percent / 100, 2) . '"  name="loanAmount"  ' . $startup . '>
                </div>
            </div>';
                    $form .= '
	                <div class="form-group row">
                <label class="col-12" for="example-select">Return Type</label>
                <div class="col-md-12">
                    <select class="form-control" id="returnType" name="returnType">
                        <option selected disabled>Please select</option>
                        <option value="1">Daily - System default</option>
                        <option value="2">Daily - Custom settings</option>
                        <option value="3">Weekly</option>
                        <option value="4">Monthly</option>
                    </select>
                </div>
            </div>
            ';
                    $form .= '
	                <div class="form-group row">
                <label class="col-12" for="example-text-input">Loan Period <small>in weeks</small></label>
                <div class="col-md-12">
                    <input type="number" class="form-control" id="loanPeriod" name="loanPeriod" ' . $startup . '>
                </div>
            </div>';
                    $form .= '
	                <div class="form-group row">
                <label class="col-12" for="example-text-input">Loan Interest</label>
                <div class="col-md-12">
                    <input type="text" class="form-control"  name="loanInterest" ' . $startup . '>
                </div>
            </div>';
                    $form .= '
	                <div class="form-group row">
                <label class="col-12" for="example-text-input">Total Loan</label>
                <div class="col-md-12">
                    <input type="text" class="form-control"  name="totalLoan" ' . $startup . '>
                </div>
            </div>';
                    $form .= '
	                <div class="form-group row">
                <label class="col-12" for="example-text-input">Return per day / week / month</label>
                <div class="col-md-12">
                    <input type="text" class="form-control"  name="return" ' . $startup . '>
                </div>
            </div>';
                    $form .= '
	                <div class="form-group row">
                <label class="col-12" for="example-text-input">Loan Start</label>
                <div class="col-md-12">
                    <input type="date" class="form-control" id="startingDate"  name="startingDate" readonly>
                </div>
            </div>';
                    $form .= '
	                <div class="form-group row">
                <label class="col-12" for="example-text-input">Loan End</label>
                <div class="col-md-12">
                    <input type="date" class="form-control"  name="endingDate" readonly>
                </div>
            </div>';
                } else {

                }
            } else {

            }
        }
        return $form;
    }

    protected function loanRequested()
    {
        $join = 'tbl_customers';
        $value = 'tbl_customers.customer_id = tbl_loans.customer';
        $condition = array('loan_status' => 11, 'officer_id' => $this->session->userdata('user_id'));
        return $this->get('tbl_loans', $condition, true, $join, $value);
    }

    protected function loanCompleted()
    {
        $join = 'tbl_customers';
        $value = 'tbl_customers.customer_id = tbl_loans.customer';
        $condition = array('loan_status' => 6, 'officer_id' => $this->session->userdata('user_id'));
        return $this->get('tbl_loans', $condition, true, $join, $value);
    }

    protected function inCompletedLoan()
    {
        $join = 'tbl_customers';
        $value = 'tbl_customers.customer_id = tbl_loans.customer';
        $condition = array('loan_status' => 7, 'officer_id' => $this->session->userdata('user_id'));
        return $this->get('tbl_loans', $condition, true, $join, $value);
    }

    protected function isOverDueLoan()
    {
        $join = 'tbl_customers';
        $value = 'tbl_customers.customer_id = tbl_loans.customer';
        $condition = array('loan_status' => 7, 'is_overdue' => 1, 'officer_id' => $this->session->userdata('user_id'));
        return $this->get('tbl_loans', $condition, true, $join, $value);
    }

    protected function returnsWaiting()
    {
        $table = null;
        $condition = array('officer_id' => $this->session->userdata('user_id'), 'officer_branch_status' => 1);
        $branches = $this->get('tbl_officer_branch', $condition, true);
        $sn = 0;
        if (sizeof($branches) > 0) {
            foreach ($branches as $branch) {
                $join1 = 'tbl_users';
                $value1 = 'tbl_users.user_id = tbl_officer_loan_returns.collection_officer';
                $join2 = 'tbl_branch';
                $value2 = 'tbl_branch.branch_id = tbl_officer_loan_returns.branch_id';
                $join3 = 'tbl_zone';
                $value3 = 'tbl_zone.zone_id = tbl_officer_loan_returns.zone_id';
                $condition = array('tbl_officer_loan_returns.branch_id' => $branch->branch_id, 'officer_return_status' => 11, 'supervisor_approval' => 1);
                $loans = $this->get('tbl_officer_loan_returns', $condition, true, $join1, $value1, $join2, $value2, $join3, $value3);
                if (sizeof($loans) > 0) {
                    foreach ($loans as $loan) {
                        $sn++;
                        $table .= "<tr>";
                        $table .= "<td>";
                        $table .= $sn;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->user_fullname;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= number_format($loan->target_amount, 2);
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= number_format($loan->collected_amount, 2);
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= number_format(($loan->target_amount - $loan->collected_amount), 2);
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= date('D d, M Y', strtotime($loan->officer_return_date));
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->branch_name;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->zone_name;
                        $table .= "</td>";

                        $table .= "<td>";
                        $table .= anchor("", "<i class='fa fa-times text-danger js-popover-enabled' data-toggle='popover' title='' data-placement='top' data-content='View loan return calender'></i>", array('id' => 'initialReturnsReject', 'd' => "$loan->officer_return_id", 'o' => 0)) . ' ';
                        $table .= anchor("", "<i class='fa fa-check-circle-o text-success js-popover-enabled' data-toggle='popover' title='' data-placement='top' data-content='View loan return calender'></i>", array('id' => 'initialReturnsApprove', 'f' => 'receiveBalance', 'c' => 'Sales', 'd' => "$loan->officer_return_id", 'o' => 0)) . ' ';
                        $table .= anchor("", "<i class='fa fa-calendar-check-o text-muted js-popover-enabled' data-toggle='popover' title='' data-placement='top' data-content='View loan return calender'></i>", array('id' => 'actionModal', 'f' => 'customerReturnListApproval', 'c' => 'Loans', 'd' => "$loan->officer_return_id", 'o' => 0)) . ' ';
                        $table .= "</td>";
                        $table .= "</tr>";
                    }
                }
            }
        }
        return array('data' => $table, 'total' => $sn);
    }

    protected function loanWaiting()
    {
        $table = null;
        $condition = array('officer_id' => $this->session->userdata('user_id'), 'officer_branch_status' => 1);
        $branches = $this->get('tbl_officer_branch', $condition, true);
        $sn = 0;
        if (sizeof($branches) > 0) {
            foreach ($branches as $branch) {
                $join = 'tbl_customers';
                $value = 'tbl_customers.customer_id = tbl_loans.customer';
                $join1 = 'tbl_users';
                $value1 = 'tbl_users.user_id = tbl_loans.officer_id';
                $join2 = 'tbl_branch';
                $value2 = 'tbl_branch.branch_id = tbl_loans.branch_id';
                $join3 = 'tbl_zone';
                $value3 = 'tbl_zone.zone_id = tbl_loans.zone_id';
                $condition = array('tbl_loans.branch_id' => $branch->branch_id, 'loan_status' => 11, 'loan_stage_approval' => 1);
                $loans = $this->get('tbl_loans', $condition, true, $join, $value, $join1, $value1, $join2, $value2, $join3, $value3);
                if (sizeof($loans) > 0) {
                    foreach ($loans as $loan) {
                        $sn++;
                        $table .= "<tr>";
                        $table .= "<td>";
                        $table .= $sn;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->loan_number;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->customer_fullname;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= number_format($loan->loan_amount, 2);
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= number_format($loan->loan_interest_amount, 2);
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= number_format($loan->loan_total_amount, 2);
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->user_fullname;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->branch_name;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->zone_name;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= date('D d, M Y', strtotime($loan->requested_date));
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= date('D d, M Y', strtotime($loan->starting_date));
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= date('D d, M Y', strtotime($loan->ending_date));
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= anchor("", "<i class='fa fa-times text-danger js-popover-enabled' data-toggle='popover' title='' data-placement='top' data-content='View loan return calender'></i>", array('id' => 'initialLoanReject', 'd' => "$loan->loan_id", 'o' => 0)) . ' ';
                        $table .= anchor("", "<i class='fa fa-check-circle-o text-success js-popover-enabled' data-toggle='popover' title='' data-placement='top' data-content='View loan return calender'></i>", array('id' => 'initialLoanApprove', 'f' => 'receiveBalance', 'c' => 'Sales', 'd' => "$loan->loan_id", 'o' => 0)) . ' ';
                        $table .= anchor("", "<i class='fa fa-edit text-primary js-popover-enabled' data-toggle='popover' title='' data-placement='top' data-content='View loan return calender'></i>", array('id' => 'initialLoanApprove', 'f' => 'receiveBalance', 'c' => 'Sales', 'd' => "$loan->loan_id", 'o' => 0)) . ' ';
                        $table .= anchor("", "<i class='fa fa-calendar-check-o text-muted js-popover-enabled' data-toggle='popover' title='' data-placement='top' data-content='View loan return calender'></i>", array('id' => 'actionModal', 'f' => 'returnCalendar', 'c' => 'Loans', 'd' => "$loan->loan_id", 'o' => 0)) . ' ';
                        $table .= "</td>";
                        $table .= "</tr>";
                    }
                }
            }
        }
        return array('data' => $table, 'total' => $sn);
    }

    protected function loanWaitingFinal()
    {
        $table = null;
        $condition = array('branch_company' => $this->session->userdata('company'), 'branch_status' => 1);
        $branches = $this->get('tbl_branch', $condition, true);
        $sn = 0;
        if (sizeof($branches) > 0) {
            foreach ($branches as $branch) {
                $join = 'tbl_customers';
                $value = 'tbl_customers.customer_id = tbl_loans.customer';
                $join1 = 'tbl_users';
                $value1 = 'tbl_users.user_id = tbl_loans.officer_id';
                $join2 = 'tbl_branch';
                $value2 = 'tbl_branch.branch_id = tbl_loans.branch_id';
                $join3 = 'tbl_zone';
                $value3 = 'tbl_zone.zone_id = tbl_loans.zone_id';
                $condition = array('tbl_loans.branch_id' => $branch->branch_id, 'loan_status' => 11, 'loan_stage_approval' => 2);
                $loans = $this->get('tbl_loans', $condition, true, $join, $value, $join1, $value1, $join2, $value2, $join3, $value3);
                if (sizeof($loans) > 0) {
                    foreach ($loans as $loan) {
                        $sn++;
                        $table .= "<tr>";
                        $table .= "<td>";
                        $table .= $sn;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->loan_number;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->customer_fullname;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= number_format($loan->loan_amount, 2);
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= number_format($loan->loan_interest_amount, 2);
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= number_format($loan->loan_total_amount, 2);
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->user_fullname;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->branch_name;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->zone_name;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= date('D d, M Y', strtotime($loan->requested_date));
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= date('D d, M Y', strtotime($loan->starting_date));
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= date('D d, M Y', strtotime($loan->ending_date));
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= anchor("", "<i class='fa fa-times text-danger js-popover-enabled' data-toggle='popover' title='' data-placement='top' data-content='View loan return calender'></i>", array('id' => 'initialLoanReject', 'd' => "$loan->loan_id", 'o' => 0)) . ' ';
                        $table .= anchor("", "<i class='fa fa-check-circle-o text-success js-popover-enabled' data-toggle='popover' title='' data-placement='top' data-content='View loan return calender'></i>", array('id' => 'initialLoanApprove', 'f' => 'receiveBalance', 'c' => 'Sales', 'd' => "$loan->loan_id", 'o' => 0)) . ' ';
                        $table .= anchor("", "<i class='fa fa-edit text-primary js-popover-enabled' data-toggle='popover' title='' data-placement='top' data-content='View loan return calender'></i>", array('id' => 'initialLoanApprove', 'f' => 'receiveBalance', 'c' => 'Sales', 'd' => "$loan->loan_id", 'o' => 0)) . ' ';
                        $table .= anchor("", "<i class='fa fa-calendar-check-o text-muted js-popover-enabled' data-toggle='popover' title='' data-placement='top' data-content='View loan return calender'></i>", array('id' => 'actionModal', 'f' => 'returnCalendar', 'c' => 'Loans', 'd' => "$loan->loan_id", 'o' => 0)) . ' ';
                        $table .= "</td>";
                        $table .= "</tr>";
                    }
                }
            }
        }
        return array('data' => $table, 'total' => $sn);
    }

    protected function loanManagement()
    {
        $table = null;
        $condition = array('branch_company' => $this->session->userdata('company'), 'branch_status' => 1);
        $branches = $this->get('tbl_branch', $condition, true);
        $sn = 0;
        if (sizeof($branches) > 0) {
            foreach ($branches as $branch) {
                $join = 'tbl_customers';
                $value = 'tbl_customers.customer_id = tbl_loans.customer';
                $join1 = 'tbl_users';
                $value1 = 'tbl_users.user_id = tbl_loans.officer_id';
                $join2 = 'tbl_branch';
                $value2 = 'tbl_branch.branch_id = tbl_loans.branch_id';
                $join3 = 'tbl_zone';
                $value3 = 'tbl_zone.zone_id = tbl_loans.zone_id';
                $condition = array('tbl_loans.branch_id' => $branch->branch_id, 'loan_status != ' => 4, 'loan_stage_approval' => 3);
                $loans = $this->get('tbl_loans', $condition, true, $join, $value, $join1, $value1, $join2, $value2, $join3, $value3);
                if (sizeof($loans) > 0) {
                    foreach ($loans as $loan) {
                        $sn++;
                        $table .= "<tr>";
                        $table .= "<td>";
                        $table .= $sn;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->loan_number;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->customer_fullname;
                        $table .= "</td>";
                        $table .= "<td class='text-right'>";
                        $table .= number_format($loan->loan_amount, 2);
                        $table .= "</td>";
                        $table .= "<td class='text-right'>";
                        $table .= number_format($loan->loan_interest_amount, 2);
                        $table .= "</td>";
                        $table .= "<td class='text-right'>";
                        $table .= number_format($loan->loan_total_amount, 2);
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->user_fullname;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->branch_name;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->zone_name;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= date('D d, M Y', strtotime($loan->requested_date));
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= date('D d, M Y', strtotime($loan->starting_date));
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= date('D d, M Y', strtotime($loan->ending_date));
                        $table .= "</td>";
                        $table .= "<td class='text-center'>";
                        $table .= anchor("", "<i class='fa fa-user text-primary js-popover-enabled' data-toggle='popover' title='' data-placement='top' data-content='View loan return calender'></i>", array('id' => 'actionModal', 'f' => 'changeLoanOfficer', 'c' => 'Loans', 'd' => "$loan->loan_id", 'o' => 0)) . ' ';
                        //$table .= anchor("", "<i class='fa fa-user text-primary js-popover-enabled' data-toggle='popover' title='' data-placement='top' data-content='View loan return calender'></i>", array('id' => 'initialLoanApprove', 'f' => 'receiveBalance', 'c' => 'Sales', 'd' => "$loan->loan_id", 'o' => 0)) . ' ';
                        $table .= anchor("", "<i class='fa fa-calendar-check-o text-muted js-popover-enabled' data-toggle='popover' title='' data-placement='top' data-content='View loan return calender'></i>", array('id' => 'actionModal', 'f' => 'returnCalendar', 'c' => 'Loans', 'd' => "$loan->loan_id", 'o' => 0)) . ' ';
                        $table .= "</td>";
                        $table .= "</tr>";
                    }
                }
            }
        }
        return array('data' => $table, 'total' => $sn);
    }

    protected function loanCompletedFinal()
    {
        $join = 'tbl_customers';
        $value = 'tbl_customers.customer_id = tbl_loans.customer';
        $condition = array('loan_status' => 6, 'company_id' => $this->session->userdata('company'));
        return $this->get('tbl_loans', $condition, true, $join, $value);
    }

    protected function inCompletedLoanFinal()
    {
        $join = 'tbl_customers';
        $value = 'tbl_customers.customer_id = tbl_loans.customer';
        $condition = array('loan_status' => 7, 'company_id' => $this->session->userdata('company'));
        return $this->get('tbl_loans', $condition, true, $join, $value);
    }

    protected function isOverDueLoanFinal()
    {
        $join = 'tbl_customers';
        $value = 'tbl_customers.customer_id = tbl_loans.customer';
        $condition = array('loan_status' => 7, 'is_overdue' => 1, 'company_id' => $this->session->userdata('company'));
        return $this->get('tbl_loans', $condition, true, $join, $value);
    }

    protected function transaction()
    {
        $join = 'tbl_loans';
        $value = 'tbl_loans.loan_number = tbl_transactions.transaction_loan ';
        $join1 = 'tbl_customers';
        $value1 = 'tbl_customers.customer_id = tbl_loans.customer';
        $condition = array('transaction_company' => $this->session->userdata('company'));
        return $this->get('tbl_transactions', $condition, true, $join, $value, $join1, $value1);
    }

    protected function zoneReturnsWaiting()
    {

        $table = null;
        $condition = array('officer_id' => $this->session->userdata('user_id'), 'officer_branch_status' => 1);
        $branches = $this->get('tbl_officer_branch', $condition, true);
        $sn = 0;
        if (sizeof($branches) > 0) {
            foreach ($branches as $branch) {
                $join = 'tbl_customers';
                $value = 'tbl_customers.customer_id = tbl_loans.customer';
                $join1 = 'tbl_users';
                $value1 = 'tbl_users.user_id = tbl_loans.officer_id';
                $join2 = 'tbl_branch';
                $value2 = 'tbl_branch.branch_id = tbl_loans.branch_id';
                $join3 = 'tbl_zone';
                $value3 = 'tbl_zone.zone_id = tbl_loans.zone_id';
                $condition = array('tbl_loans.branch_id' => $branch->branch_id, 'loan_status' => 11, 'loan_stage_approval' => 1);
                $loans = $this->get('tbl_loans', $condition, true, $join, $value, $join1, $value1, $join2, $value2, $join3, $value3);
                if (sizeof($loans) > 0) {
                    foreach ($loans as $loan) {
                        $sn++;
                        $table .= "<tr>";
                        $table .= "<td>";
                        $table .= $sn;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->loan_number;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->customer_fullname;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= number_format($loan->loan_amount, 2);
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= number_format($loan->loan_interest_amount, 2);
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= number_format($loan->loan_total_amount, 2);
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->user_fullname;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->branch_name;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= $loan->zone_name;
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= date('D d, M Y', strtotime($loan->requested_date));
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= date('D d, M Y', strtotime($loan->starting_date));
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= date('D d, M Y', strtotime($loan->ending_date));
                        $table .= "</td>";
                        $table .= "<td>";
                        $table .= anchor("", "<i class='fa fa-times text-danger js-popover-enabled' data-toggle='popover' title='' data-placement='top' data-content='View loan return calender'></i>", array('id' => 'actionModal', 'f' => 'receiveBalance', 'c' => 'Sales', 'd' => "$loan->loan_id", 'o' => 0)) . ' ';
                        $table .= anchor("", "<i class='fa fa-check-circle-o text-success js-popover-enabled' data-toggle='popover' title='' data-placement='top' data-content='View loan return calender'></i>", array('id' => 'actionModal', 'f' => 'receiveBalance', 'c' => 'Sales', 'd' => "$loan->loan_id", 'o' => 0)) . ' ';
                        $table .= anchor("", "<i class='fa fa-edit text-primary js-popover-enabled' data-toggle='popover' title='' data-placement='top' data-content='View loan return calender'></i>", array('id' => 'actionModal', 'f' => 'receiveBalance', 'c' => 'Sales', 'd' => "$loan->loan_id", 'o' => 0)) . ' ';
                        $table .= anchor("", "<i class='fa fa-calendar-check-o text-muted js-popover-enabled' data-toggle='popover' title='' data-placement='top' data-content='View loan return calender'></i>", array('id' => 'actionModal', 'f' => 'returnCalendar', 'c' => 'Loans', 'd' => "$loan->loan_id", 'o' => 0)) . ' ';
                        $table .= "</td>";
                        $table .= "</tr>";
                    }
                }
            }
        }
        return array('data' => $table, 'total' => $sn);
    }

    /*
     * @table, @data variables to pass to the insert function
     */

    protected function officerAssignment($officerId = null)
    {
        $list = '';
        if (!is_null($officerId)) {
            $condition = array('officer_id' => $officerId, 'officer_branch_status' => 1);
            $branches = $this->get('tbl_officer_branch', $condition, true);
            if (sizeof($branches) > 0) {
                foreach ($branches as $branch) {
                    $condition = array('zone_branch' => $branch->branch_id, 'zone_status' => 1);
                    $zones = $this->get('tbl_zone', $condition, true);
                    if (sizeof($zones) > 0) {
                        foreach ($zones as $zone) {
                            $list .= '<option value="' . $zone->zone_id . '">' . $zone->zone_name . '</option>';
                        }
                    }
                }
            } else {
                $condition = array('officer_id' => $officerId, 'officer_zone_status' => 1);
                $join = 'tbl_zone';
                $value = 'tbl_zone.zone_id = tbl_officer_zone.zone_id';
                $zones = $this->get('tbl_officer_zone', $condition, true, $join, $value);
                if (sizeof($zones) > 0) {
                    foreach ($zones as $zone) {
                        $list .= '<option value="' . $zone->zone_id . '">' . $zone->zone_name . '</option>';
                    }
                }
            }
        }
        return $list;
    }

    /*
     * @table, @data, @identifier @value variables to pass to the update function
     */

    protected function control_users($control = null)
    {
        $condition = array('tbl_role_control.control_id' => $control, 'role_control_status' => 1, 'user_role_status' => 1, 'userStatus' => 1, 'user_company' => $this->session->userdata('company'));
        $join1 = 'tbl_user_role';
        $value1 = 'tbl_user_role.user_id = tbl_users.userId';
        $join2 = 'tbl_role';
        $value2 = 'tbl_role.role_id = tbl_user_role.role_id';
        $join3 = 'tbl_role_control';
        $value3 = 'tbl_role_control.role_id = tbl_role.role_id';
        return $this->get('tbl_users', $condition, true, $join1, $value1, $join2, $value2, $join3, $value3);
    }

    /*
     * @table, @condition, @multiple variables to pass to the update function
     */

    protected function todayChart()
    {

        $jsonArray = array();

        $statistics = self::statistics();
        $target = $statistics['today_target'];
        $collected = $statistics['today_collected'];

        $jsonArrayItem = [];

        $jsonArrayItem = array();
        $jsonArrayItem['Label'] = 'TARGET';
        $jsonArrayItem['Value'] = $target;

// append the above created object into main array
        array_push($jsonArray, $jsonArrayItem);


        $jsonArrayItem = array();
        $jsonArrayItem['Label'] = 'COLLECTED';
        $jsonArrayItem['Value'] = $collected;

// append the above created object into main array
        array_push($jsonArray, $jsonArrayItem);


        $chartConfigObj = array("chart" =>
            array(
                //"caption" => "Profit and Loss",
                //"subcaption"=> "NET INCOME : ".$this->netIncome($start,$end),
                //"xAxisName" => "Account",
                //"yAxisName" => "Amount",
                "numberSuffix" => " TZS",
                //"exportEnabled" => "1",
                "showvalues" => "1",
                "theme" => "fusion",
                "anchorbgcolor" => "#72D7B2",
                "palettecolors" => "#72D7B2"
            )
        );
        $chartConfigObj["data"] = $jsonArray;


        //set the response content type as JSON
        //header('Content-type:application/json');
        $chartData = json_encode($chartConfigObj);
        return $chartData;

    }

    /*
     * @table, @condition, @multiple variables to pass to the update function
     */

    protected function statistics()
    {
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime($today . ' -1 day'));
        $today_target = 0;
        $today_collected = 0;
        $yesterday_target = 0;
        $yesterday_collected = 0;
        $yesterday_balance = 0;
        $month_target = 0;
        $month_collected = 0;
        $company = $this->session->userdata('company');

        $condition = array('officer_id' => $this->session->userdata('user_id'), 'officer_branch_status' => 1);
        $officerBranches = $this->get('tbl_officer_branch', $condition, true);

        $condition = array('officer_id' => $this->session->userdata('user_id'), 'officer_zone_status' => 1);
        $officerZones = $this->get('tbl_officer_zone', $condition, true);

        if (in_array(98, $this->session->userdata('controls'))) {
            $condition = array('company_id' => $company, 'branch_return_status !=' => 4, 'collection_date >=' => $yesterday, 'collection_date <=' => $today);
            $branches = $this->get('tbl_branch_returns', $condition, true);
            if (sizeof($branches) > 0) {
                foreach ($branches as $branch) {
                    if ($branch->collection_date == $today) {
                        $today_target += $branch->target_amount;
                        $today_collected += $branch->collected_amount;
                    } else {
                        $yesterday_target += $branch->target_amount;
                        $yesterday_collected += $branch->collected_amount;
                    }
                }
            } elseif (sizeof($officerBranches) > 0) {
                foreach ($officerBranches as $officerBranch) {
                    $condition = array('branch_id' => $officerBranch->branch_id, 'company_id' => $company, 'branch_return_status !=' => 4, 'collection_date >=' => $yesterday, 'collection_date <=' => $today);
                    $branchReturn = $this->get('tbl_branch_returns', $condition, null);
                    if ($branchReturn) {
                        if ($branchReturn->collection_date == $today) {
                            $today_target += $branchReturn->target_amount;
                            $today_collected += $branchReturn->collected_amount;
                        } else {
                            $yesterday_target += $branchReturn->target_amount;
                            $yesterday_collected += $branchReturn->collected_amount;
                        }
                    }
                }
            }
        } elseif (sizeof($officerZones) > 0) {
            $condition = array('company_id' => $company, 'officer_return_status !=' => 4, 'officer_return_date >=' => $yesterday, 'officer_return_date <=' => $today, 'collection_officer' => $this->session->userdata('user_id'));
            $returns = $this->get('tbl_officer_loan_returns', $condition, true);
            foreach ($returns as $return) {
                if ($return->officer_return_date == $today) {
                    $today_target += $return->target_amount;
                    $today_collected += $return->collected_amount;
                } else {
                    $yesterday_target += $return->target_amount;
                    $yesterday_collected += $return->collected_amount;
                }
            }
        }

        if (!(($yesterday_target - $yesterday_collected) < 0)) {
            $yesterday_balance = $yesterday_target - $yesterday_collected;
        }

        return array('today_target' => $today_target, 'today_collected' => $today_collected, 'yesterday_target' => $yesterday_target, 'yesterday_collected' => $yesterday_collected, 'yesterday_balance' => $yesterday_balance);
    }

    /*
     * Update version 2
     */

    protected function monthChart()
    {

        $jsonArray = array();

        $statistics = self::monthStatistics();
        $target = $statistics['target'];
        $collected = $statistics['collected'];

        $jsonArrayItem = [];

        $jsonArrayItem = array();
        $jsonArrayItem['Label'] = 'TARGET';
        $jsonArrayItem['Value'] = $target;

// append the above created object into main array
        array_push($jsonArray, $jsonArrayItem);


        $jsonArrayItem = array();
        $jsonArrayItem['Label'] = 'COLLECTED';
        $jsonArrayItem['Value'] = $collected;

// append the above created object into main array
        array_push($jsonArray, $jsonArrayItem);


        $chartConfigObj = array("chart" =>
            array(
                //"caption" => "Profit and Loss",
                //"subcaption"=> "NET INCOME : ".$this->netIncome($start,$end),
                //"xAxisName" => "Account",
                //"yAxisName" => "Amount",
                "numberSuffix" => " TZS",
                //"exportEnabled" => "1",
                "showvalues" => "1",
                "theme" => "fusion",
                "anchorbgcolor" => "#72D7B2",
                "palettecolors" => "#72D7B2"
            )
        );
        $chartConfigObj["data"] = $jsonArray;


        //set the response content type as JSON
        //header('Content-type:application/json');
        $chartData = json_encode($chartConfigObj);
        return $chartData;

    }

    protected function monthStatistics()
    {
        $target = 0;
        $collected = 0;
        $condition = array('officer_return_date >= ' => date('Y-m-01'), 'officer_return_date <=' => date('Y-m-t'), 'officer_return_status !=' => 4, 'collection_officer' => $this->session->userdata('user_id'));
        $returns = $this->get('tbl_officer_loan_returns', $condition, true);
        if (sizeof($returns) > 0) {
            foreach ($returns as $return) {
                $target += $return->target_amount;
                $collected += $return->collected_amount;
            }
        }
        return array('target' => $target, 'collected' => $collected);
    }


}
