<?php 
class Product extends Controller{
	public $productModel;
	public $categoryModel;
	public $tagModel;

	public function __construct(){
		$this->productModel = $this->model("ProductModel");
		$this->categoryModel = $this->model("CategoryModel");
		$this->tagModel = $this->model("TagModel");
	}
	public function index(){

	}

	public function productDetail($id){
		$category = $this->categoryModel->loadCategory();
		$item = json_decode($this->productModel->getProductById($id));
		$this->view("master1",["page"=>"product-detail",'item'=>$item,
								"category"=>$category]);
	}

	public function category($cat, $page=1){
		$cat_id = $this->categoryModel->getCatIdByLink($cat);
		$cat_name = $this->categoryModel->getCategoryNameByLink($cat);
		$arrCat = $this->categoryModel->getChildCategory($cat_id);
		$arrCat[]=$cat_id;
		$arrProduct=json_decode(
			$this->productModel->getProductByCategory($arrCat,($page-1)*6,6));
		$numberPage = ceil($this->productModel->countProductByCategory($arrCat)/6);
		$category = $this->categoryModel->loadCategory();

		$this->view("master1",["page"=>"product",
								"category"=>$category,
								"listproduct"=>$arrProduct,
								"category_name"=>$cat_name, 
								"number_page"=>$numberPage,
								"current_page"=>$page,
								"link_page"=>'product/category/'.$cat.'/']);
	}

	public function tag($tag, $page=1){
		$tag_id = $this->tagModel->getTagIdByLink($tag);
		$arrProduct = json_decode($this->productModel->getProductByTag($tag_id,($page-1)*6,6));
		$tagName = $this->tagModel->getTagNameById($tag_id);
		$category = $this->categoryModel->loadCategory();
		$numberPage = ceil($this->productModel->countProductByTag($tag_id)/6);
		$this->view("master1",["page"=>"tag",
								"listproduct"=>$arrProduct,
								"category"=>$category,
								"tag_name"=>$tagName,
								"number_page"=>$numberPage,
								"current_page"=>$page,
								"link_page"=>'product/tag/'.$tag.'/']);
	} 
}

 ?>