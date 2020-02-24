    <div class="site-section" id="products-section">
      <div class="container  mt-5 pt-5">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            
            <h2 class="section-title mb-3 text-uppercase"><?php echo $data['tag_name']; ?></h2>
          </div>
        </div>
        <div class="row">

          <?php
            foreach($data['listproduct'] as $item){

            ?>
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="product-item">
              <figure>
                <img src="./public/images/<?php echo $item->image; ?>" alt="Image" class="img-fluid" style="height:400px; width:300px;">
              </figure>
              <div class="px-4">
                <h3 style="width:300px;height:40px;"><a href="product/productDetail/<?php echo $item->id; ?>" style="-webkit-line-clamp: 2;-webkit-box-orient: vertical; overflow: hidden; display: -webkit-box;"><?php echo $item->name;  ?></a></h3>
                <div class="mb-3">
                  <span class="meta-icons mr-3 text-warning "><?php echo number_format($item->price,0," ","."); ?> VND</span>
                  
                </div>
                <div>
                  <button class="btn btn-black mr-1 rounded-0 quick-view" id="<?php echo $item->id; ?>">Thêm giỏ hàng</button>
                  <a href="product/productDetail/<?php echo $item->id; ?>" class="btn btn-black btn-outline-black ml-1 rounded-0">Xem chi tiết</a>
                </div>
              </div>
            </div>
          </div>

         
         
      <?php }?>
    </div>
  </div>
</div>
<?php  require_once("./mvc/views/blocks/pagination.php");?>


