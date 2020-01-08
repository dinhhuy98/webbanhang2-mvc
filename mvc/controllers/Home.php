<?php 
class Home extends Controller{
	public $productModel;

	public function __construct(){
		$this->productModel = $this->model("ProductModel");
	}

	function index(){
		$hotProduct = json_decode($this->productModel->getProductByTag(1,0,9));
		$newProduct = json_decode($this->productModel->getProductByTag(2,0,9));
		$saleProduct = json_decode($this->productModel->getProductByTag(3,0,9));
		$this->view("master1",["page"=>"home",
								"hotProduct"=>$hotProduct,
								"newProduct"=>$newProduct,
								"saleProduct"=>$saleProduct]);
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