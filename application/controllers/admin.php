<?php

defined('BASEPATH') or die('Access deny!');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->load->model('AdminModel');
		$this->load->library('pagination');
		$this->load->helper('url');
    }
    
	public function index() {
		$this->login();
	}
    
    public function login() {
        $submit = $this->input->post('submit');
        if (empty($submit)) {
            $this->load->view('admin/login');
            return;
        }
        $account = $this->input->post('account');
        $password = $this->input->post('password');
        
        $admin = $this->AdminModel->find(array(
            'account' => $account,
        ), 1, 0);
        
        print_r($admin);
        echo '<hr/>';
        echo $account;
        echo '<hr/>';
        echo md5($password);
    }
    
    public function show($page = 1) {
		$size = 10;
		$page = $page < 1 ? 1 : $page;
		$total = $this->AdminModel->count();
		$page = ceil($total / $size) < $page ? ceil($total / $size) : $page;
		$list = $this->AdminModel->find(array(), $size, ($page - 1) * $size);
		
		$this->pagination->initialize(array(
			'base_url' => site_url('admin/show/'),
			'use_page_numbers' => true,
			'total_rows' => $total,
			'per_page' => $size,
		));
		
		echo '<pre>'.print_r($list, true).'</pre>';
		echo '<hr/>';
		echo $this->pagination->create_links();
	}
	
	public function add() {
		$admin = new $this->AdminModel;
		for ($i = 0; $i < 10; $i++) {
			$admin->account = 'admin_'.time().'_'.$i;
			$admin->password = md5('123456');
			$admin->authority = '';
			$admin->add();
		}
	}
	
	public function test($appId = '', $deviceToken) {
		echo $arg1.'<hr/>';
		echo $arg2.'<hr/>';
	}
}