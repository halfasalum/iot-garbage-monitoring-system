<?php
include "Base.php";
defined('BASEPATH') OR exit('No direct script access allowed');
class Audit extends Base{

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
		$start								= date('Y-m-01');
		$end								= date('Y-m-d');
		$condition					= array(' log_time >='=>$start,'log_time <='=>$end,'log_company'=>$this->session->userdata('company'));
		$this->page_data['logs']	= $this->get('tbl_users_logs',$condition,true);
		if (isset($_POST['run'])){
			$this->form_validation->set_rules('start','starting date','trim|required');
			$this->form_validation->set_rules('end','starting end','trim|required');
			if ($this->form_validation->run()){
				$start						= $this->input->post('start');
				$end						= $this->input->post('end');
				$condition					= array(' log_time >='=>$start,'log_time <='=>$end);
				$this->page_data['logs']	= $this->get('tbl_users_logs',$condition,true);
			}else{
				$this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>$this->formValidationErrors());
			}
		}
		$this->page_data['start']			= $start;
		$this->page_data['end']				= $end;
		$this->page_data['page']			= 'audit/dashboard.php';
		$this->renderPage($this->page_data);
	}


}
