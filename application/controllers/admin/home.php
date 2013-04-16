<?php

defined('BASEPATH') or die('Access deny!');

require_once(APPPATH.'controllers/base'.EXT);

class Home extends Base {
    
    public function __construct() {
        parent::__construct();
		$this->load->model('AdminModel');
    }
	
	public function index() {
		if (! $this->checkLogin()) return;
		
		$account = $this->session->userdata('ciic_account');
		$resultSet = $this->AdminModel->find(array(
			'account' => $account,
		));
		
		if (empty($resultSet)) {
			$this->showMessage('admin/login', 'Account broken!', 3000);
			return;
		}
		
		$admin = $resultSet[0];
		
		$this->show(array(
			'admin' => $admin,
		));
	}
	
	private function show($data = array()) {
		$this->load->view('header');
        $this->load->view('admin/home', $data);
		$this->load->view('footer');
	}
}