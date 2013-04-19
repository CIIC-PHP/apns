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
	
	public function show($id = '') {
		$apps = $this->AppModel->find(array(
			'id' => $id,
		));
		
		if (empty($apps)) {
			$this->showMessage('/admin/app/create', 'The Application does not exists!', 2000);
			return;
		}
		
		$data = array(
			'app' => $apps[0],
		);
		
		$this->load->view('header', array(
			'title' => 'Application Information',
		));
        $this->load->view('admin/app/show', $data);
		$this->load->view('footer');
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
	
    public function modify($id = '') {
        if (! $this->checkLogin()) return;
        
        $this->form_validation->set_rules($this->form_rules['modify']);
        
        if (!! $this->form_validation->run()) {
            $this->doModify();
        } else {
            $this->showModify($id);
        }
    }
    
    public function deploy($id = '') {
        if (! $this->checkLogin()) return;
        
        echo 'deploy';
    }
    
    public function delete($id = '') {
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
    
    private function showModify($id = '', $data = array()) {
		$apps = $this->AppModel->find(array(
			'id' => $id,
		));
		
		if (empty($apps)) {
			$this->showMessage('/admin/app/create', 'The Application does not exists!', 2000);
			return;
		}
		
		$data['app'] = $apps[0];
		$data['status'] = array(
			'Development' => AppModel::STATUS_TYPE_DEV,
			'Production' => AppModel::STATUS_TYPE_PRO,
			'Unavailable' => AppModel::STATUS_TYPE_NIL,
		);
		
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
		$caDevNeed = $this->input->post('caDevNeed');
		$caProNeed = $this->input->post('caProNeed');
		$caDevInfo = '';
		$caProInfo = '';
		$caDev = '';
		$caPro = '';
		
		// Upload certificate (develop)
		if ('caDevNeed' == $caDevNeed) {
			// Check upload
			if (! $this->upload->do_upload('caDev')) {
				$errmsg = 'You need to upload your dev.pem'.$this->upload->display_errors();
				$data = array(
					'errmsg' => $errmsg,
				);
				$this->showCreate($data);
				return;
			}
			// Get upload information
			$caDevInfo = $this->upload->data();
			$caDev = $caDevInfo['file_path'].$id.'_dev.pem';
			if (file_exists($caDev)) {
				unlink($caDev);
			}
			rename($caDevInfo['full_path'], $caDev);
		}
		
		// Upload certificate (product)
		if ('caProNeed' == $caProNeed) {
			if (! $this->upload->do_upload('caPro')) {
				if ('caDevNeed' == $caDevNeed) {
					// Remove certificate (develop) if upload
					unlink($caDevInfo['full_path']);
				}
				$errmsg = 'You need to upload your pro.pem'.$this->upload->display_errors();
				$data = array(
					'errmsg' => $errmsg,
				);
				$this->showCreate($data);
				return;
			}
			// Get upload information
			$caProInfo = $this->upload->data();
			$caPro = $caProInfo['file_path'].$id.'_pro.pem';
			if (file_exists($caPro)) {
				unlink($caPro);
			}
			rename($caProInfo['full_path'], $caPro);
		}
		
        if (preg_match('/^[_A-Za-z][_A-Za-z0-9]+$/', $id)) {
            $this->AppModel->id = $id;
            $this->AppModel->name = $name;
            $this->AppModel->description = $desc;
            $this->AppModel->caDev = $caDev;
            $this->AppModel->caPro = $caPro;
            $this->AppModel->status = AppModel::STATUS_TYPE_DEV;
            $this->AppModel->add();
        }
		
		$this->showMessage('/admin/app/show/'.$id);
    }
    
    private function doModify() {}
}