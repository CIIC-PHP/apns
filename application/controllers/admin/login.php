<?php

defined('BASEPATH') or die('Access deny!');

class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->load->model('AdminModel');
		$this->load->library('pagination');
    }
    
	public function index() {
		$config = array(
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
		$this->form_validation->set_rules($config);
		
        if ($this->form_validation->run() == false) {
			$this->show();
		} else {
			$this->action();
		}
	}
    
    private function action() {
        $account = $this->input->post('account');
        $password = $this->input->post('password');
        
        $result_set = $this->AdminModel->find(array(
            'account' => $account,
        ), 1, 0);
		
        if (empty($result_set)) {
			echo 'No such user!';
			return;
        }
        $admin = $result_set[0];
        
        if ($admin->password != md5($password)) {
			echo 'Password incorrect!';
			return;
		}
		echo 'ok';
    }
    
    private function show() {
		$this->load->view('header');
        $this->load->view('admin/login');
		$this->load->view('footer');
    }
}