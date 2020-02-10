<?php 
class Ajax extends Controller{
	protected $userModel;

	public function __construct(){
		$this->userModel = $this->model('UserModel');
	}

	public function checkUsername(){
		echo $this->userModel->checkUsername();
	}

	public function checkPassword(){
		echo $this->userModel->checkPassword();
	}

	public function checkFullName(){
		echo $this->userModel->checkFullName();
	}
	public function checkEmail(){
		echo $this->userModel->checkEmail();
	}
	public function checkPhoneNumber(){
		echo $this->userModel->checkPhoneNumber();
	}
}

 ?>