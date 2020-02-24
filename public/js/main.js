 AOS.init({
 	duration: 800,
 	easing: 'slide',
 	once: true
 });

jQuery(document).ready(function($) {

	"use strict";

	

	var siteMenuClone = function() {

		$('.js-clone-nav').each(function() {
			var $this = $(this);
			$this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-menu-body');
		});


		setTimeout(function() {
			
			var counter = 0;
      $('.site-mobile-menu .has-children').each(function(){
        var $this = $(this);
        
        $this.prepend('<span class="arrow-collapse collapsed">');

        $this.find('.arrow-collapse').attr({
          'data-toggle' : 'collapse',
          'data-target' : '#collapseItem' + counter,
        });

        $this.find('> ul').attr({
          'class' : 'collapse',
          'id' : 'collapseItem' + counter,
        });

        counter++;

      });

    }, 1000);

		$('body').on('click', '.arrow-collapse', function(e) {
      var $this = $(this);
      if ( $this.closest('li').find('.collapse').hasClass('show') ) {
        $this.removeClass('active');
      } else {
        $this.addClass('active');
      }
      e.preventDefault();  
      
    });

		$(window).resize(function() {
			var $this = $(this),
				w = $this.width();

			if ( w > 768 ) {
				if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
			}
		})

		$('body').on('click', '.js-menu-toggle', function(e) {
			var $this = $(this);
			e.preventDefault();

			if ( $('body').hasClass('offcanvas-menu') ) {
				$('body').removeClass('offcanvas-menu');
				$this.removeClass('active');
			} else {
				$('body').addClass('offcanvas-menu');
				$this.addClass('active');
			}
		}) 

		// click outisde offcanvas
		$(document).mouseup(function(e) {
	    var container = $(".site-mobile-menu");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	      if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
	    }
		});
	}; 
	siteMenuClone();


	var sitePlusMinus = function() {
		$('.js-btn-minus').on('click', function(e){
			e.preventDefault();
			if ( $(this).closest('.input-group').find('.form-control').val() != 0  ) {
				$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) - 1);
			} else {
				$(this).closest('.input-group').find('.form-control').val(parseInt(0));
			}
		});
		$('.js-btn-plus').on('click', function(e){
			e.preventDefault();
			$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) + 1);
		});
	};
	// sitePlusMinus();


	var siteSliderRange = function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
	};
	// siteSliderRange();


	
	var siteCarousel = function () {
		if ( $('.nonloop-block-13').length > 0 ) {
			$('.nonloop-block-13').owlCarousel({
		    center: false,
		    items: 1,
		    loop: true,
				stagePadding: 0,
		    margin: 0,
		    autoplay: true,
		    nav: true,
				navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
		    responsive:{
	        600:{
	        	margin: 0,
	        	nav: true,
	          items: 2
	        },
	        1000:{
	        	margin: 0,
	        	stagePadding: 0,
	        	nav: true,
	          items: 3
	        },
	        1200:{
	        	margin: 0,
	        	stagePadding: 0,
	        	nav: true,
	          items: 4
	        }
		    }
			});
		}

		$('.slide-one-item').owlCarousel({
	    center: false,
	    items: 1,
	    loop: true,
			stagePadding: 0,
	    margin: 0,
	    autoplay: true,
	    pauseOnHover: false,
	    nav: true,
	    navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">']
	  });
	};
	siteCarousel();

	var siteStellar = function() {
		$(window).stellar({
	    responsive: false,
	    parallaxBackgrounds: true,
	    parallaxElements: true,
	    horizontalScrolling: false,
	    hideDistantElements: false,
	    scrollProperty: 'scroll'
	  });
	};
	siteStellar();

	var siteCountDown = function() {

		$('#date-countdown').countdown('2020/10/10', function(event) {
		  var $this = $(this).html(event.strftime(''
		    + '<span class="countdown-block"><span class="label">%w</span> weeks </span>'
		    + '<span class="countdown-block"><span class="label">%d</span> days </span>'
		    + '<span class="countdown-block"><span class="label">%H</span> hr </span>'
		    + '<span class="countdown-block"><span class="label">%M</span> min </span>'
		    + '<span class="countdown-block"><span class="label">%S</span> sec</span>'));
		});
				
	};
	siteCountDown();

	var siteDatePicker = function() {

		if ( $('.datepicker').length > 0 ) {
			$('.datepicker').datepicker();
		}

	};
	siteDatePicker();

	var siteSticky = function() {
		$(".js-sticky-header").sticky({topSpacing:0});
	};
	siteSticky();

	// navigation
  var OnePageNavigation = function() {
    var navToggler = $('.site-menu-toggle');
   	$("body").on("click", ".main-menu li a[href^='#'], .smoothscroll[href^='#'], .site-mobile-menu .site-nav-wrap li a", function(e) {
      e.preventDefault();

      var hash = this.hash;

      $('html, body').animate({
        'scrollTop': $(hash).offset().top
      }, 600, 'easeInOutCirc', function(){
        window.location.hash = hash;
      });

    });
  };
  OnePageNavigation();
  
  var siteScroll = function() {

  	

  	$(window).scroll(function() {

  		var st = $(this).scrollTop();

  		if (st > 100) {
  			$('.js-sticky-header').addClass('shrink');
  		} else {
  			$('.js-sticky-header').removeClass('shrink');
  		}

  	}) 

  };
  siteScroll();
 
  $(document).on('click','.page-item-ajax',function(){
  	var page_ = $(this).attr("page");
  	var key_ = $("#key").text();
  	$.get("./Product/searchAjax", {key:key_,page:page_},function(data){
  		$("#content").html(data);
  		$(window).scrollTop(0);
  	});
  });

  $('.btnLogin1').click(function() {
   		$.get("./Login",{},function(data){
   			$('#modal').html(data);
   		});
  		$('#modal').css({
  			display: 'block'
  		});
  });
$('.img-cart').click(function() {
		var _src = $(this).attr('src');
   		$.post("./Ajax/showImage",{src:_src},function(data){
   			$('#modal').html(data);
   		});
  		$('#modal').css({
  			display: 'block'
  		});
  });

  $(document).on('click','.close',function(){
  	$('#modal').css({
  		display: 'none'
  	});
  });

  $(document).on('click','.close-notify',function(){
  	$('#modal').css({
  		display: 'none'
  	});
  });
  $("#hoten").blur(function checkHoten() {
 		var _hoten = $(this).val();
 		$.post('Ajax/checkFullName', {hoten: _hoten}, function(data) {
 			if(data=='1')
 				$('#hoten-error').html('Vui lòng nhập họ tên');
 			else
 				$('#hoten-error').html('');
 		});
  });
  $("#email").blur(function() {
 		var _email = $(this).val();
 		$.post('Ajax/checkEmail', {email: _email}, function(data) {
 			if(data=='1')
 				$('#email-error').html('Vui lòng nhập email');
 			else if(data=='2')
 				$('#email-error').html('Email không hợp lệ');
 			else
 				$('#email-error').html('');

 		});
  });

 

  $("#phone").blur(function(){
    var _phone = $(this).val();
    $.post('Ajax/checkPhoneNumber', {phone: _phone}, function(data) {
      if(data=='1')
        $('#phone-error').html('Vui lòng nhập số điện thoại');
      else if(data=='2')
        $('#phone-error').html('Số điện thoại không hợp lệ');
      else{
        $('#phone-error').html('');
        result=true;
      }

    });
  });

  $("#username").blur(function() {
 		var _username = $(this).val();
 		$.post('Ajax/checkUsername', {username: _username}, function(data) {
 			if(data=='1')
 				$('#username-error').html('Vui lòng nhập username');
 			else if(data=='2')
 				$('#username-error').html('Username đã tồn tại');
 			else
 				$('#username-error').html('');

 		});
  });

  $("#password").blur(function() {
 		var _password = $(this).val();
 		$.post('Ajax/checkPassword', {password: _password}, function(data) {
 			if(data=='1')
 				$('#password-error').html('Vui lòng nhập password');
 			else
 				$('#password-error').html('');

 		});
  });

  $(document).on('click','.add-item',function(){
      var s = $(this).parent().find("input[type='text']");
      var k = parseInt($(s).attr('value'))+1;
      var _id = $(this).parent().attr('id');
      $.post('Ajax/changeItemQuantity',{id:_id,number:k},function(data){
        if(data!='0'){
          $(s).attr({
            'value':k
          });
          $.post('Ajax/total',{id:_id},function(data){
             $(s).parent().next().html(data);
          });

          $.post('Ajax/totalAll',{},function(data){
             $('#total-all').html(data);
          });

        }
      });

  });

  $(document).on('click','.sub-item',function(){
      var s = $(this).parent().find("input[type='text']");
      var k = parseInt($(s).attr('value'))-1;
      var _id = $(this).parent().attr('id');
      $.post('Ajax/changeItemQuantity',{id:_id,number:k},function(data){
        if(data!='0'){
          $(s).attr({
            'value':k
          });
          $.post('Ajax/total',{id:_id},function(data){
             $(s).parent().next().html(data);
          });

          $.post('Ajax/totalAll',{},function(data){
             $('#total-all').html(data);
          });

        }
      });

  });

  $('.delete-cart').click(function(){
    var _id = $(this).parent().prev().prev().attr('id');
    var $this = $(this);
    $.post('Ajax/deleteItem', {id: _id}, function(data) {
      if(data=='1'){
        $($this).parent().parent().remove();
        $.post('Ajax/totalAll',{},function(data){
             $('#total-all').html(data);
          });

        $.post('Ajax/countItem', {}, function(data) {
      $('.icon-shopping-cart').attr({
        'data-count': data
      });
    });
      }
    });
  })



  $(document).on('click','input[name="btnLogin"]',function(){
  		var _username = $("input[name='username']").val();
  		var _password = $("input[name='password']").val();
      //alert(_username+_password);
  		$.post("./Login/login",{username:_username,password:_password,btnLogin:1},function(data){
        if(data=='1'){
  				window.location.href="http://localhost:8080/webbanhang2";
  			}
  			else{
  				$('#error').css({
  					display: 'inline'
  				});
        }
  		});
  });

  $(document).on('click','.add-cart',function(){
  	var _id = $(this).attr("id");
    var color = $('input[type="radio"][name="color"]:checked').attr('value');
    var size = $('input[type="radio"][name="size"]:checked').attr('value');
    if(size==undefined || color==undefined)
      $('#cart-alert').html("Vui lòng chọn màu và size!");
    else{
  	  $.post('Ajax/addCart', {id_item: _id, id_color:color, id_size:size}, function(data) {
        if(data=='1' || data=='2'){
          $('#cart-alert').html("Sản phẩm đã được thêm vào giỏ hàng!");
  		  }
  	  });
  	  $.post('Ajax/countItem', {}, function(data) {
  		  $('.icon-shopping-cart').attr({
  			 'data-count': data
  		  });
  	   });
    }
  });

  $('#province').change(function() {
    var _id = $('#province option:selected').attr('value');
    $.post('Ajax/loadDistrictByProvinceId',{id:_id},function(data){
        $('#district').html(data);
    });
  });

    $('#district').change(function() {
    var _id = $('#district option:selected').attr('value');
    $.post('Ajax/loadWardByDistrictId',{id:_id},function(data){
        $('#ward').html(data);
    });
  });

    $("#order-confirm").click(function checkValidateAddress(){
      var _id_province = $('#province option:selected').attr('value');
      var _id_district = $('#district option:selected').attr('value');
      var _id_ward = $('#ward option:selected').attr('value');
      var _address=$.trim($('#address').val());
      var _hoten = $.trim($('#hoten').val());
      var _phone = $.trim($('#phone').val());
      var check=0;
      $.ajax({
        url: 'Ajax/checkPhoneNumber',
        type: 'POST',
        async:false,
        data: {phone:_phone},
      })
      .done(function(data) {
          if(data=='2'||data=='1'){
            check=1;
            $('#phone').addClass('border-danger');
          }
          else
              $('#phone').removeClass('border-danger');
      });

       $.ajax({
        url: 'Ajax/checkFullName',
        type: 'POST',
        async:false,
        data: {hoten:_hoten},
      })
      .done(function(data) {
          if(data=='1'){
            check=1;
            $('#hoten').addClass('border-danger');
          }
          else
              $('#hoten').removeClass('border-danger');
      });


      if(_id_province=='null'){
        $('#province').addClass('border-danger');
        check=1;
      }
      else
        $('#province').removeClass('border-danger');
      if(_id_district=='null'){
        $('#district').addClass('border-danger');
        check=1;
      }
      else
        $('#district').removeClass('border-danger');
      if(_id_ward=='null'){
        $('#ward').addClass('border-danger');
        check=1;
      }
      else
        $('#ward').removeClass('border-danger');
      if(_address==''){
        $('#address').addClass('border-danger');
        check=1;
      }
      else
        $('#address').removeClass('border-danger');
      
      if(check==1){
        $('#order-error').html("Vui lòng điền đầy đủ thông tin!");
        return false;
      }
      else{
        $('#order-error').html(" ");
        return true;
      }
    });

    $(".quick-view").click(function(){
    var _id = $(this).attr("id");
        $.post("./Ajax/quickViewProduct",{id:_id},function(data){
          $('#modal').html(data);
          $('#modal').css({
            display: 'block'
          });
        });
        
    });

});

