<?php 
class ProductModel extends DB{

	public function getAllProducts(){
		$sql = "SELECT * FROM item";
		$data = mysqli_query($this->conn,$sql);
		$arr = array();
		while($row = mysqli_fetch_assoc($data)){
			$arr[] = $row;
		}
		return json_encode($arr);
	}
	public function getProductByTag($tag, $start, $limit){
		$sql = "SELECT * FROM item WHERE tag=$tag LIMIT $start,$limit;";
		$data = mysqli_query($this->conn,$sql);
		$arr = array();
		while($row = mysqli_fetch_assoc($data)){
			$arr[] = $row;
		}
		return json_encode($arr);
	}
	public function getProductById($id){
		$sql = "SELECT *FROM item WHERE id=$id";
		$data = mysqli_query($this->conn,$sql);
		return json_encode(mysqli_fetch_assoc($data));
	}
}
 ?>
