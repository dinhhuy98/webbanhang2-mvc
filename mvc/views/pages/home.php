 <!-- Slider -->
<?php require_once("./mvc/views/blocks/slider.php"); ?>
<!-- End Slider -->
    <div class="site-section" id="products-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            
            <h2 class="section-title mb-3">Sản phẩm bán chạy</h2>
            <h3 class="section-sub-title">Những sản phẩm thời trang hot nhất</h3>
          </div>
        </div>
        <div class="row">

          <?php
            foreach($data['hotProduct'] as $item){

            ?>
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="product-item">
              <figure>
                <img src="./public/images/<?php echo $item->image; ?>" alt="Image" class="img-fluid" style="height:400px; width:300px;">
              </figure>
              <div class="px-4">
               <h3 style="width:300px;height:40px;"><a href="product/productDetail/<?php echo $item->id; ?>" style="-webkit-line-clamp: 2;-webkit-box-orient: vertical; overflow: hidden; display: -webkit-box;"><?php echo $item->name;  ?></a></h3>
                <div class="mb-3">
                  <span class="meta-icons mr-3 text-warning font-weight-bold"><?php echo number_format($item->price,0," ","."); ?> VND</span>
                  
                </div>
                <div>
                  <button class="btn btn-black mr-1 rounded-0 quick-view" id="<?php echo $item->id; ?>">Thêm giỏ hàng</button>
                  <a href="product/productDetail/<?php echo $item->id; ?>" class="btn btn-black btn-outline-black ml-1 rounded-0">Xem chi tiết</a>
                </div>
              </div>
            </div>
          </div>

         
         
      <?php } ?>
                
              <div class="col-lg-12 col-md-12 mb-5 text-center">
      <a href="product/tag/hang-ban-chay" class="btn btn-black btn-outline-black ml-1 rounded-0">Xem thêm</a> 
    </div>

        
          
        </div>
      </div>
    </div>
    
    <div class="site-blocks-cover inner-page-cover overlay get-notification"  style="background-image: url(./public/images/hero_2.jpg); background-attachment: fixed;" data-aos="fade">
      <div class="container">

        <div class="row align-items-center justify-content-center">
          <form class="col-md-7" method="post">
            <h2>Nhận thông tin về các khuyến mãi, sự kiện độc đáo</h2>
            <div class="d-flex mb-4">
              <input type="text" class="form-control rounded-0" placeholder="Enter your email address">
              <input type="submit" class="btn btn-white btn-outline-white rounded-0" value="Đăng kí">
            </div>
          </form>
        </div>

      </div>
    </div>

    <div class="site-section bg-light">
            <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            
            <h2 class="section-title mb-3">Sản phẩm mới về</h2>
            <h3 class="section-sub-title">Những sản phẩm thời trang mới nhất</h3>
          </div>
        </div>
        <div class="row">

          <?php
            foreach($data['newProduct'] as $item){

            ?>
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="product-item">
              <figure>
                <img src="./public/images/<?php echo $item->image; ?>" alt="Image" class="img-fluid" style="height:400px; width:300px;">
              </figure>
              <div class="px-4">
                <h3 style="width:300px;height:40px;"><a href="product/productDetail/<?php echo $item->id; ?>" style="-webkit-line-clamp: 2;-webkit-box-orient: vertical; overflow: hidden; display: -webkit-box;"><?php echo $item->name;  ?></a></h3>
                <div class="mb-3">
                  <span class="meta-icons mr-3 text-warning font-weight-bold "><?php echo number_format($item->price,0," ","."); ?> VND</span>
                  
                </div>
                <div>
                  <button class="btn btn-black mr-1 rounded-0 quick-view" id="<?php echo $item->id; ?>">Thêm giỏ hàng</button>
                  <a href="product/productDetail/<?php echo $item->id; ?>" class="btn btn-black btn-outline-black ml-1 rounded-0">Xem chi tiết</a>
                </div>
              </div>
            </div>
          </div>

         
         
      <?php } ?>
                
              <div class="col-lg-12 col-md-12 mb-5 text-center">
      <a href="product/tag/hang-moi-ve" class="btn btn-black btn-outline-black ml-1 rounded-0">Xem thêm</a> 
    </div>

        
          
        </div>
      </div>
    </div>


    <div class="site-section bg-light">
            <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            
            <h2 class="section-title mb-3">Sản phẩm đang sale</h2>
            <h3 class="section-sub-title">Những sản phẩm thời trang đang giảm giá</h3>
          </div>
        </div>
        <div class="row">

          <?php
            foreach($data['saleProduct'] as $item){

            ?>
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="product-item">
              <figure>
                <img src="./public/images/<?php echo $item->image; ?>" alt="Image" class="img-fluid" style="height:400px; width:300px;">
              </figure>
              <div class="px-4">
               <h3 style="width:300px;height:40px;"><a href="product/productDetail/<?php echo $item->id; ?>" style="-webkit-line-clamp: 2;-webkit-box-orient: vertical; overflow: hidden; display: -webkit-box;"><?php echo $item->name;  ?></a></h3>
                <div class="mb-3">
                  <span class="meta-icons mr-3 text-warning font-weight-bold "><?php echo number_format($item->price,0," ","."); ?> VND</span>
                  
                </div>
                <div>
                  <button href="#" class="btn btn-black mr-1 rounded-0 quick-view" id="<?php echo $item->id; ?>">Thêm giỏ hàng</button>
                  <a href="product/productDetail/<?php echo $item->id; ?>" class="btn btn-black btn-outline-black ml-1 rounded-0">Xem chi tiết</a>
                </div>
              </div>
            </div>
          </div>

         
         
      <?php } ?>
                
          
    <div class="col-lg-12 col-md-12 mb-5 text-center">
      <a href="product/tag/hang-dang-sale" class="btn btn-black btn-outline-black ml-1 rounded-0">Xem thêm</a> 
    </div>
                 
        </div>
      </div>
    </div>

    
    <div class="site-blocks-cover overlay get-notification" id="special-section" style="background-image: url(./public/images/hero_2.jpg); background-attachment: fixed; background-position: top;" data-aos="fade">
      <div class="container">

        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center">
            <h3 class="section-sub-title">Special Promo</h3>
            <h3 class="section-title text-white mb-4">Summer Sale</h3>
            <p class="mb-5 lead">Repudiandae nostrum natus excepturi fuga ullam accusantium vel ut eveniet aut consequatur laboriosam ipsam.</p>
            
            <div id="date-countdown" class="mb-5"></div>

            <p><a href="#" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 mb-lg-0 mb-2 d-block d-sm-inline-block">Shop Now</a></p>
          </div>
        </div>

      </div>
    </div>

   