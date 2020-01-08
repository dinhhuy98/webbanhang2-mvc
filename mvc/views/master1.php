<?php  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="http://localhost:8080/webbanhang2/" />
    <title>Selling &mdash; Website by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="public/fonts/icomoon/style.css">

    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/jquery-ui.css">
    <link rel="stylesheet" href="./public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./public/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="./public/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="./public/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="./public/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="./public/css/aos.css">

    <link rel="stylesheet" href="./public/css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

<!-- Header -->
<?php require_once("./mvc/views/blocks/header.php"); ?>
<!-- End Header -->
  
<!--Content-->
<?php require_once("./mvc/views/pages/".$data['page'].".php"); ?>   
<!--End Content-->
  <!-- Footer -->
<?php require_once("./mvc/views/blocks/footer.php"); ?>
<!-- End Footer -->


  </div> <!-- .site-wrap -->

  <script src="./public/js/jquery-3.3.1.min.js"></script>
  <script src="./public/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="./public/js/jquery-ui.js"></script>
  <script src="./public/js/popper.min.js"></script>
  <script src="./public/js/bootstrap.min.js"></script>
  <script src="./public/js/owl.carousel.min.js"></script>
  <script src="./public/js/jquery.stellar.min.js"></script>
  <script src="./public/js/jquery.countdown.min.js"></script>
  <script src="./public/js/bootstrap-datepicker.min.js"></script>
  <script src="./public/js/jquery.easing.1.3.js"></script>
  <script src="./public/js/aos.js"></script>
  <script src="./public/js/jquery.fancybox.min.js"></script>
  <script src="./public/js/jquery.sticky.js"></script>

  
  <script src="./public/js/main.js"></script>
    
  </body>
</html>