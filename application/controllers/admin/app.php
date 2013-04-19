<?php

defined('BASEPATH') or die('Access deny!');

require_once(APPPATH.'controllers/base'.EXT);

class App extends Base {
    
	private $errmsg = '';
	
	private $form_rules = array(
        'create' => array(
            array( 'field' => 'id', 'label' => 'Id', 'rules' => 'required', ),
            array( 'field' => 'name', 'label' => 'Name', 'rules' => 'required', ),
            array( 'field' => 'description', 'label' => 'Description', 'rules' => 'required', ),
        ),
        'modify' => array(
            array( 'field' => 'name', 'label' => 'Name', 'rules' => 'required', ),
            array( 'field' => 'description', 'label' => 'Description', 'rules' => 'required', ),
            array( 'field' => 'status', 'label' => 'Password', 'rules' => 'required', ),
        ),
	);
	
    public function __construct() {
        parent::__construct();
        $this->load->model('AppModel');
		$upload_config = array();
		$upload_config['upload_path'] = FCPATH.'upload/';
		$upload_config['allowed_types'] = 'pem';
		//$upload_config['max_size'] = '100';
		
		$this->load->library('upload', $upload_config);
    }
	
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
	
	public function show($id) {
		$apps = $this->AppModel->find(array(
			'id' => $id,
		));
		$data = array(
			'app' => $apps[0],
		);
		$this->load->view('admin/app/show', $data);
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
		
		// Upload certificate (develop)
		if (! $this->upload->do_upload('caDev')) {
			$errmsg = 'You need to upload your dev.pem'.$this->upload->display_errors();
			$data = array(
				'errmsg' => $errmsg,
			);
			$this->showCreate($data);
			return;
		}
		
		$caDevInfo = $this->upload->data();
		
		// upload certificate (product)
		if (! $this->upload->do_upload('caPro')) {
			// remove certificate (develop)
			unlink($caDevInfo['full_path']);
			
			$errmsg = 'You need to upload your pro.pem'.$this->upload->display_errors();
			$data = array(
				'errmsg' => $errmsg,
			);
			$this->showCreate($data);
			return;
		}
		
		$caProInfo = $this->upload->data();
		
		/*
        if (preg_match('^[_A-Za-z][_A-Za-z0-9]+$', $id)) {
            $this->AppModel->id = $id;
            $this->AppModel->name = $name;
            $this->AppModel->description = $desc;
            $this->AppModel->caDev = $caDev;
            $this->AppModel->caPro = $caPro;
            $this->AppModel->status = AppModel::STATUS_TYPE_DEV;
            $this->AppModel->save();
        }
        */
		$data = array(
			'id' => $id,
			'name' => $name,
			'desc' => $desc,
			'cadev' => $caDevInfo,
			'capro' => $caProInfo,
		);
		echo '<pre>'.print_r($data, true).'</pre>';
    }
    
    private function doModify() {}
}