<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>Document</title>
</head>
<style type="text/css">
	#header,#footer{
		background-color:yellow;
	}
	div{
		padding:20px;
	}
</style>
<body>
	<h1>HHHHH</h1>
	<h2 style="color:<?php echo $data['color']; ?>"><?php echo $data['tong']; ?></h2>
	<div id="header"></div>
	<div id="content">
		<?php require_once("./mvc/views/pages/".$data['page'].".php") ?>
	</div>
	<div id="footer"></div>
</body>
</html>