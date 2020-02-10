<?php 
class UserModel extends DB{

	public function getUserByName($username){
		$sql = "SELECT * FROM users WHERE username='$username'";
		$data = mysqli_query($this->conn,$sql);
		$arr = array();
		while($row = mysqli_fetch_assoc($data)){
			$arr[] = $row;
		}
		return json_encode($arr);
	}

	public function addUser($hoten,$email,$sdt,$username,$password){
		$sql = "INSERT INTO users (username,password,hoten,email,sdt,role)
				VALUES ('$username','$password','$hoten','$email','$sdt',2)";
		$result = false;
		if(mysqli_query($this->conn,$sql)){
			$result = true;
		}

		return json_encode($result);
	}

		public function checkUsername(){
		$result=0;
		if(isset($_POST['username'])){
			$username=trim($_POST['username']);
			if($username=='')
				$result=1;// chua dien username
			else{
				$arrUser = json_decode($this->getUserByName($username));
				if(count($arrUser)>0)
					$result = 2; // username bi trung
			}

		}
		return $result;
	}
	public function checkPassword(){
		$result=0;
		if(isset($_POST['password'])){
			$pass=trim($_POST['password']);
			if($pass=='')
				$result=1;// chua dien password
			}
		return $result;
	}

	public function checkEmail(){
		$result=0;
		if(isset($_POST['email'])){
			$email=trim($_POST['email']);
			if($email=='')
				$result=1;// chua dien email
			else{
				if(!filter_var($email,FILTER_VALIDATE_EMAIL))
					$result=2; //email khong hop le
			}

		}
		return $result;
	}

	public function checkFullName(){
		$result=0;
		if(isset($_POST['hoten'])){
			$hoten=trim($_POST['hoten']);
			if($hoten=='')
				$result=1;// chua dien ho va ten
			}
		return $result;
	}

	public function checkPhoneNumber(){
		$result=0;
		if(isset($_POST['phone'])){
			$phone=trim($_POST['phone']);
			if($phone=='')
				$result=1;// chua dien so dien thoai
			else{
				$reg = '/^[0-9]{10,11}+$/';
				if(!preg_match($reg,$phone))
					$result=2; // so dien thoai khhong hop le
			}
		}
		return $result;
	}

}
 ?>
