<?php

defined('BASEPATH') or die('Access deny!');

require_once(APPPATH.'controllers/base'.EXT);

class App extends Base {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('AppModel');
    }
    
    private $form_rules = array(
        'create' => array(
            array( 'field' => 'id', 'label' => 'Id', 'rules' => 'required' ),
            array( 'field' => 'name', 'label' => 'Name', 'rules' => 'required', ),
            array( 'field' => 'description', 'label' => 'Description', 'rules' => 'required', ),
            array( 'field' => 'caDev', 'label' => 'Certificate (Develop)', 'rules' => 'required', ),
            array( 'field' => 'caPro', 'label' => 'Certificate (Product)', 'rules' => 'required', ),
        ),
        'modify' => array(
            array( 'field' => 'name', 'label' => 'Name', 'rules' => 'required', ),
            array( 'field' => 'description', 'label' => 'Description', 'rules' => 'required', ),
            array( 'field' => 'caDev', 'label' => 'Certificate (Develop)', 'rules' => 'required', ),
            array( 'field' => 'caPro', 'label' => 'Certificate (Product)', 'rules' => 'required', ),
            array( 'field' => 'status', 'label' => 'Password', 'rules' => 'required', ),
        ),
	);
    
	public function index() {
        if (! $this->checkLogin()) return;
        show_404();
    }
    
    public function create() {
        if (! $this->checkLogin()) return;
        
        $this->form_validation->set_rules($this->form_rules['create']);
        
        if (!! $this->form_validation->run()) {
            $this->doCreate();
        } else {
            $this->showCreate();
        }
    }
    
    public function modify($id) {
        if (! $this->checkLogin()) return;
        
        echo 'modify';
    }
    
    public function deploy($id) {
        if (! $this->checkLogin()) return;
        
        echo 'deploy';
    }
    
    public function delete($id) {
        if (! $this->checkLogin()) return;
        
        echo 'delete';
    }
    
    private function showCreate($data = array()) {
        $this->load->view('header', array(
			'title' => 'Application Create',
		));
        $this->load->view('admin/app/create', $data);
		$this->load->view('footer');
    }
    
    private function showModify($data = array()) {
        $this->load->view('header', array(
			'title' => 'Application Modify',
		));
        $this->load->view('admin/app/modify', $data);
		$this->load->view('footer');
    }
    
    private function doCreate() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $desc = $this->input->post('description');
        $caDev = $this->input->post('caDev');
        $caPro = $this->input->post('caPro');
        
        if (preg_match('^[_A-Za-z][_A-Za-z0-9]+$', $id)) {
            $this->AppModel->id = $id;
            $this->AppModel->name = $name;
            $this->AppModel->description = $desc;
            $this->AppModel->caDev = $caDev;
            $this->AppModel->caPro = $caPro;
            $this->AppModel->status = AppModel::STATUS_TYPE_DEV;
            $this->AppModel->save();
        }
    }
    
    private function doModify() {}
}