<?php 
class DB{

	protected $conn;
	protected $host=DB_HOST;
	protected $username =DB_USERNAME;
	protected $password = DB_PASSWORD;
	protected $dbname = DB_NAME;

	function __construct(){
		$this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->dbname) or die ("CONNECT ERROR");
		mysqli_set_charset($this->conn,'utf8');
	}


}

 ?>