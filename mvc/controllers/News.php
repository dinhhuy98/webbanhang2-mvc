<?php 
class News extends Controller{
	public $categoryModel;
	function SayHi(){
		echo "New-sayhi";
	}
	function __construct(){
		$this->categoryModel = $this->model("CategoryModel");
		
	}
	public function index(){
		$category = $this->categoryModel->loadCategory();
		$this->view("master1",["page"=>"news","category"=>$category])	;
	}
}
 ?>
