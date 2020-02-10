   <?php $arrCat = $data['category'];
      
      function showCategory($arr,$k){
        foreach($arr as $key=>$item){
         if($item['parent_id']==$k){
          if($k==0){
            echo '<div class="col-sm text-uppercase">
   <a class="dropdown-item nav-link" href="product/category/'.$item['link'].'"><b>'.$item['name'].'</b></a>
   <div class="dropdown-divider"></div>';
          }
          else
            echo '<a class="dropdown-item text-uppercase nav-link" href="product/category/'.$item['link'].'">'.$item['name'].'</a>';
            unset($arr[$key]);
            showCategory($arr,$item['id']);
            if($k==0)
              echo '</div>';
      }
    }
    
     
  }
  
    ?>
   <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    <div class="top-bar py-3 bg-light" id="home-section">
      <div class="container">
        <div class="row align-items-center">
         
          <div class="col-6 text-left">
            <ul class="social-media">
              <li><a href="#" class=""><span class="icon-facebook"></span></a></li>
              <li><a href="#" class=""><span class="icon-twitter"></span></a></li>
              <li><a href="#" class=""><span class="icon-instagram"></span></a></li>
              <li><a href="#" class=""><span class="icon-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-6">
            <p class="mb-0 float-right">
              <span class="mr-3"><a href="tel://#"> <span class="icon-phone mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black">0327842777</span></a></span>
              <span><a href="#"><span class="icon-envelope mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black">dinhhuy1798@gmail.com</span></a></span>
            </p>
            
          </div>
        </div>
      </div> 
    </div>

      <header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">

      <div class="container-fluid" >
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2 text-center ">
            <h1 class="mb-0 site-logo"><a href="index.html" class="text-black mb-0">Selling<span class="text-primary">.</span> </a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block" >
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="home" class="nav-link">Trang Chủ</a></li>
                <li  class="nav-item dropdown">
                  
    <a  class="  nav-link dropdown-toggle" data-toggle="dropdown" href="#">
      Sản Phẩm
    </a>
    <div class="dropdown-menu" style="width:800px;" aria-labelledby="navbarDropdown">
    <div class="row">
      <?php showCategory($arrCat,0); ?>
  </div>
</div>



                </li>
                <li><a href="#about-section" class="nav-link">Giới Thiệu</a></li>
                <li><a href="#special-section" class="nav-link">Khuyến Mãi</a></li>
                <li><a href="news" class="nav-link">Tin tức</a></li>
                <li><a href="contract" class="nav-link">Liên Hệ</a></li>
                <li style="height:40px"><form class="d-flex mb-4" method="GET" action="product/search">
              <input type="text" class="form-control rounded-0" placeholder="Tên sản phẩm" name="key">
              <button type="submit" class="btn btn-black btn-outline-black rounded-0" value=1>Tìm kiếm</button>
            </form></li>
            <!-- Login and cart -->
            <?php 
              if(isset($_SESSION['user'])){
             ?>
             <li><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><span class="icon-user mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black"></span><?php echo $_SESSION['hoten'];?></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="width:200px;">
                <a class="dropdown-item" href="#">Chỉnh sửa thông tin</a>
                <a class="dropdown-item" href="logout">Đăng xuất</a>
              </div>
             </li>
              <?php 
                }
                else{
               ?>
               <li><a href="#" class="nav-link btnLogin1"><span class="icon-user mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black"></span>Đăng nhập</a></li>
               <?php 
                }
                ?>
             <li><a href="#" class="nav-link"><span class="icon-shopping-cart mr-2 cart" style="position: relative; top: 2px;font-size:20px;" data-count="0"></span><span class="d-none d-lg-inline-block text-black"></span></a></li>
              </ul>

            </nav>
          </div>
<!-- 	<a href="#" class="btn btn-black btn-outline-black ml-1 rounded-0">View</a> -->
    
        </div>
      </div>
    </header>
    <div id="loginform">
  </div>
    </div>
 
