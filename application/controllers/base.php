<?php

defined('BASEPATH') or die('Access deny!');

class Base extends CI_Controller {
	
    public function __construct() {
        parent::__construct();
    }
    
	public function index() {
		redirect('admin/login');
	}
	
	protected function hasLogin() {
		$account = $this->session->userdata('ciic_account');
		$hasLogin = $this->session->userdata('ciic_haslogin');
		return (! empty($account) and $hasLogin);
	}
	
	protected function checkLogin() {
		if ($this->hasLogin()) {
			return true;
		}
		$this->showMessage('/admin/login', 'You must login!', 2000);
		return false;
	}
	
	// Message box page
	protected function showMessage($uri, $message = '', $delay = false) {
		if (! $delay) {
			redirect($uri);
			return;
		}
		$this->load->view('header');
		$this->load->view('message', array(
			'url' => site_url($uri),
			'message' => $message,
			'delay' => intval($delay),
		));
		$this->load->view('footer');
	}
}