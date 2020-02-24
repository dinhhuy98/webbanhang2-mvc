<?php 
$arrItem = $data['arrItem'];

 ?>

<div class="container mt-3 pt-5">
<div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row mb-3">
          <div class="col-12 text-center">
           
            <h2 class="section-title mb-3">Giỏ hàng</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-12 mb-5">
          	<h5 class="text-black">Giỏ hàng của bạn:</h5>
<table class="table table-striped text-black table-bordered">
  <thead>
    <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col" style="width:40%;">Tên sản phẩm | Màu sắc | Size</th>
      <th scope="col">Ảnh</th>
      <th scope="col">Đơn giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Tổng</th>
      <th scope="col">Tùy chọn</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if(count($_SESSION['cart'])==0){
        echo '<td colspan="7" class="text-center font-weight-bold">Giỏ hàng trống</td>';
      }
      else{
  $stt=1;
    foreach ($arrItem as $item) {
      $sl = $_SESSION['cart'][$item->id];
      $name = $item->name." | ". $item->color." | ".$item->size;
     ?>
    <tr>
      <th scope="row"><?php echo $stt++; ?></th>
      <td><?php echo $name; ?></td>
      <td>
        <img src="public/images/<?php echo $item->image; ?>" alt="Image" class="img-thumbnail img-fluid img-cart" style="height: 60px;">
      </td>
      <td><?php echo number_format($item->price,0," ","."); ?> VND</td>
      <td class="text-center" id="<?php echo $item->id;?>">
        <input type="button" name="d" value="-" class="btn border border-dark rounded-0 bg-white sub-item"style="padding-right: 10px;padding-left: 10px;font-weight: normal;"><!--
        --><input type="text" value="<?php echo $sl; ?>" readonly style="text-align: center;padding-right: 10px;padding-left: 10px;font-weight: normal;" class="btn border-dark rounded-0 border-right-0 border-left-0 text-primary" size="2"><!--
        --><input type="button" name="d" value="+" class="btn border border-dark rounded-0 bg-white add-item"style="padding-right: 10px;padding-left: 10px;font-weight: normal;">
      </td>
      <td><?php echo number_format($item->price*$sl,0," ","."); ?> VND</td>
      <td class="text-center"><button class="delete-cart"><span class="text-danger  font-weight-bold ">&times;</span></button></td>
    </tr>
    <?php 
      }
     ?>
     <tr>
       <td colspan="7" class="text-right font-weight-bold text-primary"><p class="d-inline">Tổng tiền:</p><p class="d-inline" id="total-all"> <?php echo number_format($data['total'],0," ","."); ?> VND</p> <a href="Cart/order" class="btn btn-black mr-1 rounded-0 ">Đặt hàng</a></td>
     </tr>
   <?php } ?>
  </tbody>
</table>
          </div>
        
        </div>
        
      </div>
    </div>
</div>