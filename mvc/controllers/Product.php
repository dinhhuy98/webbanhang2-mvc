<?php 
class Product extends Controller{
	public $productModel;

	public function __construct(){
		$this->productModel = $this->model("ProductModel");
	}
	public function index(){

	}

	public function productDetail($id){
		$item = json_decode($this->productModel->getProductById($id));
		$this->view("master1",["page"=>"product-detail",'item'=>$item]);
	}
}

 ?>