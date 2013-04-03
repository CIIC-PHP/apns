<?php

defined('BASEPATH') or die('Access deny!');

require('BaseModel.php');

class HistoryModel extends BaseModel {
    
    protected $table = 'history';
    protected $attr = array(
        'aid' => null,
        'uid' => null,
        'mid' => null,
        'createAt' => null,
    );
    
    public function __construct() {
        parent::__construct();
    }
}