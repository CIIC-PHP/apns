<?php

defined('BASEPATH') or die('Access deny!');

class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->load->library('pagination');
		$this->load->helper('url');
    }
    
}