<?php

defined('BASEPATH') or die('Access deny!');

class BaseModel extends CI_Model {
    
    protected $table = '';
    protected $attr = array();
    
    public function __construct() {
        parent::__construct();
    }
    
    public function __get($key) {
        if (isset($this->attr[$key])) {
            return $this->attr[$key];
        }
        return parent::__get($key);
    }
    
    public function __set($key, $val) {
        if (isset($this->attr[$key])) {
            $this->attr[$key] = $val;
            return;
        }
        show_error(__CLASS__.' has no such attribute called '.$key);
    }
    
    public function add() {
        $this->db->insert($this->table, $this->attr);
    }
    
    public function update($options = array()) {
        $this->db->update($this->table, $this->attr, $options);
    }
    
    public function del($options = array()) {
        $this->db->delete($this->table, $options);
    }
    
    public function find($options = array(), $limit = 10, $offset = 0) {
        $query = $this->db->get_where($this->table, $options, $limit, $offset);
        return $query->result();
    }
    
    public function count($options = array()) {
        $this->db->where($options);
        return $this->db->count_all_results($this->table);
    }
}