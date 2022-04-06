<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include "Base.php";

class Home extends Base{

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
        $company                            = $this->session->userdata('company');
        if ($company == 1){
            $this->page_data['content']			= 'root.php';
        }else{
            $this->page_data['content']			= 'company.php';
        }
        $this->page_data['page']			= 'common/dashboard.php';
       /* $this->page_data['incomplete']		= self::inCompletedLoan();
        $this->page_data['completed']	    = self::loanCompleted();
        $this->page_data['overdue']		    = self::isOverDueLoan();
        $this->page_data['statistics']      = self::statistics();
        $this->page_data['todayChart']      = self::todayChart();
        $this->page_data['monthChart']      = self::monthChart();
        $this->page_data['pastSeven']       = self::pastSeven();*/
		$this->renderPage($this->page_data);
	}

	public function account(){
		$this->page_data['page']			= 'common/account.php';
		$this->renderPage($this->page_data);
	}

	public function lock(){
		$this->page_data['page']			= 'common/dashboard.php';
		$this->renderPage($this->page_data);
	}

    public function access(){
        $this->page_data['page']			= 'common/access.php';
        $this->renderPage($this->page_data);
    }

    public function notFound(){
        $this->page_data['page']			= 'common/404.php';
        $this->renderPage($this->page_data);
    }


}
