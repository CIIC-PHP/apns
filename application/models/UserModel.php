<?php

defined('BASEPATH') or die('Access deny!');

require('BaseModel.php');

class UserModel extends BaseModel {
    
    const T_DEV = 'dev', T_PRO = 'pro', T_NIL = 'nil';
    
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
    
    public function __set($key, $val) {
        if ('type' == $key and T_DEV != $val and T_PRO != $val and T_NIL != $val) {
            show_error(__CLASS__.' attribute called "type" must be a value of dev, pro, nil. you set "type" with "'.$val.'"');
        }
        parent::__set($key, $val);
        if (isset($this->attr[$key])) {
            $this->attr[$key] = $val;
            return;
        }
        show_error(__CLASS__.' has no such attribute called '.$key);
    }
}