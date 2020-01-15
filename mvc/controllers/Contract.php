<?php 
class Contract extends Controller{
	public $categoryModel;
	public function __construct(){
		$this->categoryModel = $this->model("CategoryModel");
	}
	public function index(){
		$category = $this->categoryModel->loadCategory();
		$this->view("master1",["page"=>"contract",
								"category"=>$category]);
	}
}

 ?>