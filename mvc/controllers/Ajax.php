<?php 
class Ajax extends Controller{
	protected $userModel;
	protected $cartModel;
	protected $productModel;

	public function __construct(){
		$this->userModel = $this->model('UserModel');
		$this->cartModel = $this->model('CartModel');
		$this->productModel = $this->model('ProductModel');
	}

	public function checkUsername(){
		echo $this->userModel->checkUsername();
	}

	public function checkPassword(){
		echo $this->userModel->checkPassword();
	}

	public function checkFullName(){
		echo $this->userModel->checkFullName();
	}
	public function checkEmail(){
		echo $this->userModel->checkEmail();
	}
	public function checkPhoneNumber(){
		echo $this->userModel->checkPhoneNumber();
	}
	public function addCart(){
		echo $this->cartModel->addCart();
	}
	public function countItem(){
		echo $this->cartModel->countItem();
	}

	public function total(){
		if(isset($_POST['id'])){
			$id = $_POST['id'];
			$total= json_decode($this->cartModel->total($id));
			echo number_format($total,0," ",".").' VND';
		}
	}

	public function totalAll(){
			$total= json_decode($this->cartModel->totalAll());
			echo " ".number_format($total,0," ",".").' VND';
		
	}

	public function showImage(){
		if(isset($_POST['src'])){
			$src = $_POST['src'];
			echo $this->cartModel->showImage($src);
		}
	}


	public function changeItemQuantity(){
		if(isset($_POST['id']) && isset($_POST['number'])){
			$id = $_POST['id'];
			$number = $_POST['number'];
			echo json_decode($this->cartModel->changeItemQuantity($id,$number));						
		}
	}

	public function deleteItem(){
		if(isset($_POST['id'])){
			$id = $_POST['id'];
			echo json_decode($this->cartModel->deleteItem($id));
		}
	}

	public function quickViewProduct(){
		if(isset($_POST['id'])){
			$id = $_POST['id'];

			$item = json_decode($this->productModel->getProductById($id));
		$arrSize = json_decode($this->productModel->getSizeOfProduct($id));
		$arrColor = json_decode($this->productModel->getColorOfProduct($id));
		$this->view("master2",["page"=>"cart-notify",'item'=>$item,
								
								"arrSize"=>$arrSize, 
								"arrColor"=>$arrColor]);
		}
	}

	public function loadDistrictByProvinceId(){
		if(isset($_POST['id'])){
			$id = $_POST['id'];
			$arrDistrict = json_decode($this->cartModel->loadDistrictByProvinceId($id));
			echo '<option value="null" selected>Chọn quận/huyện</option>';
			foreach ($arrDistrict as $district) {
				echo '<option value="'.$district->id.'" >'.$district->_name.'</option>';
			}
		}
	}

	public function loadWardByDistrictId(){
		if(isset($_POST['id'])){
			$id = $_POST['id'];
			$arrWard = json_decode($this->cartModel->loadWardByDistrictId($id));
			echo '<option value="null" selected>Chọn xã/phường</option>';
			foreach ($arrWard as $ward) {
				echo '<option value="'.$ward->id.'" >'.$ward->_name.'</option>';
			}
		}
	}

}

 ?>