<h1>ooooooo</h1>
<?php 
	$user = $data['user'];
	if($user==null)
		echo "Dang nhap that bai";
	else{
		echo "<pre>";
		print_r($user);
		echo "</pre>";
	}

 ?>