<?php

defined('BASEPATH') or die('Access deny!');

require('BaseModel.php');

class MsgModel extends BaseModel {
    
    protected $table = 'message';
    protected $attr = array(
        'id' => '',
        'alert' => '',
        'badge' => '',
        'sound' => '',
        'aid' => '',
        'createAt' => '',
    );
    
    public function __construct() {
        parent::__construct();
    }
}