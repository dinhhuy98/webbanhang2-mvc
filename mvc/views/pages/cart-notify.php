<?php 
  $item = $data['item'];
  $arrColor = $data['arrColor'];
  $arrSize = $data['arrSize'];
  ?>
<div class="container mt-3 pt-2 justify-content-center">

        <div class="bg-light py-2 mb-4 w-75 ml-auto mr-auto">
          <span class="close pr-4">&times;</span>  
          <div class="row mx-4 my-4 product-item-2 align-items-center  justify-content-center">
            <div class="col-md-6 mb-5 mb-md-0">
              <img src="./public/images/<?php echo $item->image; ?>" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 ml-auto product-title-wrap">
              <h3 class="text-black mb-4 font-weight-bold"><?php echo $item->name; ?></h3>
              
              <div class="mb-4"> 
                <h3 class="text-black font-weight-bold h5">Giá:</h3>
                <div class="price text-warning h5 font-weight-bold"><?php echo number_format($item->price,0," ","."); ?>VND</div>
                <div class="custom-radios text-black mt-3 font-weight-bold">Màu sắc:
                  <?php foreach ($arrColor as $color) {
                    $id = 'color-'.$color->name;
                   ?>
                  <div class="d-inline">
                     <input type="radio" id="<?php echo $id; ?>" name="color" value="<?php echo $color->id; ?>">
                      <label for="<?php echo $id; ?>">
                        <span>
                         <i class="icon-check"></i>
                        </span>
                      </label>
                  </div>
                <?php 
                  }
                ?>
                </div>
                <div class="custom-radios text-black mt-3 font-weight-bold">Size:
                  <?php foreach ($arrSize as $size) {
                    $id = 'size-'.$size->name;
                   ?>
                  <div class="d-inline mr-2">
                     <input type="radio" id = "<?php echo $id; ?>" name="size" value="<?php echo $size->id; ?>">
                      <label for="<?php echo $id; ?>"><?php echo $size->name ?>
                        <span>
                         <i class="icon-check"></i>
                        </span>
                      </label>
                  </div>
                <?php 
                  }
                ?>
                </div>

              
              </div>
              <p>
                <button class="btn btn-black btn-outline-black rounded-0 d-block mb-2 mb-lg-0 d-lg-inline-block add-cart" id="<?php echo $item->id; ?>">Thêm giỏ hàng</button>
                <a href="Cart" class="btn btn-black rounded-0 d-block mb-2 mb-lg-0 d-lg-inline-block">Truy cập giỏ hàng</a>
              </p>
              <p class="text-primary font-weight-bold" id="cart-alert"></p>
            </div>
          </div>
        </div>
      </div>

