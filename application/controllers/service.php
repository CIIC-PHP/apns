<?php

defined('BASEPATH') or die('Access deny!');

class Service extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function __before() {
    }
    
	public function index() {
	}
    
    public function sub($appId = '', $deviceToken = '') {
        if (! empty($appId) and ! empty($deviceToken)) {
            echo $appId;
            echo '<hr/>';
            echo $deviceToken;
        }
    }
    
    public function unsub($appId = '', $deviceToken = '') {
        if (! empty($appId) and ! empty($deviceToken)) {
            echo $appId;
            echo '<hr/>';
            echo $deviceToken;
        }
    }
}