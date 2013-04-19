<?php

defined('BASEPATH') or die('Access deny!');

require('BaseModel.php');

class UserModel extends BaseModel {
    
    const STATUS_TYPE_DEV = 'dev', STATUS_TYPE_PRO = 'pro', STATUS_TYPE_NIL = 'nil';
    
    protected $table = 'user';
    protected $attr = array(
        'deviceToken' => null,
        'createAt' => null,
        'aid' => null,
        'status' => null,
    );
    
    public function __construct() {
        parent::__construct();
    }
    
    public function __set($key, $val) {
        if ('status' == $key and UserModel::STATUS_TYPE_DEV != $val and UserModel::STATUS_TYPE_PRO != $val and UserModel::STATUS_TYPE_NIL != $val) {
            show_error(__CLASS__.' attribute called "status" must be a value of dev, pro, nil. you set "status" with "'.$val.'"');
        }
        parent::__set($key, $val);
    }
}