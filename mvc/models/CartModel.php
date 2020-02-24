<?php
require_once("./mvc/models/ProductModel.php");

class CartModel extends DB{
	public $productModel;
	public function __construct(){
		parent::__construct();
		$this->productModel = new ProductModel();
	
}

	public function addCart(){
		$result=0;
		if(isset($_POST['id_item']) &&isset($_POST['id_color']) &&isset($_POST['id_size'])){
			$id_item = $_POST['id_item'];
			$id_color = $_POST['id_color'];
			$id_size = $_POST['id_size'];
			$stock = json_decode($this->productModel->getStockId($id_item,$id_color,$id_size));
			if(!empty($stock)){
				$id = $stock->id;
				if(array_key_exists($id,$_SESSION['cart']))
					$result=2; //da co trong cart
				else{
					$_SESSION['cart'][$id]=1;
					$result=1;
				}
			}

		}
		return $result;
	}
	public function countItem(){
		return count($_SESSION['cart']);
	}

	public function checkAddress($province_id, $district_id, $ward_id, $address){
		$check=1;
		$sql1 = "SELECT _name FROM province WHERE id=$province_id";
		$data1 = mysqli_query($this->conn,$sql1);
		if(mysqli_num_rows($data1)<1)
			$check=0;

		$sql2 = "SELECT _name FROM district WHERE id=$district_id";
		$data2 = mysqli_query($this->conn,$sql1);
		if(mysqli_num_rows($data2)<1)
			$check=0;

		$sql3 = "SELECT _name FROM ward WHERE id=$ward_id";
		$data3 = mysqli_query($this->conn,$sql1);
		if(mysqli_num_rows($data3)<1)
			$check=0;

		if(trim($address)=='')
			$check=0;
		return $check; 
	}

	public function addAddress($hoten,$phone,$province_id,$district_id,$ward_id,$address){
		$sql = "INSERT INTO address (name,`address-detail`,phone,id_province,id_district,id_ward)
				VALUES ('$hoten','$address','$phone',$province_id,$district_id,$ward_id)";
		$result = false;
		if(mysqli_query($this->conn,$sql)){
			$result = true;
		}

		return $result;
	}

	public function getIdAddress($hoten,$phone,$province_id,$district_id,$ward_id,$address){
		$sql = "SELECT id FROM address WHERE name='$hoten' AND `address-detail`='$address' AND phone='$phone' AND id_province=$province_id AND id_district=$district_id AND id_ward=$ward_id";
		$data = mysqli_query($this->conn,$sql);
		$id=null;
		if(mysqli_num_rows($data)>0){
			$row = mysqli_fetch_assoc($data);
			$id = $row['id'];
		}
		return $id;
	}

	public function getIdOrder($id_address){
		$sql = "SELECT id FROM orders WHERE id_address=$id_address";
		$data = mysqli_query($this->conn,$sql);
		$id=null;
		if(mysqli_num_rows($data)>0){
			$row = mysqli_fetch_assoc($data);
			$id = $row['id'];
		}
		return $id;
	}

	public function addOrder($id_address,$id_user, $arrOrder,$total){
		$date = date("Y-m-d");
		if($id_user!=null)
			$sql1 = "INSERT INTO orders (id_user,id_address,date,total,status) VALUES ($id_user,$id_address,'$date',$total,0)";
		else
			$sql1 = "INSERT INTO orders (id_address,date,total,status) VALUES ($id_address,'$date',$total,0)";
		$check=1;
		if(mysqli_query($this->conn,$sql1)){
			$id_order = $this->getIdOrder($id_address);
			if($id_order!=null){
				foreach ($arrOrder as $id_stock => $quantity) {
					$sql2 = "INSERT INTO order_stock (id_order,id_stock,quantity) VALUES ($id_order,$id_stock,$quantity)";
					mysqli_query($this->conn,$sql2);
				}
			}
			else
				$check=0;
		}
		else
			$check=0;
		return $check;
	}



	public function getItemByArrayId($arrId){
		$result = array();
		if(count($arrId)==0)
			return json_decode(0);
		$str = implode(",", $arrId);
		//$sql = "SELECT * FROM item WHERE id IN (".$str.");";

		$sql = "SELECT item.name AS name,color.name AS color, size.name AS size, stock.number AS number, item.price AS price, item.image AS image, stock.id AS id FROM (SELECT * FROM stock WHERE id IN (".$str.")) AS stock,item,color,size WHERE stock.id_item=item.id AND stock.id_color = color.id AND stock.id_size=size.id";
		$data = mysqli_query($this->conn,$sql);
		
		while($row = mysqli_fetch_assoc($data)){
			$result[] = $row;
		}
		return json_encode($result);
		/*SELECT item.name AS name,color.name AS color, size.name AS size, stock.number AS number FROM stock,item,color,size WHERE stock.id=3 AND stock.id_item=item.id AND stock.id_color = color.id AND stock.id_size=size.id;*/
	}

	public function getPriceByIdStock($id){
		$sql = "SELECT item.price FROM stock, item WHERE stock.id=$id AND stock.id_item=item.id;";
		$data = mysqli_query($this->conn,$sql);
		$result = array();
		return json_encode(mysqli_fetch_assoc($data));
	}

	public function total($id){
		$total=0;
		if($_SESSION['cart'][$id]){
			$number = $_SESSION['cart'][$id];
			$item = json_decode($this->getPriceByIdStock($id));
			if($number>0 && $item!=null ){
				$total = $number*$item->price;
			}
		}
		return json_encode($total);
	}

	public function totalAll(){
		$arr =array();
		foreach ($_SESSION['cart'] as$key=> $value) {
			$arr[] = $key;
			}
		$total=0;
		if(count($arr)>0){
		$arrItem = json_decode($this->getItemByArrayId($arr));
		
		foreach ($arrItem as $item) {
			$total+=$item->price*$_SESSION['cart'][$item->id];
		}
	}
		return json_encode($total);
	}

	public function showImage($src){
		$html = '';
		$html.= '<div class="col-md-3 mb-2 bg-white pt-2 text-center offset-md-4 pb-2">';
		$html.= '<span class="close">&times;</span>';
		$html.= '<img src="'.$src.'"alt="Image" class="img-fluid" style="height:400px; width:300px;"></div';
		return $html;
	}

	public function changeItemQuantity($id,$number){
		$result=0;
		if($number>0 && isset($_SESSION['cart'][$id])){
			$_SESSION['cart'][$id]=$number;
			$result=1;
		}
		return json_decode($result);
	}

	public function deleteItem($id){
		$result=0;
		if(isset($_SESSION['cart'][$id])){
			unset($_SESSION['cart'][$id]);
			$result=1;
		}
		return json_encode($result);

	}

	public function loadProvince(){
		$sql = "SELECT * FROM province ORDER BY id ASC;";
		$data = mysqli_query($this->conn,$sql);
		$result = array();
		while($row = mysqli_fetch_assoc($data)){
			$result[]=$row;
		}
		return json_encode($result);
	}

	public function loadDistrictByProvinceId($provinceId){
		$sql = "SELECT * FROM district WHERE _province_id=$provinceId;";
		$data = mysqli_query($this->conn,$sql);
		$result = array();
		while($row = mysqli_fetch_assoc($data)){
			$result[]=$row;
		}
		return json_encode($result);
	}

	public function loadWardByDistrictId($districtId){
		$sql = "SELECT * FROM ward WHERE _district_id=$districtId;";
		$data = mysqli_query($this->conn,$sql);
		$result = array();
		while($row = mysqli_fetch_assoc($data)){
			$result[]=$row;
		}
		return json_encode($result);
	}

}

 ?>