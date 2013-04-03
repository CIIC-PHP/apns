<?php

defined('BASEPATH') or die('Access deny!');

require('BaseModel.php');

class TaskModel extends BaseModel {
    
    protected $table = 'task';
    protected $attr = array(
        'aid' => null,
        'uid' => null,
        'mid' => null,
    );
    
    public function __construct() {
        parent::__construct();
    }
}