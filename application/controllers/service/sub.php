<?php

defined('BASEPATH') or die('Access deny!');

class Sub extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
	public function index() {
	}
    
    public function test() {
        echo 'test';
    }
}