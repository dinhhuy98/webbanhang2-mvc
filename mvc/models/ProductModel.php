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
		$sql = "SELECT * FROM item_tag,item WHERE item_tag.item_id=item.id AND item_tag.tag_id=$tag LIMIT $start,$limit;";
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
	

	public function getProductByCategory($arrCat, $start,$limit){
		$listCat = implode(",",$arrCat);
		$sql="SELECT * FROM item WHERE category IN(".$listCat.") ORDER BY id LIMIT $start,$limit;";
		$data = mysqli_query($this->conn,$sql);
		$arr = array();
		while($row = mysqli_fetch_assoc($data)){
			$arr[] = $row;
		}
		return json_encode($arr);
	}
	public function countProductByCategory($arrCat){
		$listCat = implode(",",$arrCat);
		$sql="SELECT id FROM item WHERE category IN(".$listCat.")";
		$data = mysqli_query($this->conn,$sql);
		return mysqli_num_rows($data);
	}

	public function countProductByTag($tag_id){
		$sql = "SELECT * FROM item_tag,item WHERE item_tag.item_id=item.id AND item_tag.tag_id=$tag_id";
		$data = mysqli_query($this->conn,$sql);
		return mysqli_num_rows($data);
	}
}
 ?>
