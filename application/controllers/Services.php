<?php
defined('BASEPATH') or exit('No direct script access allowed');
include "Base.php";

class Services extends Base
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('isLoggedIn')) {
            $this->session->set_userdata('session_expire', true);
            redirect('Auth');
        }
        if ($this->session->userdata('lock')) {
            redirect('Auth/lock');
        }
        $this->page_data['module_nav'] = 'branch/_nav.php';
    }

    public function index()
    {
        if (isset($_POST['save'])) {
            $data = array('service_company' => $this->session->userdata('company'), 'service_type' => $this->input->post('type'), 'service_status' => 1, 'service_run' => $this->input->post('time'), 'service_last_run' => self::time());
            $this->insert('tbl_services', $data);
            self::serviceSelector($this->input->post('type'));
            $this->page_data['message'] = array('class' => 'success', 'header' => 'Success !', 'description' => 'System service is successful registered');

        }
        $condition = array('type_status' => 1);
        $this->page_data['types'] = $this->get('tbl_service_type', $condition, true);
        $condition = array('service_status' => 1, 'service_company' => $this->session->userdata('company'));
        $join = 'tbl_service_type';
        $value = 'tbl_service_type.type_id = tbl_services.service_type';
        $this->page_data['services'] = $this->get('tbl_services', $condition, true, $join, $value);
        $this->page_data['page'] = 'services/dashboard.php';
        $this->renderPage($this->page_data);
    }


}
