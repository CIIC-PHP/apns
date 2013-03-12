<?php

defined('BASEPATH') or die('Access deny!');

class Logout extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->load->model('AdminModel');
		$this->load->library('pagination');
		$this->load->helper('url');
    }
    
	public function index() {
        $this->action();
	}
    
    private function action() {
    }
}