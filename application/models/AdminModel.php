<?php

defined('BASEPATH') or die('Access deny!');

require('BaseModel.php');

class AdminModel extends BaseModel {
    
    protected $table = 'admin';
    protected $attr = array(
        'account' => '',
        'password' => '',
        'authority' => '',
    );
    
    public function __construct() {
        parent::__construct();
    }
}