<?php

defined('BASEPATH') or die('Access deny!');

class Unsub extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->load->model('UserModel');
    }
	
	public function index() {
		show_404();
	}
	
	public function dev($appId = '', $deviceToken = '') {
		$status = $this->action($appId, $deviceToken, UserModel::STATUS_TYPE_DEV);
		echo json_encode($status);
	}
    
	public function pro($appId = '', $deviceToken = '') {
		$status = $this->action($appId, $deviceToken);
		echo json_encode($status);
	}
	
	private function action($appId = '', $deviceToken = '', $status = UserModel::STATUS_TYPE_PRO) {
		// Find the user
		$resultSet = $this->UserModel->find(array(
			'deviceToken' => $deviceToken,
			'aid' => $appId,
		));
		
		// Check the user
		if (empty($resultSet)) {
			// No such user
			return array(
				'msg' => 'no such user',
			);
		}
		
		$user = $resultSet[0];
		
		// Check the status
		if (UserModel::STATUS_TYPE_NIL != $user->status) {
			// Update the status
			$this->UserModel->deviceToken = $user->deviceToken;
			$this->UserModel->createAt = $user->createAt;
			$this->UserModel->aid = $user->aid;
			$this->UserModel->status = UserModel::STATUS_TYPE_NIL;
			$this->UserModel->update(array(
				'deviceToken' => $user->deviceToken,
				'status' => $user->status,
			));
			return array(
				'msg' => 'success to unsubscribe',
			);
		}
		
		// Do nothing
		return array(
			'msg' => 'already unsubscribed',
		);
	}
}