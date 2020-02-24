<?php
$mess=''; 
if($data['check']==1)
  $mess = "Đơn hàng của quý khách đã được đặt THÀNH CÔNG!<br/>
Quý khách sẽ sớm nhậm được cuộc gọi xác nhận của chúng tôi, cảm ơn quý khách!";
else
  $mess="Có lỗi xảy ra, vui lòng thử lại!";

 ?>
<div class="container mt-3 pt-5">
<div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row mb-3">
          <div class="col-12 text-center text-success font-weight-bold">
           <?php echo $mess; ?>
          </div>
        
        </div>
        
      </div>
    </div>
</div>