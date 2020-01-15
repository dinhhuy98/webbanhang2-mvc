<?php 
  $item = $data['item'];
  ?>
      <div class="container mt-5 pt-5">  
        <div class="bg-light py-4 mb-4">
          <div class="row mx-4 my-4 product-item-2 align-items-start">
            <div class="col-md-6 mb-5 mb-md-0">
              <img src="./public/images/<?php echo $item->image; ?>" alt="Image" class="img-fluid">
            </div>
           
            <div class="col-md-5 ml-auto product-title-wrap">
              <span class="number">STYLE</span>
              <h3 class="text-black mb-4 font-weight-bold"><?php echo $item->name; ?></h3>
              <p class="mb-4">Et tempora id nostrum saepe amet doloribus deserunt totam officiis cupiditate asperiores quasi accusantium voluptatum dolorem quae sapiente voluptatem ratione odio iure blanditiis earum fuga molestiae alias dicta perferendis inventore!</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus soluta assumenda sed optio, error at?</p>
              
              <div class="mb-4"> 
                <h3 class="text-black font-weight-bold h5">Giá:</h3>
                <div class="price text-warning"><?php echo number_format($item->price,0," ","."); ?>VND</div>
              </div>
              <p>
                <a href="#" class="btn btn-black btn-outline-black rounded-0 d-block mb-2 mb-lg-0 d-lg-inline-block">Thêm giỏ hàng</a>
              </p>
            </div>
          </div>
        </div>
      </div>
