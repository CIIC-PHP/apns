<?php

defined('BASEPATH') or die('Access deny!');

require('BaseModel.php');

class MsgModel extends BaseModel {
    
    const STATUS_TYPE_PREPARE = 'prepare',
    STATUS_TYPE_READY = 'ready',
    STATUS_TYPE_SENDING = 'sending',
    STATUS_TYPE_SENT = 'sent',
    STATUS_TYPE_CANCEL = 'cancel';
    
    protected $table = 'message';
    protected $attr = array(
        'id' => null,
        'alert' => null,
        'badge' => null,
        'sound' => null,
        'aid' => null,
        'createAt' => null,
        'status' => null,
    );
    
    public function __construct() {
        parent::__construct();
    }
    
    public function __set($key, $val) {
        if ('status' == $key and STATUS_TYPE_PREPARE != $val and STATUS_TYPE_READY != $val and STATUS_TYPE_SENDING != $val and STATUS_TYPE_SENT != $val and STATUS_TYPE_CANCEL != $val) {
            show_error(__CLASS__.' attribute called "status" must be a value of (prepare, ready, sending, sent, cancel). you set "status" with "'.$val.'"');
        }
        parent::__set($key, $val);
    }
}