<?php 
$arrItem = $data['arrItem'];
$arrProvince = $data['arrProvince'];
 if(count($_SESSION['cart'])==0){
      header("location: http://localhost:8080/webbanhang2/");
      }
  $user='';
  $phone='';
  if($data['user']!=null){
    $user = $data['user']->hoten;
    $phone = $data['user']->sdt;
  }


 ?>
<div class="container mt-3 pt-5">
<div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row mb-3">
          <div class="col-12 text-center">
           
            <h3 class="font-weight-bold text-dark mb-2">Đặt hàng</h3>
          </div>
        </div>
        <div class="row justify-content-center text-dark">
       		<div class="col-md-7 border-right border-dark font-weight-bold">
       			Thông tin khách hàng:
            <?php if(!isset($_SESSION['user'])){ ?>
            <div><a href="#" class="nav-link btnLogin1 d-inline" ><span class="icon-user mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black"></span>Đăng nhập</a><p class="d-inline">(Nếu bạn đã có tài khoản)</p></div>
          <?php } ?>
				<form action="./Cart/orderConfirm" method="POST" onsubmit="return checkValidateAddress();"; class="p-2 bg-white">
              
              

              <div class="row form-group mb-1">
                <div class="col-md-7 mb-0 mb-md-0">
                  <label class="text-black mb-0" for="hoten">Họ và tên:</label>
                  <input type="text" id="hoten" class="form-control rounded-0" style="height:30px;" value="<?php echo $user; ?>" name="hoten">
                  <div class="text-danger" id="hoten-error"></div>
                </div>

                <div class="col-md-5 ">
                  <label class="text-black mb-0" for="phone" >Số điện thoại:</label> 
                  <input type="text" id="phone" class="form-control rounded-0" style="height:30px;" value="<?php echo $phone; ?>" name="phone">
                   <div class="text-danger" id="phone-error"></div>
                </div>
             
              </div>

              <div class="row form-group">
                
                <div class="col-md-4">
                  <label class="text-black mb-0" for="province" >Tỉnh/TP:</label> 
                  <select id="province" class="form-control rounded-0" style="height:30px;padding-top: 2px;" name="province">
                    <option value="null" selected>Chọn tỉnh thành</option>
                    <?php foreach ($arrProvince as $province) {
                       echo ' <option value = '.$province->id.'>'.$province->_name.'</option>';
                    } ?>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="text-black mb-0" for="district">Quận/Huyện:</label> 
                  <select id="district" class="form-control rounded-0" style="height:30px;padding-top: 2px;" name="district">
                    <option value="null" selected>Chọn quận/huyện</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="text-black mb-0" for="ward">Phường/Xã:</label> 
                  <select id="ward" class="form-control rounded-0 " style="height:30px;padding-top: 2px;" name="ward">
                    <option value="null" selected>Chọn xã/phường</option>
                  </select>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black mb-0" for="address">Địa chỉ</label> 
                  <textarea name="address" id="address" cols="0" rows="3" class="form-control rounded-0"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" class="btn btn-black rounded-0 py-3 px-4" id="order-confirm" value="Xác nhận" name="submit">
                  <p id="order-error" class="text-danger d-inline"></p>
                </div>
              </div>

  
            </form>


       		</div>
       		<div class="col-md-5">
            Đơn hàng của bạn:
       			<table class="table table-sm bg-white text-black" style="font-size: 12px;">
  <thead>
    <tr>
      <th scope="col" style="width:50%;">Tên sản phẩm</th>
      <th scope="col" style="width:20%">Số lượng</th>
      <th scope="col" style="width:30%">Thành tiền</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
  		    foreach ($arrItem as $item) {
      			$sl = $_SESSION['cart'][$item->id];
      			$name = $item->name." | ". $item->color." | ".$item->size;
  	 ?>
    <tr>
      <th scope="row"><?php echo $name; ?></th>
      <td class="text-center"><?php echo $sl; ?></td>
      <td><?php echo number_format($item->price*$sl,0," ","."); ?> VND</td>
    </tr>
    <?php 
    	}
     ?>
    <tr>
      <th colspan="3" class="text-right">Tổng:  <?php echo number_format($data['total'],0," ","."); ?> VND</th>
    </tr>
  </tbody>
</table>
       		</div>
          </div>
        
        </div>
        
      </div>
    </div>
</div>