<?php 
class Home extends Controller{
	function SayHi($a, $b){
		echo "Home-sayhi";
		echo $a ." ".$b;
		$huy = $this->model("SinhVienModel");
		echo $huy->tong($a,$b);
	}
	function Show(){
		echo "Home-show";
	}
}

 ?>