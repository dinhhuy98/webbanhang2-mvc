<?php 
class Cart extends Controller{
	public $productModel;
	public $categoryModel;
	public $cartModel;
	public $userModel;

	public function __construct(){
		$this->productModel = $this->model("ProductModel");
		$this->categoryModel = $this->model("CategoryModel");
		$this->cartModel = $this->model("CartModel");
		$this->userModel = $this->model("UserModel");
	}
	public function cartNotify(){
		$this->view("master2",["page"=>"cart-notify"]);
	}

	public function index(){
		$arr =array();
		foreach ($_SESSION['cart'] as$key=> $value) {
			$arr[] = $key;
			}
		$arrItem = json_decode($this->cartModel->getItemByArrayId($arr));
		$category = $this->categoryModel->loadCategory();
		$total = json_decode($this->cartModel->totalAll());
		$this->view("master1",[	'page'=>'cart',
								'category'=>$category,
								'arrItem'=>$arrItem, 
								'total'=>$total]);
	}

	public function order(){
		$arr =array();
		foreach ($_SESSION['cart'] as$key=> $value) {
			$arr[] = $key;
			}	
		$arrItem = json_decode($this->cartModel->getItemByArrayId($arr));
		$category = $this->categoryModel->loadCategory();
		$total = json_decode($this->cartModel->totalAll());
		$arrProvince =json_decode($this->cartModel->loadProvince());
		$user=null;
		if(isset($_SESSION['user']))
			$user = json_decode($this->userModel->getUserByName($_SESSION['user']));
		$this->view("master1",[	'page'=>'order',
								'category'=>$category,
								'arrItem'=>$arrItem, 
								'total'=>$total,
								'arrProvince'=>$arrProvince,
								'user'=>$user]);
	}

	public function orderConfirm(){
		if(!isset($_POST['submit']))
			header("location: http://localhost:8080/webbanhang2/");
		$hoten = $_POST['hoten'];
		$phone = $_POST['phone'];
		$province = $_POST['province'];
		$district = $_POST['district'];
		$ward = $_POST['ward'];
		$address = $_POST['address'];
		$category = $this->categoryModel->loadCategory();
		$check=1;
		if($this->cartModel->checkAddress($province,$district,$ward,$address) && 
			$this->userModel->checkFullName($hoten)==0 && $this->userModel->checkPhoneNumber($phone)==0)
		{

			if(!$this->cartModel->addAddress($hoten,$phone,$province,$district,$ward,$address))
				$check=0;
			else{

				$id=$this->cartModel->getIdAddress($hoten,$phone,$province,$district,$ward,$address);
				if($id!=null){
					
					$user_id=null;
					if(isset($_SESSION['user'])){
						$user = json_decode($this->userModel->getUserByName($_SESSION['user']));
						$user_id = $user->id;
					}
					$arrOrder = $_SESSION['cart'];
					$total = json_decode($this->cartModel->totalAll());
					if(!$this->cartModel->addOrder($id,$user_id,$arrOrder,$total)){
						$check=0;
					}
				}
				else
					$check=0;
			}


		}
		else
			$check=0;
		if($check==1){
			unset($_SESSION['cart']);
			$_SESSION['cart']=array();
		}
		$this->view("master1",[	'page'=>'order-confirm',
								'category'=>$category,
								'check'=>$check
								]);
		}
	}



 ?>