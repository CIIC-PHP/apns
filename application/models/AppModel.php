<?php

defined('BASEPATH') or die('Access deny!');

require('BaseModel.php');

class AppModel extends BaseModel {
    
    const STATUS_TYPE_DEV = 'dev', STATUS_TYPE_PRO = 'pro', STATUS_TYPE_NIL = 'nil';
    
    protected $table = 'application';
    protected $attr = array(
        'id' => null,
        'name' => null,
        'description' => null,
        'createAt' => null,
        'caDev' => null,
        'caPro' => null,
        'status' => null,
    );
    
    public function __construct() {
        parent::__construct();
    }
    
    public function __set($key, $val) {
        if ('status' == $key and STATUS_TYPE_DEV != $val and STATUS_TYPE_PRO != $val and STATUS_TYPE_NIL != $val) {
            show_error(__CLASS__.' attribute called "status" must be a value of dev, pro, nil. you set "status" with "'.$val.'"');
        }
        parent::__set($key, $val);
    }
}