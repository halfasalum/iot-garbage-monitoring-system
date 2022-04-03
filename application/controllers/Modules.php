<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include "Base.php";

class Modules extends Base{

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
        $this->page_data['module_nav']		= 'modules/_nav.php';
	}

	public function index(){
		$this->page_data['page']			= 'modules/dashboard.php';
		$this->renderPage($this->page_data);
	}

	public function module(){
		if (isset($_POST['module'])){
			$this->form_validation->set_rules('name','module','trim|required');
			$this->form_validation->set_rules('icon','module icon','trim|required');
			$this->form_validation->set_rules('url','module url','trim|required');
			$this->form_validation->set_rules('description','module description','trim|required');
			if ($this->form_validation->run()){
				$module						= $this->input->post('name');
				$condition					= array('module_desc'=>$module,'module_status'=>1);
				if (sizeof($this->get('tbl_module',$condition,true)) == 0){
					$data					= array('module_icon'=>$this->input->post('icon'),'module_class'=>$this->input->post('url'),'module_desc'=>$this->input->post('name'),'module_tooltip'=>$this->input->post('description'));
					$this->insert('tbl_module',$data);
					$this->page_data['message']	= array('class'=>'success','header'=>'Success !','description'=>'Module successful registered');
					$this->log('CREATE',"has create new module ($module)");
				}
				else{
					$this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>'Module already registered');
				}
			}else{
				$this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>$this->formValidationErrors());
			}
		}

		$condition							= array('module_status'=>1);
		$this->page_data['modules']			= $this->get('tbl_module',$condition,true);
		$this->page_data['total_modules']	= sizeof($this->get('tbl_module',$condition,true));
		$condition							= array('control_status'=>1);
		$join								= 'tbl_module';
		$value								= 'tbl_module.module_id = tbl_module_control.module_id';
		$this->page_data['controls']		= $this->get('tbl_module_control',$condition,true,$join,$value);
		$this->page_data['total_control']	= sizeof($this->get('tbl_module_control',$condition,true));
		$this->page_data['page']			= 'modules/modules.php';
		$this->renderPage($this->page_data);
	}

	public function control(){

		if (isset($_POST['control'])){
			$this->form_validation->set_rules('name','control','trim|required');
			$this->form_validation->set_rules('module','control module','trim|required');
			if ($this->form_validation->run()){
				$module						= $this->input->post('name');
				$condition					= array('control_name'=>$module,'control_status'=>1);
				if (sizeof($this->get('tbl_module_control',$condition,true)) == 0){
					$data					= array('control_name'=>$this->input->post('name'),'module_id'=>$this->input->post('module'));
					$this->insert('tbl_module_control',$data);
					$this->page_data['message']	= array('class'=>'success','header'=>'Success !','description'=>'Module control successful registered');
					$this->log('CREATE',"has create new module control ($module)");
				}
				else{
					$this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>'Module control already registered');
				}
			}else{
				$this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>$this->formValidationErrors());
			}
		}
		$condition							= array('module_status'=>1);
		$this->page_data['modules']			= $this->get('tbl_module',$condition,true);
		$this->page_data['total_modules']	= sizeof($this->get('tbl_module',$condition,true));
		$condition							= array('control_status'=>1,'module_status'=>1);
		$join								= 'tbl_module';
		$value								= 'tbl_module.module_id = tbl_module_control.module_id';
		$this->page_data['controls']		= $this->get('tbl_module_control',$condition,true,$join,$value);
		$this->page_data['total_control']	= sizeof($this->get('tbl_module_control',$condition,true,$join,$value));
		$this->page_data['page']			= 'modules/controls.php';
		$this->renderPage($this->page_data);
	}

	public function moduleEdit($moduleId = null,$operation = 1){
		if (is_null($moduleId)){

		}
		if ($operation == 2){
			$this->form_validation->set_rules('name','module','trim|required');
			$this->form_validation->set_rules('icon','module icon','trim|required');
			$this->form_validation->set_rules('url','module url','trim|required');
			$this->form_validation->set_rules('description','module description','trim|required');
			if ($this->form_validation->run()){
				$module						= $this->input->post('name');
				$condition					= array('module_desc'=>$module,'module_status'=>1,'module_id !='=>$moduleId);
				if (sizeof($this->get('tbl_module',$condition,true)) == 0){
					$data					= array('module_icon'=>$this->input->post('icon'),'module_class'=>$this->input->post('url'),'module_desc'=>$this->input->post('name'),'module_access_key'=>$this->input->post('access'),'module_tooltip'=>$this->input->post('description'));
					$this->update('tbl_module','module_id',$moduleId,$data);
					$this->page_data['message']	= array('class'=>'success','header'=>'Success !','description'=>'Module successful registered');
					$this->log('UPDATE',"has update module ($module)");
				}
				else{
					$this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>'Module already registered');
				}
			}else{
				$this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>$this->formValidationErrors());
			}
			$this->form_validation->set_rules('name','role name','trim|required');

		}

        $condition							= array('control_status'=>1,'module_status'=>1);
        $join								= 'tbl_module';
        $value								= 'tbl_module.module_id = tbl_module_control.module_id';
        $this->page_data['controls']		= $this->get('tbl_module_control',$condition,true,$join,$value);
		$condition							= array('module_id'=>$moduleId);
		$this->page_data['module']			= $this->get('tbl_module',$condition,null);
		$this->page_data['button']			= '<button type="submit" class="btn btn-alt-success btn-block" id="saveModal" c="Modules" f="moduleEdit" d="'.$moduleId.'" o="2" name="save"><i class="fa fa-plus mr-1"></i> Save</button>';
		$this->load->view('modules/__frmModule',$this->page_data);
	}

	public function moduleDelete($moduleId = null,$operation = 1){
		if (is_null($moduleId)){

		}
		if ($operation == 2){
					$data					= array('module_status'=>4);
					$this->update('tbl_module','module_id',$moduleId,$data);
					$this->page_data['message']	= array('class'=>'success','header'=>'Success !','description'=>'Module successful deleted');
					$this->log('UPDATE',"has delete module with ref number ($moduleId)");
		}
		$condition							= array('module_id'=>$moduleId);
		$this->page_data['module']			= $this->get('tbl_module',$condition,null);
		$this->page_data['button']			= '<button type="submit" class="btn btn-alt-danger" id="saveModal" c="Modules" f="moduleDelete" d="'.$moduleId.'" o="2" name="save"><i class="fa fa-trash mr-1"></i> Yes, Delete</button>';
		$this->load->view('modules/__frmModuleDelete',$this->page_data);
	}
}
