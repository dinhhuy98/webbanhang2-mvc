<?php 
class Login extends Controller{
	public $userModel;
	public function __construct(){
		$this->userModel=$this->model("UserModel");
	}

	public function index(){
		$this->view("master2",["page"=>"login"]);
	}

	public function checkLogin($username,$password){
		$user = json_decode($this->userModel->getUserByName($username));
			if(password_verify($password,$user->password))
				return $user;
		return null;
	}
	public function login(){
		if(!$_POST["btnLogin"]){
			header("location: http://localhost:8080/webbanhang2/");
		}
		else{
			$username = $_POST['username'];
			$password = $_POST['password'];
		$user = $this->checkLogin($username,$password);
		if($user==null)
			echo "0";
		else{
			$_SESSION['user']=$user->username;
			$_SESSION['hoten']=$user->hoten;
			$_SESSION['role']=$user->role;
			echo "1";
		}
	}
	}

	public function kkk(){
		$this->userModel->hhh();
	}

}
 ?>
