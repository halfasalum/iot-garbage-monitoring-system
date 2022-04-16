<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include "Base.php";

class Trash extends Base{

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
        if (isset($_POST['trash'])){
            $this->form_validation->set_rules('location','trash location','trim|required');
            $this->form_validation->set_rules('lat','trash latitude icon','trim|required');
            $this->form_validation->set_rules('lon','trash longitude url','trim|required');
            $this->form_validation->set_rules('number','trash number','trim|required');
            if ($this->form_validation->run()){
                $module						= $this->input->post('number');
                $data					= array('device_location'=>$this->input->post('location'),'device_lat'=>$this->input->post('lat'),'device_lon'=>$this->input->post('lon'),'device_number'=>$this->input->post('number'));
                $this->insert('tbl_trash',$data);
                $this->page_data['message']	= array('class'=>'success','header'=>'Success !','description'=>'Trash successful registered');
                $this->log('REGISTER',"has register new trash with number : ($module)");

            }else{
                $this->page_data['message']	= array('class'=>'danger','header'=>'Error !','description'=>$this->formValidationErrors());
            }
        }
        $condition                          = array('device_status !='=>4);
        $this->page_data['trashes']         = $this->get('tbl_trash',$condition,true);
		$this->page_data['page']			= 'trash/dashboard.php';
		$this->renderPage($this->page_data);
	}

    public function deviceMap($deviceId = null){
        $condition							= array('device_id'=>$deviceId,'device_status'=>1);
        $this->page_data['trash']			= $this->get('tbl_trash',$condition,null);
        $this->load->view('trash/__deviceMap',$this->page_data);
    }


}
