<?php 
class Home extends Controller{
	public $productModel;
	public $categoryModel;

	public function __construct(){
		$this->productModel = $this->model("ProductModel");
		$this->categoryModel = $this->model("CategoryModel");
	}

	function index(){
		$hotProduct = json_decode($this->productModel->getProductByTag(1,0,9));
		$newProduct = json_decode($this->productModel->getProductByTag(2,4,9));
		$saleProduct = json_decode($this->productModel->getProductByTag(3,5,9));
		$category = $this->categoryModel->loadCategory();
		$this->view("master1",["page"=>"home",
								"hotProduct"=>$hotProduct,
								"newProduct"=>$newProduct,
								"saleProduct"=>$saleProduct,
								"category"=>$category]);
	}

	function SayHi($a, $b){
	
		$tong =  $this->sinhVienModel->tong($a,$b);
		$ds = json_decode($this->sinhVienModel->getSV());
		$this->view("master1",["tong"=>$tong,"color"=>"red",
							"page"=>"news", "ds"=>$ds]);
	}
	function Show($a, $b){
		echo $a+$b;
		$this->view("master1",[]);
	}
}

 ?>