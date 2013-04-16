<?php

defined('BASEPATH') or die('Access deny!');

class Service extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->load->model('UserModel');
    }
    
	public function index() {
		show_404();
	}
    
    public function sub($appId = '', $deviceToken = '', $status = UserModel::STATUS_TYPE_PRO) {
		// Find the user
		$resultSet = $this->UserModel->find(array(
			'deviceToken' => $deviceToken,
			'aid' => $appId,
		));
		
		// Check the user
		if (empty($resultSet)) {
			// Add a new user
			$this->UserModel->deviceToken = $deviceToken;
			$this->UserModel->status = $status;
			$this->UserModel->aid = $appId;
			$this->UserModel->add();
			echo 'success to register';
			return;
		}
		
		$user = $resultSet[0];
		
		// Check the status
		if (UserModel::STATUS_TYPE_NIL == $user->status) {
			// Update the status
			$this->UserModel->deviceToken = $user->deviceToken;
			$this->UserModel->createAt = $user->createAt;
			$this->UserModel->aid = $user->aid;
			$this->UserModel->status = UserModel::STATUS_TYPE_PRO;
			$this->UserModel->update($user);
		}
		
		// Do nothing
		echo 'success to update';
		return;
    }
    
    public function unsub($appId = '', $deviceToken = '') {
        if (! empty($appId) and ! empty($deviceToken)) {
            echo $appId;
            echo '<hr/>';
            echo $deviceToken;
        }
    }
}