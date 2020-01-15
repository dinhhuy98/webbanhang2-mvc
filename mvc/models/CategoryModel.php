<?php 
class CategoryModel extends DB{

	public function loadCategory(){
		$sql = "SELECT * FROM category";
		$data = mysqli_query($this->conn,$sql);
		$arr = array();
		while($row = mysqli_fetch_assoc($data)){
			$arr[] = $row;
		}
		return $arr;
	}
	public function getChildCategory($parent_id){
		$sql = "SELECT id FROM category WHERE parent_id=$parent_id;";
		$data = mysqli_query($this->conn,$sql);
		$arr = array();
		while($row = mysqli_fetch_assoc($data)){
			$arr[] = $row['id'];
		}
		return $arr;
	}
	public function getCatIdByLink($link){
		$sql = "SELECT id FROM category WHERE link='$link'";
		$data = mysqli_query($this->conn,$sql);
		$result = null;
		if(mysqli_num_rows($data)>0){
			$row = mysqli_fetch_assoc($data);
			$result = $row['id'];
		}
		return $result;
	}
	public function getCategoryNameByLink($link){
		$sql = "SELECT name FROM category WHERE link='$link'";
		$data = mysqli_query($this->conn,$sql);
		$result = null;
		if(mysqli_num_rows($data)>0){
			$row = mysqli_fetch_assoc($data);
			$result = $row['name'];
		}
		return $result;
	}


}
 ?>