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

	public function getStockId($id_item,$id_color,$id_size){
		$sql = "SELECT id FROM stock WHERE id_item=$id_item AND id_color=$id_color AND id_size=$id_size";
		$data = mysqli_query($this->conn,$sql);
		return json_encode(mysqli_fetch_assoc($data));
	}

	public function countProductByTag($tag_id){
		$sql = "SELECT * FROM item_tag,item WHERE item_tag.item_id=item.id AND item_tag.tag_id=$tag_id";
		$data = mysqli_query($this->conn,$sql);
		return mysqli_num_rows($data);
	}

	public function getProductsByName($name, $start, $limit){
		$sql = "SELECT * FROM item WHERE name LIKE '%$name%' ORDER BY id LIMIT $start,$limit";
		$data = mysqli_query($this->conn,$sql);
		$arr = array();
		while($row = mysqli_fetch_assoc($data)){
			$arr[] = $row;
		}
		return json_encode($arr);
	}

	public function countProductByName($name){
		$sql = "SELECT * FROM item WHERE name LIKE '%$name%' ORDER BY id";
		$data = mysqli_query($this->conn,$sql);
		return mysqli_num_rows($data);
	}

	public function getColorOfProduct($id){
		$sql = "SELECT DISTINCT color.id,color.name FROM stock,color WHERE stock.id_item = $id AND stock.id_color=color.id;";
		$data = mysqli_query($this->conn,$sql);
		$arr = array();
		while($row = mysqli_fetch_assoc($data)){
			$arr[] = $row;
		}
		return json_encode($arr);
	}

	public function getSizeOfProduct($id){
		$sql = "SELECT DISTINCT size.id,size.name FROM stock,size WHERE stock.id_item = $id AND stock.id_size=size.id;";
		$data = mysqli_query($this->conn,$sql);
		$arr = array();
		while($row = mysqli_fetch_assoc($data)){
			$arr[] = $row;
		}
		return json_encode($arr);
	}


}
 ?>
