<?php

defined('BASEPATH') or die('Access deny!');

require('BaseModel.php');

class UserModel extends BaseModel {
    
    protected $table = 'user';
    protected $attr = array(
        'deviceToken' => '',
        'createAt' => '',
        'applicationId' => '',
        'type' => '',
    );
    
    public function __construct() {
        parent::__construct();
    }
}