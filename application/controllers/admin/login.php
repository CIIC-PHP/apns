<?php

defined('BASEPATH') or die('Access deny!');

require_once(APPPATH.'controllers/base'.EXT);

class Login extends Base {
	
	private $errmsg = '';
	
	private $form_rules = array(
		array(
			'field' => 'account',
			'label' => 'Account',
			'rules' => 'required'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required',
		),
	);
    
    public function __construct() {
        parent::__construct();
		$this->load->model('AdminModel');
    }
    
	public function index() {
		$this->form_validation->set_rules($this->form_rules);
		
		if ($this->hasLogin()) {
			$this->showMessage('/admin/home', 'You have login!', 2000);
			return;
		}
		
        if (!! $this->form_validation->run()) {
			$this->action();
		} else {
			$this->show();
		}
	}
	
    private function action() {
        $account = $this->input->post('account');
        $password = $this->input->post('password');
        
        $resultSet = $this->AdminModel->find(array(
            'account' => $account,
        ), 1, 0);
		
        if (empty($resultSet)) {
			$this->show(array( 'errmsg' => 'Account is not existed.', ));
			return;
        }
		
        $admin = $resultSet[0];
        
        if ($admin->password != md5($password)) {
			$this->show(array( 'errmsg' => 'Password incorrect!', ));
			return;
		}
		
		$this->session->set_userdata('ciic_account', $account);
		$this->session->set_userdata('ciic_haslogin', true);
		
		redirect('/admin/home');
    }
    
    private function show($data = array()) {
		$this->load->view('header');
        $this->load->view('admin/login', $data);
		$this->load->view('footer');
    }
}