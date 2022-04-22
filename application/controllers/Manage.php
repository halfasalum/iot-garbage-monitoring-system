<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include "Base.php";

class Manage extends Base{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('isLoggedIn')){
			$this->session->set_userdata('session_expire',true);
			redirect('Auth');
		}
		if ($this->session->userdata('lock')) {
			redirect('Auth/lock');
		}
	}

	public function index(){
		$this->page_data['page']			= 'manage/dashboard.php';
		$this->renderPage($this->page_data);
	}

	public function users(){
		if (isset($_POST['save'])){
			$this->form_validation->set_rules('name','full name','trim|required');
			$this->form_validation->set_rules('email','email','trim|required');
			$this->form_validation->set_rules('phone','phone','trim|required');
			if ($this->form_validation->run()){
				$name						= $this->input->post('name');
				$data						= array('user_fullname'=>$this->input->post('name'),'user_email'=>$this->input->post('email'),'user_phone'=>$this->input->post('phone'),'user_company'=>$this->session->userdata('company'));
				$this->insert('tbl_users',$data);
				$this->log('CREATE',"has create new user ($name)");
				$this->page_data['message']	= array('class'=>'success','header'=>'Success !','description'=>'User is successful created');
			}else{
				$this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>$this->formValidationErrors());
			}
		}
		$condition							= array('user_status'=>1,'user_company'=>$this->session->userdata('company'));
		$users								= $this->get('tbl_users',$condition,true);
		$this->page_data['users']			= $users;
		$this->page_data['page']			= 'manage/users.php';
		$this->renderPage($this->page_data);
	}

	public function userDelete($userId, $operation = 1){
		if (is_null($userId)){

		}
		if ($operation == 2){
			$data					= array('user_status'=>4);
			$this->update('tbl_users','user_id',$userId,$data);
			$this->page_data['message']	= array('class'=>'success','header'=>'Success !','description'=>'User is successful deleted');
			$this->log('DELETE',"has delete user with ref number ($userId)");
		}
		$condition							= array('user_id'=>$userId);
		$this->page_data['user']			= $this->get('tbl_users',$condition,null);
		$this->page_data['button']			= '<button type="submit" class="btn btn-alt-danger" id="saveModal" c="Manage" f="userDelete" d="'.$userId.'" o="2" name="save"><i class="fa fa-trash mr-1"></i> Yes, Delete</button>';
		$this->load->view('manage/__frmUserDelete',$this->page_data);
	}

	public function userRole($userId, $operation = 1){

		if ($userId > 0) {

			if ($operation == 2) {
				$roles = $this->input->post('role[]');
				if (sizeof($roles) > 0) {

					$data = array('user_role_status' => 4);
					$this->update('tbl_user_role', 'user_id', $userId, $data);
					for ($i = 0; $i < sizeof($roles); $i++) {
						$data = array('user_id' => $userId, 'role_id' => $roles[$i]);
						$this->insert('tbl_user_role', $data);
					}
					$this->log('UPDATE', "has update role for the user with ref number ($userId)");
					$this->modules($userId);
					$this->page_data['message'] = array('class' => 'success', 'header' => 'Success !', 'description' => 'User Role is successful updated.');
				}
			 else {
				$this->page_data['message'] = array('class' => 'danger', 'header' => 'Error !', 'description' => 'Please select at least one role.');
			}
		}
			$data				= array();
			$condition			= array('user_id'=>$userId,'user_role_status'=>1);
			$userRoles			= $this->get('tbl_user_role',$condition,true);
			foreach ($userRoles as $userRole){
				$data[]			= $userRole->role_id;
			}

		}
		$company                            = $this->session->userdata('company');
		//$condition							= array("s_global = 1 OR (role_status = 1 AND role_company = $company)");
		$condition							= "(is_global = 1"." AND role_status = 1) OR role_company = $company";
		//$r			= $this->get('tbl_role',$condition,true);
		//echo json_encode($r);
		//var_dump($r);
		$this->page_data['roles']			= $this->get('tbl_role',$condition,true);
		$this->page_data['button']			= '<button type="submit" class="btn btn-alt-success btn-block" id="saveModal" c="Manage" f="userRole" d="'.$userId.'" o="2" name="save"><i class="fa fa-plus mr-1"></i> Save</button>';
		$this->page_data['userRoles']		= $data;
		$this->load->view('manage/__frmUserRole',$this->page_data);
	}

	public function roles(){

		if (isset($_POST['save'])){

			$this->form_validation->set_rules('name','role name','trim|required');
			if ($this->form_validation->run()){
				$roleName					= $this->input->post('name');
				$controls					= $this->input->post('control[]');
				if (sizeof($controls) > 0){
					$condition				= array('role_name'=>$roleName,'role_status'=>1);
					if (sizeof($this->get('tbl_role',$condition,true)) == 0){
						$data				= array('role_name'=>$this->input->post('name'),'is_default '=>$this->input->post('default'),'role_company'=>$this->session->userdata('company'));
						$role				= $this->insert('tbl_role',$data);
						for ($i = 0; $i < sizeof($controls);$i++){
							$data			= array('role_id'=>$role,'control_id'=>$controls[$i]);
							$this->insert('tbl_role_control',$data);
						}
						$this->log('CREATE',"has create new role ($roleName)");
						$this->page_data['message']	= array('class'=>'success','header'=>'Success !','description'=>'Role is successful registered. Role will take effect on next log in');
					}else{
						$this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>'Role already registered.');
					}
				}else{
					$this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>'Please select at least one role.');
				}
			}
			else{
				$this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>$this->formValidationErrors());
			}
		}
		$condition							= array('role_status'=>1,'role_company'=>$this->session->userdata('company'));
		$this->page_data['total']			= sizeof($this->get('tbl_role',$condition,true));
		$this->page_data['list']			= $this->moduleControls();
		$condition							= array('role_status'=>1,'role_company'=>$this->session->userdata('company'));
		$this->page_data['roles']			= $this->get('tbl_role',$condition,true);
		$this->page_data['page']			= 'manage/roles.php';
		$this->renderPage($this->page_data);
	}

	public function roleEdit($roleId = null,$operation = 1){
		if (is_null($roleId)){

		}
		if ($operation == 2){
				$this->form_validation->set_rules('name','role name','trim|required');
				if ($this->form_validation->run()){
					$roleName					= $this->input->post('name');
					$controls					= $this->input->post('control[]');
					if (sizeof($controls) > 0){
						$condition				= array('role_name'=>$roleName,'role_id !='=>$roleId,'role_status'=>1);

						if (sizeof($this->get('tbl_role',$condition,true)) == 0){
							$data				= array('role_name'=>$this->input->post('name'),'is_default '=>$this->input->post('default'));
							$this->update('tbl_role','role_id',$roleId,$data);
							$data				= array('role_control_status'=>4);
							$this->update('tbl_role_control','role_id',$roleId,$data);
							for ($i = 0; $i < sizeof($controls);$i++){
								$data			= array('role_id'=>$roleId,'control_id'=>$controls[$i]);
								$this->insert('tbl_role_control',$data);
							}
							$this->log('UPDATE',"has update role ($roleName)");
							$this->page_data['message']	= array('class'=>'success','header'=>'Success !','description'=>'Role is successful updated. Role will take effect on next log in');
						}else{
							$this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>'Role already registered.');
						}
					}else{
						$this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>'Please select at least one role.');
					}
				}
				else{
					$this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>$this->formValidationErrors());
				}
		}
		$condition							= array('role_id'=>$roleId);
		$this->page_data['role']			= $this->get('tbl_role',$condition,null);
		$this->page_data['list']			= $this->moduleControls($roleId);
		$this->page_data['button']			= '<button type="submit" class="btn btn-alt-success btn-block" id="saveModal" c="Manage" f="roleEdit" d="'.$roleId.'" o="2" name="save"><i class="fa fa-plus mr-1"></i> Save</button>';
		$this->load->view('manage/__frmRoles',$this->page_data);
	}

	public function userAssign($userId, $operation = 1){
        $data				= array();
        if ($userId > 0) {

            if ($operation == 2) {
                $branch = $this->input->post('branch[]');
                $zone   = $this->input->post('zone[]');
                $data = array('officer_branch_status' => 4);
                $this->update('tbl_officer_branch', 'officer_id', $userId, $data);
                if (!is_null($branch)){
                    for ($i = 0; $i < sizeof($branch); $i++) {
                        $data = array('officer_id' => $userId, 'branch_id' => $branch[$i]);
                        $this->insert('tbl_officer_branch', $data);
                    }
                    $this->log('UPDATE', "has update user branch for the user with ref number ($userId)");
                    $this->page_data['message'] = array('class' => 'success', 'header' => 'Success !', 'description' => 'User assignment is successful updated.');

                }
                $data = array('officer_zone_status' => 4);
                $this->update('tbl_officer_zone', 'officer_id', $userId, $data);
                if (!is_null($zone)){
                    for ($i = 0; $i < sizeof($zone); $i++) {
                        $data = array('officer_id' => $userId, 'zone_id' => $zone[$i]);
                        $this->insert('tbl_officer_zone', $data);
                    }
                    $this->log('UPDATE', "has update user assigned zone for the user with ref number ($userId)");
                    $this->modules($userId);
                    $this->page_data['message'] = array('class' => 'success', 'header' => 'Success !', 'description' => 'User assignment is successful updated.');

                }
            }

            /*$condition			= array('user_id'=>$userId,'user_shop_status'=>1);
            $userShops			= $this->get('tbl_user_shop',$condition,true);
            if (sizeof($userShops) > 0){
                foreach ($userShops as $userShop){
                    $data[]			= $userShop->shop_id;
                }
            }*/
        }

	    //$condition                          = array('shop_company'=>$this->session->userdata('company'),'shop_status'=>1);
	    //$this->page_data['shops']           = $this->get('tbl_shop',$condition,true);
        $this->page_data['button']			= '<button type="submit" class="btn btn-alt-success btn-block" id="saveModal" c="Manage" f="userAssign" d="'.$userId.'" o="2" name="save"><i class="fa fa-plus mr-1"></i> Save</button>';
        $this->page_data['list']		    = $this->companyBranchesZones($userId);
        $this->load->view('manage/__frmUserAssign',$this->page_data);
    }

    public function userEdit($userId, $operation = 0){
        if ($operation == 1){

            $this->form_validation->set_rules('name','full name','trim|required');
            $this->form_validation->set_rules('email','email','trim|required');
            $this->form_validation->set_rules('phone','phone','trim|required');
            if ($this->form_validation->run()){
                $name						= $this->input->post('name');
                $data						= array('user_fullname'=>$this->input->post('name'),'user_email'=>$this->input->post('email'),'user_phone'=>$this->input->post('phone'),'user_company'=>$this->session->userdata('company'));

                $condition                  = array('user_id'=>$userId);
                $this->updateV2('tbl_users',$condition,$data);
                $this->log('UPDATE',"has update user ($name) bio data");
                $this->page_data['message']	= array('class'=>'success','header'=>'Success !','description'=>'User is successful updated');
            }else{
                $this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>$this->formValidationErrors());
            }

        }elseif ($operation == 2){
            $this->form_validation->set_rules('pass','password','trim|required|matches[repass]|min_length[8]');
            $this->form_validation->set_rules('repass','re-password','trim|required');
            if ($this->form_validation->run()){
                $pass = $userId . $this->input->post('pass');
                $data						= array('password'=>password_hash($pass, PASSWORD_BCRYPT));
                $condition                  = array('user_id'=>$userId);
                $this->updateV2('tbl_users',$condition,$data);
                $this->log('UPDATE',"has update user with id : $userId password");
                $this->page_data['message']	= array('class'=>'success','header'=>'Success !','description'=>'User password is successful updated');
            }else{
                $this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>$this->formValidationErrors());
            }
        }elseif ($operation == 3){
            $this->form_validation->set_rules('username','username','trim|required');
            if ($this->form_validation->run()){
                $data						= array('username'=>$this->input->post('username'));
                $condition                  = array('user_id !='=>$userId,'username'=>$this->input->post('username'));
                if (sizeof($this->get('tbl_users',$condition,true)) > 0){
                    $this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>'Username is already used');
                }else{
                    $condition                  = array('user_id'=>$userId);
                    $this->updateV2('tbl_users',$condition,$data);
                    $this->log('UPDATE',"has update user with id : $userId username");
                    $this->page_data['message']	= array('class'=>'success','header'=>'Success !','description'=>'Username is successful updated');
                }
            }else{
                $this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>$this->formValidationErrors());
            }
        }
        $condition      = array('user_id'=>$userId);
        $this->page_data['user']    = $this->get('tbl_users',$condition,null);
        $this->page_data['info']			= '<button type="submit" class="btn btn-alt-success btn-block" id="saveModal" c="Manage" f="userEdit" d="'.$userId.'" o="1" name="save"><i class="fa fa-info mr-1"></i> Update info</button>';
        $this->page_data['password']		= '<button type="submit" class="btn btn-alt-info btn-block" id="saveModal" c="Manage" f="userEdit" d="'.$userId.'" o="2" name="save"><i class="fa fa-user-secret mr-1"></i> Update password</button>';
        $this->page_data['username']		= '<button type="submit" class="btn btn-alt-primary btn-block" id="saveModal" c="Manage" f="userEdit" d="'.$userId.'" o="3" name="save"><i class="fa fa-user-circle-o mr-1"></i> Update Username</button>';
        $this->load->view('manage/__frmUserEdit',$this->page_data);
    }

    public function userAssign2($userId, $operation = 1){

    }

	public function configuration(){
		$this->page_data['page']			= 'manage/users.php';
		$this->renderPage($this->page_data);
	}

	public function reports(){
		$this->page_data['page']			= 'manage/users.php';
		$this->renderPage($this->page_data);
	}
}
