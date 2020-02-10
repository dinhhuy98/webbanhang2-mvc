<div class="container mt-5 pt-5">
<div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
           
            <h2 class="section-title mb-3">Đăng kí</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-7 mb-5">

            

            <form action="./Register/register" class="p-5 bg-white" method="POST">
              
              

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="hoten">Họ và tên</label>
                  <input type="text" class="form-control rounded-0" name="hoten" id="hoten" name="hoten">
                  <div class="text-danger" id="hoten-error"></div>
                </div>
             
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" class="form-control rounded-0" name="email">
                  <div class="text-danger" id="email-error"></div>
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="phone">Số điện thoại</label> 
                  <input type="text" id="phone" class="form-control rounded-0" name="phone">
                  <div class="text-danger" id="phone-error"></div>
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="username">Username</label> 
                  <input type="text" id="username" class="form-control rounded-0" name="username">
                  <div class="text-danger" id="username-error"></div>
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="password">Password</label> 
                  <input type="password" id="password" class="form-control rounded-0" name="password">
                  <div class="text-danger" id="password-error"></div>
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12 ">
                  <input type="submit" value="Đăng kí" class="btn btn-black rounded-0 py-3 px-4 w-100" name="btnRegister" >
                </div>
              </div>

  
            </form>
          </div>
        
        </div>
        
      </div>
    </div>
</div>