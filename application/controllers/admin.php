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
		$this->load->view('admin');
	}
    
    public function show($page = 1) {
		$size = 10;
		$page = $page < 1 ? 1 : $page;
		$total = $this->AdminModel->count();
		$page = ceil($total / $size) < $page ? ceil($total / $size) : $page;
		
		$config['base_url'] = site_url("admin/show/");
		$config['use_page_numbers'] = true;
		$config['total_rows'] = $total;
		$config['per_page'] = 20;
		$this->pagination->initialize($config);
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
}
