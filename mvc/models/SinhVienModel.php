<?php 
class SinhVienModel extends DB{
	public function getSV(){
		$sql = "SELECT * FROM item";
		$data = mysqli_query($this->conn,$sql);
		$arr = array();
		while($row = mysqli_fetch_assoc($data)){
			$arr[] = $row;
		}
		return json_encode($arr);
		
	}
	public function insert(){

	}
	public function tong($a, $b){
		return $a+$b;
	}


}
 ?>
