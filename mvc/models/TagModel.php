<?php 
class TagModel extends DB{
	public function getTagIdByLink($tag){
		$sql = "SELECT id FROM tag WHERE tag.link='$tag'";
		$data = mysqli_query($this->conn,$sql);
		$result = null;
		if(mysqli_num_rows($data)>0){
			$row = mysqli_fetch_assoc($data);
			$result = $row['id'];
		}
		return $result;
	}
	public function getTagNameById($id){
		$sql = "SELECT name FROM tag WHERE id='$id'";
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