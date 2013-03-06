<?php

defined('BASEPATH') or die('Access deny!');

require('BaseModel.php');

class AppModel extends BaseModel {
    
    protected $table = 'application';
    protected $attr = array(
        'id' => '',
        'name' => '',
        'description' => '',
        'createAt' => '',
        'caDev' => '',
        'caPro' => '',
    );
    
    public function __construct() {
        parent::__construct();
    }
}