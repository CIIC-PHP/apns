<?php

defined('BASEPATH') or die('Access deny!');

require('BaseModel.php');

class AdminModel extends BaseModel {
    
    const ROLE_TYPE_FOUNDER = 'founder', ROLE_TYPE_MANAGER = 'manager', ROLE_TYPE_GUEST = 'guest';
    
    protected $table = 'admin';
    protected $attr = array(
        'account' => null,
        'password' => null,
        'role' => null,
    );
    
    public function __construct() {
        parent::__construct();
    }
    
    public function __set($key, $val) {
        if ('role' == $key and self::ROLE_TYPE_FOUNDER != $val and self::ROLE_TYPE_MANAGER != $val and self::ROLE_TYPE_GUEST != $val) {
            show_error(__CLASS__.' attribute called "role" must be a value of (founder, manager, guest). you set "role" with "'.$val.'"');
        }
        parent::__set($key, $val);
    }
}