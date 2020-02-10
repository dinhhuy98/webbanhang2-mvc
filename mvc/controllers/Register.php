<?php 
class Register extends Controller{
	public $categoryModel;
	public $userModel;

	public function __construct(){
		$this->categoryModel = $this->model("CategoryModel");
		$this->userModel = $this->model("UserModel");
	}

	public function index(){
		$category = $this->categoryModel->loadCategory();
		$this->view("master1",["page"=>"register",
								"category"=>$category]);
	}

	public function register(){
		if(!isset($_POST['btnRegister'])){
			header("location: http://localhost:8080/webbanhang2/");
		}
		else{
			$hoten = $_POST['hoten'];
			$email = $_POST['email'];
			$sdt = $_POST['phone'];
			$username = $_POST['username'];
			$check = $this->userModel->checkEmail()+$this->userModel->checkPassword()+$this->userModel->checkUsername()+$this->userModel->checkPhoneNumber()+$this->userModel->checkFullName();
			if($check==0){
				$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
				$result = json_decode($this->userModel->addUser($hoten,$email,$sdt,$username,$password));
				if($result==false)
					$check=1;
			}
			$category = $this->categoryModel->loadCategory();
			$this->view("master1",["page"=>"register-notify",
								"category"=>$category,
								"success"=>$check]);
		}
	}

}

 ?>