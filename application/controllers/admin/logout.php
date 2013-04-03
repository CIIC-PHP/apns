<?php

defined('BASEPATH') or die('Access deny!');

require_once(APPPATH.'controllers/base'.EXT);

class Logout extends Base {
    
    public function __construct() {
        parent::__construct();
    }
    
	public function index() {
        $this->action();
	}
    
    private function action() {
		$this->session->unset_userdata('ciic_account');
		$this->session->unset_userdata('ciic_haslogin');
		$this->showMessage('admin/login', 'Logout success!', 2000);
    }
}