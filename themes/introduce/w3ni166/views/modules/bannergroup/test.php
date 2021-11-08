<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">
	<head>
	<meta charset="UTF-8" />
	<title>Nội thất</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab&subset=latin,vietnamese,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../../main.css" />
	<link rel="stylesheet" href="css/everslider.css">
	<link rel="stylesheet" href="css/everslider-custom.css">
	<link rel="stylesheet" href="css/style.css" />
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script1.js"></script>
	<script type="text/javascript" src="js/jquery.everslider.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			
			/* Image slider */
			$('#image_slider').everslider({
				mode: 'normal',
				maxVisible: 1,
				slideEasing: 'easeInOutQuart',
				slideDuration: 500
			});
			
			/* Featured slider	*/		
			$('#featured_slider').everslider({
				mode: 'circular',
				itemKeepRatio: false,
				navigation: false,
				mouseWheel: true
			});
			
			/* Fullwidth slider */
			$('#fullwidth_slider').everslider({
				mode: 'carousel',
				moveSlides: 1,
				slideEasing: 'easeInOutCubic',
				slideDuration: 700,
				navigation: true,
				keyboard: true,
				nextNav: '<span class="alt-arrow">Next</span>',
				prevNav: '<span class="alt-arrow">Next</span>',
				ticker: true,
				tickerAutoStart: true,
				tickerHover: true,
				tickerTimeout: 2000
			});
			
			/* Fullwidth slider with "fade" effect */
			$('#fullwidth_slider_fade').everslider({
				mode: 'carousel',
				effect: 'fade',
				moveSlides: 1,
				fadeEasing: 'linear',
				fadeDuration: 500,
				fadeDelay: 200,
				fadeDirection: 1,
				navigation: true,
				keyboard: true,
				swipeThreshold: 10,
				nextNav: '<span class="alt-arrow">Next</span>',
				prevNav: '<span class="alt-arrow">Next</span>',
				ticker: true,
				tickerAutoStart: false,
				tickerTimeout: 2000
			});
		});
	</script>
	</head>

	<body>
<div class="page-all">
<!--header-->
<div class="header">
      <div class="bg-top clearfix ">
    <div class="container">
          <div class="left-bg-top">
        <p>Nội Thất Đồ Gỗ Holdelux - Sản Xuất &amp; Cung Cấp Giường Ngủ, Tủ Áo, Đồ Gỗ - GIÁ TỐT NHẤT CHO KHÁCH SẠN</p>
      </div>
          <div class="right-bg-top">
        <div class="login">
              <ul class="menu">
            <li> <a href="/dang-nhap" id="w3nlogin"> Đăng nhập </a> </li>
            <li> <a href="/dang-ky"> Đăng ký </a> </li>
            <li ><a href="/gio-hang" class="cart-link" title="Giỏ hàng"> Giỏ hàng <span class="cart-quantity"> (0) </span> </a></li>
          </ul>
            </div>
        <!--end-login--> 
      </div>
          <!--end-right-bg-top--> 
        </div>
    <!--end-container--> 
  </div>
      <!--end-bg-top-->
      <div class="bg-box-top">
    <div class="box-top ">
          <div class="container clearfix">
        <div class="logo">
              <h1> <a href="/" title="Web bán nội thất"> <img alt="Về trang chủ" src="css/img/logo.png" /> <span class="hide-text">Web bán nội thất</span> </a> </h1>
            </div>
        <div class="box-right clearfix">
              <div class="box-phone">
            <div class="phone">
                  <div class="icon"><i class="icon-help"></i></div>
                  <div class="text-phone"><span>Hotline : </span><span>0948 854 888</span></div>
                </div>
          </div>
              <div class="timkiem">
            <div class="search-form">
                  <form method="get" action="/tim-kiem" class="searchform">
                <div class="clearfix">
                      <input type="text" class="svalue box-search" placeholder="Tìm kiếm..." name="q" autocomplete="off" value="">
                      <input type="submit" value="Tìm kiếm" class="btnsearch">
                    </div>
              </form>
                </div>
          </div>
              <!--end-timkiem--> 
            </div>
        <!--end-box-right--> 
      </div>
          <!--end-container-->
          <div class="box-menu">
        <div class="container">
              <div id='cssmenu'>
            <ul>
                  <li class=" active" > <a href=""  title=""> Trang chủ </a> </li>
                  <li class=" " > <a href="/gioi-thieu"  title=""> Giới thiệu </a> </li>
                  <li class=" " > <a href="/tin-tuc"  title=""> Tin tức </a> </li>
                  <li class="has-sub " > <a href="/san-pham"  title=""> Sản phẩm </a>
                <ul>
                      <li class=" " > <a href="/noi-that-phong-khach-pc,402"  title=""> Nội thất phòng khách </a> </li>
                      <li class=" " > <a href="/noi-that-phong-ngu-pc,403"  title=""> Nội thất phòng ngủ </a> </li>
                      <li class=" " > <a href="/noi-that-phong-ngu-tre-em-pc,404"  title=""> Nội thất phòng ngủ trẻ em </a> </li>
                      <li class=" " > <a href="/noi-that-phong-an-pc,405"  title=""> Nội thất phòng ăn </a> </li>
                      <li class=" " > <a href="/no-that-phong-tam-pc,413"  title=""> Nội thất phòng tắm </a> </li>
                    </ul>
              </li>
                  <li class=" " > <a href="/video"  title=""> Video </a> </li>
                  <li class=" " > <a href="/album"  title=""> Album ảnh </a> </li>
                  <li class=" " > <a href="/tuyen-dung"  title=""> Tuyển dụng </a> </li>
                  <li class=" " > <a href="/lien-he"  title=""> Liên hệ </a> </li>
                </ul>
          </div>
              <script type="text/javascript">
                    (function($) {

                        $.fn.menumaker = function(options) {

                            var cssmenu = $(this), settings = $.extend({
                                title: "Menu",
                                format: "dropdown",
                                sticky: false
                            }, options);

                            return this.each(function() {
                                cssmenu.prepend('<div id="menu-button">' + settings.title + '</div>');
                                $(this).find("#menu-button").on('click', function() {
                                    $(this).toggleClass('menu-opened');
                                    var mainmenu = $(this).next('ul');
                                    if (mainmenu.hasClass('open')) {
                                        mainmenu.hide().removeClass('open');
                                    }
                                    else {
                                        mainmenu.show().addClass('open');
                                        if (settings.format === "dropdown") {
                                            mainmenu.find('ul').show();
                                        }
                                    }
                                });

                                cssmenu.find('li ul').parent().addClass('has-sub');

                                multiTg = function() {
                                    cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                                    cssmenu.find('.submenu-button').on('click', function() {
                                        $(this).toggleClass('submenu-opened');
                                        if ($(this).siblings('ul').hasClass('open')) {
                                            $(this).siblings('ul').removeClass('open').hide();
                                        }
                                        else {
                                            $(this).siblings('ul').addClass('open').show();
                                        }
                                    });
                                };

                                if (settings.format === 'multitoggle')
                                    multiTg();
                                else
                                    cssmenu.addClass('dropdown');

                                if (settings.sticky === true)
                                    cssmenu.css('position', 'fixed');

                                resizeFix = function() {
                                    if ($(window).width() > 768) {
                                        cssmenu.find('ul').show();
                                    }

                                    if ($(window).width() <= 768) {
                                        cssmenu.find('ul').hide().removeClass('open');
                                    }
                                };
                                resizeFix();
                                return $(window).on('resize', resizeFix);

                            });
                        };
                    })(jQuery);

                    (function($) {
                        $(document).ready(function() {

                            $(document).ready(function() {
                                $("#cssmenu").menumaker({
                                    title: "Menu",
                                    format: "multitoggle"
                                });
                                var foundActive = false, activeElement, linePosition = 0, menuLine = $("#cssmenu #menu-line"), lineWidth, defaultPosition, defaultWidth;

                                $("#cssmenu > ul > li").each(function() {
                                    if ($(this).hasClass('active')) {
                                        activeElement = $(this);
                                        foundActive = true;
                                    }
                                });

                                if (foundActive === false) {
                                    activeElement = $("#cssmenu > ul > li").first();
                                }

                                defaultWidth = lineWidth = activeElement.width();

                                defaultPosition = linePosition = activeElement.position().left;

                                menuLine.css("width", lineWidth);
                                menuLine.css("left", linePosition);

                                $("#cssmenu > ul > li").hover(function() {
                                    activeElement = $(this);
                                    lineWidth = activeElement.width();
                                    linePosition = activeElement.position().left;
                                    menuLine.css("width", lineWidth);
                                    menuLine.css("left", linePosition);
                                },
                                        function() {
                                            menuLine.css("left", defaultPosition);
                                            menuLine.css("width", defaultWidth);
                                        });

                            });


                        });
                    })(jQuery);
                </script> 
            </div>
        <!--end-container--> 
      </div>
          <!--end-box-menu--> 
        </div>
    <!--end-box-top--> 
  </div>
      <!--end-bg-box-top-->
      <div class="banner-top">
    <div  class="container">
          <div class="grid_12">
        <div id="fullwidth_slider" class="everslider fullwidth-slider">
              <ul class="es-slides">
            <li> <a href="#" title="#"><img src="css/img/pic1.jpg" alt="Example"></a>
                  <div class="fullwidth-title"> <a href="#">Đồ nội thất giá rẻ</a> <span>Description goes right here. It can be of any lenght and with few paragraphs</span> </div>
                </li>
            <li> <a href="#" title="#"><img src="css/img/pic2.jpg" alt="Example"></a>
                  <div class="fullwidth-title"> <a href="#">Đồ nội thất giá rẻ</a> <span>Description goes right here. It can be of any lenght and with few paragraphs</span> </div>
                </li>
            <li><a href="#" title="#"> <img src="css/img/pic3.jpg" alt="Example"></a>
                  <div class="fullwidth-title"> <a href="#">Đồ nội thất giá rẻ</a> <span>Description goes right here. It can be of any lenght and with few paragraphs</span> </div>
                </li>
          </ul>
            </div>
      </div>
        </div>
  </div>
    </div>
<!--End header -->
<div id="content" class="main">
<div class="container">
<div class="clearfix layout layout-2">
<div id="leftCol">
      <div class="panel panel-default categorybox">
    <div class="panel-heading">
          <h3>Danh mục sản phẩm</h3>
        </div>
    <div class="panel-body">
          <ul class="">
        <li class="first-menu-left-li"> <a style="color: #333;" title="Nội thất phòng khách" href="/noi-that-phong-khach-pc,402">Nội thất phòng khách</a> </li>
        <li class="first-menu-left-li"> <a style="color: #333;" title="Nội thất phòng ngủ" href="/noi-that-phong-ngu-pc,403">Nội thất phòng ngủ</a> </li>
        <li class="first-menu-left-li"> <a style="color: #333;" title="Nội thất phòng ngủ trẻ em" href="/noi-that-phong-ngu-tre-em-pc,404">Nội thất phòng ngủ trẻ em</a> </li>
        <li class="first-menu-left-li"> <a style="color: #333;" title="Nội thất phòng ăn" href="/noi-that-phong-an-pc,405">Nội thất phòng ăn</a> </li>
        <li class="first-menu-left-li"> <a style="color: #333;" title="Nộ thất phòng tắm" href="/no-that-phong-tam-pc,413">Nộ thất phòng tắm</a> </li>
      </ul>
        </div>
  </div>
      <div class="panel panel-default categorybox">
    <div class="panel-heading">
          <h3>Hỗ trợ trực tuyến</h3>
        </div>
    <div class="panel-body">
          <ul class="menu menu-list">
        <li class="sp">
              <div class="support-item"> <a title="Hỗ Trợ Online" href="#" class=" icon" id="phone"></a> <a href="#" style="padding: 0 0 0 10px;" class="name">Liên hệ trực tiếp : <span style="color:red">0948 854 888</span></a><br>
            <a title="Hỗ Trợ Online" href="ymsgr:buithanhdung@yahoo.com" rel="nofollow" class=" icon" id="icon-yahoo"></a> <a href="ymsgr:buithanhdung@yahoo.com" rel="nofollow" style="padding: 0 0 0 10px;" class="name">Hỗ trợ online</a><br>
            <a title="Hỗ Trợ Online" href="skype:buithanhdung?chat" rel="nofollow" class=" icon" id="icon-skype"></a> <a href="skype:buithanhdung?chat" rel="nofollow" style="padding: 0 0 0 10px;" class="name">Hỗ trợ online2</a><br>
          </div>
            </li>
      </ul>
        </div>
  </div>
      <div class="panel panel-default categorybox">
    <div class="panel-heading">
          <h3>Chúng tôi trên Facebook</h3>
        </div>
    <div class="panel-body">
          <div id="fb-root">&nbsp;</div>
          <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=336833589730523";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
          <div class="fb-page" data-hide-cover="false" data-href="https://www.facebook.com/web3nhat" data-show-facepile="true" data-show-posts="false" data-width="250">
        <div class="fb-xfbml-parse-ignore">
              <blockquote cite="https://www.facebook.com/web3nhat"><a href="https://www.facebook.com/web3nhat">Web 3 Nhất</a></blockquote>
            </div>
      </div>
        </div>
  </div>
      <div class="panel panel-default categorybox">
    <div class="panel-heading">
          <h3>Video</h3>
        </div>
    <div class="panel-body">
          <div class="video">
        <iframe width="100%" height="100%" frameborder="0" src="http://www.youtube.com/embed/GGptGey6axg?autohide=1" allowfullscreen="1" allowtransparency="true"> </iframe>
      </div>
        </div>
  </div>
      <div class="panel panel-default hotproduct">
    <div class="panel-heading">
          <h3>Sản phẩm nổi bật</h3>
        </div>
    <div class="panel-body">
          <div class="list list-small">
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> <a href="/ban-ghe-an-hien-dai-pd,136" title="Bàn ghế ăn hiện đại "> <img alt="Bàn ghế ăn hiện đại " src="css/img/post1.jpg" > </a> </div>
                  <div class="list-content-body">
                <div class="product-price-all"> <span class="list-content-title"> <a href="/ban-ghe-an-hien-dai-pd,136" title="Bàn ghế ăn hiện đại "> Bàn ghế ăn hiện đại </a> </span>
                      <div class="product-price"> Giá: <span class="pricetext">18.500.000</span><span class="currencytext">đ</span> </div>
                      <div class="product-price-market"> Giá cũ: <span class="pricetext">19.500.000</span><span class="currencytext">đ</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> <a href="/sofa-da-pd,130" title="Sofa da"> <img alt="Sofa da" src="css/img/post1.jpg" > </a> </div>
                  <div class="list-content-body">
                <div class="product-price-all"> <span class="list-content-title"> <a href="/sofa-da-pd,130" title="Sofa da"> Sofa da </a> </span>
                      <div class="product-price"> Giá: <span class="pricetext">19.999.000</span><span class="currencytext">đ</span> </div>
                      <div class="product-price-market"> Giá cũ: <span class="pricetext">21.000.000</span><span class="currencytext">đ</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> <a href="/sofa-pd,117" title="Sofa "> <img alt="Sofa " src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body">
                <div class="product-price-all"> <span class="list-content-title"> <a href="/sofa-pd,117" title="Sofa "> Sofa </a> </span>
                      <div class="product-price"> Giá: <span class="pricetext">900.000</span><span class="currencytext">đ</span> </div>
                      <div class="product-price-market"> Giá cũ: <span class="pricetext">990.000</span><span class="currencytext">đ</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> <a href="/giuong-ngu-tang-cl-pd,122" title="Giường ngủ tầng CL  "> <img alt="Giường ngủ tầng CL  " src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body">
                <div class="product-price-all"> <span class="list-content-title"> <a href="/giuong-ngu-tang-cl-pd,122" title="Giường ngủ tầng CL  "> Giường ngủ tầng CL </a> </span>
                      <div class="product-price"> Giá: <span class="pricetext">500.000</span><span class="currencytext">đ</span> </div>
                      <div class="product-price-market"> Giá cũ: <span class="pricetext">550.000</span><span class="currencytext">đ</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> <a href="/ban-ghe-an-go-soi-ma-ba33-pd,123" title="Bàn ghế ăn gỗ sồi "> <img alt="Bàn ghế ăn gỗ sồi " src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body">
                <div class="product-price-all"> <span class="list-content-title"> <a href="/ban-ghe-an-go-soi-ma-ba33-pd,123" title="Bàn ghế ăn gỗ sồi "> Bàn ghế ăn gỗ sồi </a> </span>
                      <div class="product-price"> Giá: <span class="pricetext">16.000.000</span><span class="currencytext">đ</span> </div>
                      <div class="product-price-market"> Giá cũ: <span class="pricetext">19.390.000</span><span class="currencytext">đ</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
      </div>
        </div>
  </div>
      <div class="panel panel-default categorybox">
    <div class="panel-body">
          <div class="banner"> <a href="" target="_blank" title="Banner 4"> <img alt="Banner 4" src="css/img/post1.jpg"  width="221" /> </a> </div>
          <div class="banner"> <a href="" target="_blank" title="Banner 10"> <img alt="Banner 10" src="css/img/post1.jpg"  width="221" /> </a> </div>
        </div>
  </div>
    </div>
<div id="contentCol">
<div id="centerCol">
<img src="/thong-ke.jpg" width="0" height="0" style="width: 0; height: 0; display: none;" rel="nofollow" />
<div class="box-js-top">
<div class="main-list">
      <div class="border-list">
    <h2> <span class="title-list-list">Sản phẩm khuyến mại</span></h2>
  </div>
      <!--end-border-list--> 
    </div>
<!--end-main-list-->
<div class="js">
<div class="jcarousel-wrapper">
<a class="jcarousel-control-next" href="#" data-jcarouselcontrol="true"></a> <a class="jcarousel-control-prev" href="#" data-jcarouselcontrol="true"></a>
<div class="jcarousel" data-jcarousel="true" data-jcarouselautoscroll="true">
<ul style="left: -0px; top: 0px;">
<li>
      <div class="box-img">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm1"><span>Xem nhanh</span></button>
    <div class="modal fade bs-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog modal-sm">
        <div class="modal-content ">
              <div class="header-popup clearfix"> <i class="icon-popup"></i>
            <div class="title-popup">Chi tiết sản phẩm</div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
              <div class="cont">
            <div class="product-detail">
                  <div class="product-detail-box">
                <div class="product-detail-img">
                      <div class="product-img-main"> <a class="product-img-small product-img-large cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </div>
                      <div class="product-img-item">
                     <ul class="clearfix">
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                        </ul>
                  </div>
                    </div>
                <div class="product-detail-info" id="product-detail-info">
                      <h2 class="product-info-title">Tủ giày gỗ </h2>
                      <div class="product-info-col1">
                    <p class="product-price"> <span class="product-detail-price"> <span class="pricetext">900.000</span><span class="currencytext">đ</span> </span> </p>
                    <p class="product-info-price-market">
                          <label>Giá cũ:</label>
                          <span class="product-detail-price-market"> <span class="pricetext">990.000</span><span class="currencytext">đ</span> </span> </p>
                    <p class="product-info-price-save">
                          <label>Tiết kiệm:</label>
                          <span class="product-detail-price-save"> <span class="pricetext">90.000</span><span class="currencytext">đ</span> </span> </p>
                    <p class="product-detail-sortdesc"> Khung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vải    Khung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vảiKhung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vải </p>
                    <div class="CartActionAdd ProductActionAdd"> <a href="/economy/shoppingcart/add/pid/117" class="addtocart noredirect a-btn-2" data-params="#product-detail-info"> <span class="a-btn-2-text">Xem chi tiết</span> </a> </div>
                  </div>
                      <!--            <div class="product-info-col2">
                        </div>--> 
                    </div>
              </div>
                  <div class="product-detail-more"> </div>
                </div>
          </div>
            </div>
      </div>
        </div>
    <a href="/tu-quan-ao-go-sang-trong-va-hien-dai-cho-khong-gian-cua-gia-dinh-ban-pd,144" title="Tủ quần áo gỗ "> <img alt="Sofa " src="css/img/post1.jpg"> </a></div>
      <div class="nd-banner">
    <p><a href="/tu-quan-ao-go-sang-trong-va-hien-dai-cho-khong-gian-cua-gia-dinh-ban-pd,144" title="Tủ quần áo gỗ ">Tủ quần áo gỗ </a></p>
    <div class="product-all">
          <div class="product-price-all clearfix">
        <div class="product-price-market"> <span><span class="pricetext">4.300.000</span><span class="currencytext">đ</span></span> </div>
        <div class="product-price product-price-list"> <span><span class="pricetext">3.900.000</span><span class="currencytext">đ</span></span> </div>
        <div class="sale-of"> <span>-9%</span> </div>
      </div>
        </div>
    <!--end-product-all--> 
  </div>
    </li>
<li>
      <div class="box-img">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm2"><span>Xem nhanh</span></button>
    <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog modal-sm">
        <div class="modal-content ">
              <div class="header-popup clearfix"> <i class="icon-popup"></i>
            <div class="title-popup">Chi tiết sản phẩm</div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
              <div class="cont">
            <div class="product-detail">
                  <div class="product-detail-box">
                <div class="product-detail-img">
                      <div class="product-img-main"> <a class="product-img-small product-img-large cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </div>
                      <div class="product-img-item">
                   <ul class="clearfix">
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                        </ul>
                  </div>
                    </div>
                <div class="product-detail-info" id="product-detail-info">
                      <h2 class="product-info-title">Tủ giày gỗ </h2>
                      <div class="product-info-col1">
                    <p class="product-price"> <span class="product-detail-price"> <span class="pricetext">900.000</span><span class="currencytext">đ</span> </span> </p>
                    <p class="product-info-price-market">
                          <label>Giá cũ:</label>
                          <span class="product-detail-price-market"> <span class="pricetext">990.000</span><span class="currencytext">đ</span> </span> </p>
                    <p class="product-info-price-save">
                          <label>Tiết kiệm:</label>
                          <span class="product-detail-price-save"> <span class="pricetext">90.000</span><span class="currencytext">đ</span> </span> </p>
                    <p class="product-detail-sortdesc"> Khung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vải    Khung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vảiKhung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vải </p>
                    <div class="CartActionAdd ProductActionAdd"> <a href="/economy/shoppingcart/add/pid/117" class="addtocart noredirect a-btn-2" data-params="#product-detail-info"> <span class="a-btn-2-text">Xem chi tiết</span> </a> </div>
                  </div>
                      <!--            <div class="product-info-col2">
                        </div>--> 
                    </div>
              </div>
                  <div class="product-detail-more"> </div>
                </div>
          </div>
            </div>
      </div>
        </div>
    <a href="/tu-quan-ao-go-sang-trong-va-hien-dai-cho-khong-gian-cua-gia-dinh-ban-pd,144" title="Tủ quần áo gỗ "> <img alt="Sofa " src="css/img/post1.jpg"> </a></div>
      <div class="nd-banner">
    <p><a href="/tu-quan-ao-go-sang-trong-va-hien-dai-cho-khong-gian-cua-gia-dinh-ban-pd,144" title="Tủ quần áo gỗ ">Tủ quần áo gỗ </a></p>
    <div class="product-all">
          <div class="product-price-all clearfix">
        <div class="product-price-market"> <span><span class="pricetext">4.300.000</span><span class="currencytext">đ</span></span> </div>
        <div class="product-price product-price-list"> <span><span class="pricetext">3.900.000</span><span class="currencytext">đ</span></span> </div>
        <div class="sale-of"> <span>-9%</span> </div>
      </div>
        </div>
    <!--end-product-all--> 
  </div>
    </li>
<li>
      <div class="box-img">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm3"><span>Xem nhanh</span></button>
    <div class="modal fade bs-example-modal-sm3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog modal-sm">
        <div class="modal-content ">
              <div class="header-popup clearfix"> <i class="icon-popup"></i>
            <div class="title-popup">Chi tiết sản phẩm</div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
              <div class="cont">
            <div class="product-detail">
                  <div class="product-detail-box">
                <div class="product-detail-img">
                      <div class="product-img-main"> <a class="product-img-small product-img-large cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </div>
                      <div class="product-img-item">
                    <ul class="clearfix">
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                        </ul>
                  </div>
                    </div>
                <div class="product-detail-info" id="product-detail-info">
                      <h2 class="product-info-title">Tủ giày gỗ </h2>
                      <div class="product-info-col1">
                    <p class="product-price"> <span class="product-detail-price"> <span class="pricetext">900.000</span><span class="currencytext">đ</span> </span> </p>
                    <p class="product-info-price-market">
                          <label>Giá cũ:</label>
                          <span class="product-detail-price-market"> <span class="pricetext">990.000</span><span class="currencytext">đ</span> </span> </p>
                    <p class="product-info-price-save">
                          <label>Tiết kiệm:</label>
                          <span class="product-detail-price-save"> <span class="pricetext">90.000</span><span class="currencytext">đ</span> </span> </p>
                    <p class="product-detail-sortdesc"> Khung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vải    Khung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vảiKhung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vải </p>
                    <div class="CartActionAdd ProductActionAdd"> <a href="/economy/shoppingcart/add/pid/117" class="addtocart noredirect a-btn-2" data-params="#product-detail-info"> <span class="a-btn-2-text">Xem chi tiết</span> </a> </div>
                  </div>
                      <!--            <div class="product-info-col2">
                        </div>--> 
                    </div>
              </div>
                  <div class="product-detail-more"> </div>
                </div>
          </div>
            </div>
      </div>
        </div>
    <a href="/tu-quan-ao-go-sang-trong-va-hien-dai-cho-khong-gian-cua-gia-dinh-ban-pd,144" title="Tủ quần áo gỗ "> <img alt="Sofa " src="css/img/post1.jpg"> </a></div>
      <div class="nd-banner">
    <p><a href="/tu-quan-ao-go-sang-trong-va-hien-dai-cho-khong-gian-cua-gia-dinh-ban-pd,144" title="Tủ quần áo gỗ ">Tủ quần áo gỗ </a></p>
    <div class="product-all">
          <div class="product-price-all clearfix">
        <div class="product-price-market"> <span><span class="pricetext">4.300.000</span><span class="currencytext">đ</span></span> </div>
        <div class="product-price product-price-list"> <span><span class="pricetext">3.900.000</span><span class="currencytext">đ</span></span> </div>
        <div class="sale-of"> <span>-9%</span> </div>
      </div>
        </div>
    <!--end-product-all--> 
  </div>
    </li>
<li>
      <div class="box-img">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm4"><span>Xem nhanh</span></button>
    <div class="modal fade bs-example-modal-sm4" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog modal-sm">
        <div class="modal-content ">
              <div class="header-popup clearfix"> <i class="icon-popup"></i>
            <div class="title-popup">Chi tiết sản phẩm</div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
              <div class="cont">
            <div class="product-detail">
                  <div class="product-detail-box">
                <div class="product-detail-img">
                      <div class="product-img-main"> <a class="product-img-small product-img-large cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </div>
                      <div class="product-img-item">
                    <ul class="clearfix">
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                        </ul>
                  </div>
                    </div>
                <div class="product-detail-info" id="product-detail-info">
                      <h2 class="product-info-title">Tủ giày gỗ </h2>
                      <div class="product-info-col1">
                    <p class="product-price"> <span class="product-detail-price"> <span class="pricetext">900.000</span><span class="currencytext">đ</span> </span> </p>
                    <p class="product-info-price-market">
                          <label>Giá cũ:</label>
                          <span class="product-detail-price-market"> <span class="pricetext">990.000</span><span class="currencytext">đ</span> </span> </p>
                    <p class="product-info-price-save">
                          <label>Tiết kiệm:</label>
                          <span class="product-detail-price-save"> <span class="pricetext">90.000</span><span class="currencytext">đ</span> </span> </p>
                    <p class="product-detail-sortdesc"> Khung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vải    Khung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vảiKhung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vải </p>
                    <div class="CartActionAdd ProductActionAdd"> <a href="/economy/shoppingcart/add/pid/117" class="addtocart noredirect a-btn-2" data-params="#product-detail-info"> <span class="a-btn-2-text">Xem chi tiết</span> </a> </div>
                  </div>
                      <!--            <div class="product-info-col2">
                        </div>--> 
                    </div>
              </div>
                  <div class="product-detail-more"> </div>
                </div>
          </div>
            </div>
      </div>
        </div>
    <a href="/tu-quan-ao-go-sang-trong-va-hien-dai-cho-khong-gian-cua-gia-dinh-ban-pd,144" title="Tủ quần áo gỗ "> <img alt="Sofa " src="css/img/post1.jpg"> </a></div>
      <div class="nd-banner">
    <p><a href="/tu-quan-ao-go-sang-trong-va-hien-dai-cho-khong-gian-cua-gia-dinh-ban-pd,144" title="Tủ quần áo gỗ ">Tủ quần áo gỗ </a></p>
    <div class="product-all">
          <div class="product-price-all clearfix">
        <div class="product-price-market"> <span><span class="pricetext">4.300.000</span><span class="currencytext">đ</span></span> </div>
        <div class="product-price product-price-list"> <span><span class="pricetext">3.900.000</span><span class="currencytext">đ</span></span> </div>
        <div class="sale-of"> <span>-9%</span> </div>
      </div>
        </div>
    <!--end-product-all--> 
  </div>
    </li>
<li>
      <div class="box-img">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm5"><span>Xem nhanh</span></button>
    <div class="modal fade bs-example-modal-sm5" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog modal-sm">
        <div class="modal-content ">
              <div class="header-popup clearfix"> <i class="icon-popup"></i>
            <div class="title-popup">Chi tiết sản phẩm</div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
              <div class="cont">
            <div class="product-detail">
                  <div class="product-detail-box">
                <div class="product-detail-img">
                      <div class="product-img-main"> <a class="product-img-small product-img-large cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </div>
                      <div class="product-img-item">
                    <ul class="clearfix">
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                          <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                        </ul>
                  </div>
                    </div>
                <div class="product-detail-info" id="product-detail-info">
                      <h2 class="product-info-title">Tủ giày gỗ </h2>
                      <div class="product-info-col1">
                    <p class="product-price"> <span class="product-detail-price"> <span class="pricetext">900.000</span><span class="currencytext">đ</span> </span> </p>
                    <p class="product-info-price-market">
                          <label>Giá cũ:</label>
                          <span class="product-detail-price-market"> <span class="pricetext">990.000</span><span class="currencytext">đ</span> </span> </p>
                    <p class="product-info-price-save">
                          <label>Tiết kiệm:</label>
                          <span class="product-detail-price-save"> <span class="pricetext">90.000</span><span class="currencytext">đ</span> </span> </p>
                    <p class="product-detail-sortdesc"> Khung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vải    Khung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vảiKhung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vải </p>
                    <div class="CartActionAdd ProductActionAdd"> <a href="/economy/shoppingcart/add/pid/117" class="addtocart noredirect a-btn-2" data-params="#product-detail-info"> <span class="a-btn-2-text">Xem chi tiết</span> </a> </div>
                  </div>
                      <!--            <div class="product-info-col2">
                        </div>--> 
                    </div>
              </div>
                  <div class="product-detail-more"> </div>
                </div>
          </div>
            </div>
      </div>
        </div>
    <a href="/tu-quan-ao-go-sang-trong-va-hien-dai-cho-khong-gian-cua-gia-dinh-ban-pd,144" title="Tủ quần áo gỗ "> <img alt="Sofa " src="css/img/post1.jpg"> </a></div>
      <div class="nd-banner">
    <p><a href="/tu-quan-ao-go-sang-trong-va-hien-dai-cho-khong-gian-cua-gia-dinh-ban-pd,144" title="Tủ quần áo gỗ ">Tủ quần áo gỗ </a></p>
    <div class="product-all">
          <div class="product-price-all clearfix">
        <div class="product-price-market"> <span><span class="pricetext">4.300.000</span><span class="currencytext">đ</span></span> </div>
        <div class="product-price product-price-list"> <span><span class="pricetext">3.900.000</span><span class="currencytext">đ</span></span> </div>
        <div class="sale-of"> <span>-9%</span> </div>
      </div>
        </div>
    <!--end-product-all--> 
  </div>
    </li>
</div>
<!--end-jcarousel-->
</div>
<!--end-jcarousel-wrapper-->
</div>
<!--end-js-->
</div>
<div class="box-js-top">
      <div class="main-list">
    <div class="border-list">
          <h2> <span class="title-list-list">Sản phẩm bán chạy</span></h2>
        </div>
    <!--end-border-list--> 
  </div>
      <!--end-main-list-->
      <div class="js">
    <div class="jcarousel-wrapper"> <a class="jcarousel-control-next" href="#" data-jcarouselcontrol="true"></a> <a class="jcarousel-control-prev" href="#" data-jcarouselcontrol="true"></a>
          <div class="jcarousel" data-jcarousel="true" data-jcarouselautoscroll="true">
        <ul style="left: -0px; top: 0px;">
              <li> <a href="/tu-quan-ao-go-sang-trong-va-hien-dai-cho-khong-gian-cua-gia-dinh-ban-pd,144" title="Tủ quần áo gỗ "> <img alt="Tủ quần áo gỗ " src="css/img/post1.jpg"> </a>
            <div class="nd-banner">
                  <p><a href="/tu-quan-ao-go-sang-trong-va-hien-dai-cho-khong-gian-cua-gia-dinh-ban-pd,144" title="Tủ quần áo gỗ ">Tủ quần áo gỗ </a></p>
                  <div class="product-all">
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">4.300.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">3.900.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-9%</span> </div>
                    </div>
              </div>
                  <!--end-product-all--> 
                </div>
          </li>
              <li> <a href="/sofa-go-pd,139" title="Sofa gỗ "> <img alt="Sofa gỗ " src="css/img/post1.jpg"> </a>
            <div class="nd-banner">
                  <p><a href="/sofa-go-pd,139" title="Sofa gỗ ">Sofa gỗ </a></p>
                  <div class="product-all">
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">33.000.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">30.000.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-9%</span> </div>
                    </div>
              </div>
                  <!--end-product-all--> 
                </div>
          </li>
              <li> <a href="/tu-ruou-go-phong-khach-pd,141" title="Tủ rượu gỗ phòng khách"> <img alt="Tủ rượu gỗ phòng khách" src="css/img/post1.jpg"> </a>
            <div class="nd-banner">
                  <p><a href="/tu-ruou-go-phong-khach-pd,141" title="Tủ rượu gỗ phòng khách">Tủ rượu gỗ phòng khách</a></p>
                  <div class="product-all">
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">4.000.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">3.800.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-5%</span> </div>
                    </div>
              </div>
                  <!--end-product-all--> 
                </div>
          </li>
              <li> <a href="/tu-giay-go-pd,142" title="Tủ giày gỗ"> <img alt="Tủ giày gỗ" src="css/img/post1.jpg"> </a>
            <div class="nd-banner">
                  <p><a href="/tu-giay-go-pd,142" title="Tủ giày gỗ">Tủ giày gỗ</a></p>
                  <div class="product-all">
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">3.900.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">3.700.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-5%</span> </div>
                    </div>
              </div>
                  <!--end-product-all--> 
                </div>
          </li>
              <li> <a href="/ban-ghe-an-hien-dai-pd,145" title="Bàn ghế ăn hiện đại "> <img alt="Bàn ghế ăn hiện đại " src="css/img/post1.jpg"> </a>
            <div class="nd-banner">
                  <p><a href="/ban-ghe-an-hien-dai-pd,145" title="Bàn ghế ăn hiện đại ">Bàn ghế ăn hiện đại </a></p>
                  <div class="product-all">
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">13.000.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">11.700.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-10%</span> </div>
                    </div>
              </div>
                  <!--end-product-all--> 
                </div>
          </li>
              <li> <a href="/ke-trang-tri-lusco-modulo-home-1500s-2-van-soi-tatsuta-pd,118" title="Kệ trang trí Lusco Modulo Home 1500S-2 (Vân Sồi Tatsuta)  "> <img alt="Kệ trang trí Lusco Modulo Home 1500S-2 (Vân Sồi Tatsuta)  " src="css/img/post1.jpg"> </a>
            <div class="nd-banner">
                  <p><a href="/ke-trang-tri-lusco-modulo-home-1500s-2-van-soi-tatsuta-pd,118" title="Kệ trang trí Lusco Modulo Home 1500S-2 (Vân Sồi Tatsuta)  ">Kệ trang trí Lusco Modulo Home 1500S-2 (Vân Sồi Tatsuta) </a></p>
                  <div class="product-all">
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">2.800.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">2.700.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-4%</span> </div>
                    </div>
              </div>
                  <!--end-product-all--> 
                </div>
          </li>
            </ul>
      </div>
          <!--end-jcarousel--> 
        </div>
    <!--end-jcarousel-wrapper--> 
  </div>
      <!--end-js--> 
    </div>
<div class="center-main-center">
      <div class="centerContent">
    <div class="main-list"> <span>Nội thất phòng khách</span> <a href="/noi-that-phong-khach-pc,402" class="view-all">Xem tất cả</a> </div>
    <div class="product-all">
          <div class="list grid">
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> 
                <!-- Small modal -->
                
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"><span>Xem nhanh</span></button>
                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                      <div class="modal-dialog modal-sm">
                    <div class="modal-content ">
                          <div class="header-popup clearfix"> <i class="icon-popup"></i>
                        <div class="title-popup">Chi tiết sản phẩm</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                          <div class="cont">
                        <div class="product-detail">
                              <div class="product-detail-box">
                            <div class="product-detail-img">
                                  <div class="product-img-main"> <a class="product-img-small product-img-large cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </div>
                                  <div class="product-img-item">
                                <ul>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                    </ul>
                              </div>
                                </div>
                            <div class="product-detail-info" id="product-detail-info">
                                  <h2 class="product-info-title">Tủ giày gỗ </h2>
                                  <div class="product-info-col1">
                                <p class="product-price"> <span class="product-detail-price"> <span class="pricetext">900.000</span><span class="currencytext">đ</span> </span> </p>
                                <p class="product-info-price-market">
                                      <label>Giá cũ:</label>
                                      <span class="product-detail-price-market"> <span class="pricetext">990.000</span><span class="currencytext">đ</span> </span> </p>
                                <p class="product-info-price-save">
                                      <label>Tiết kiệm:</label>
                                      <span class="product-detail-price-save"> <span class="pricetext">90.000</span><span class="currencytext">đ</span> </span> </p>
                                <p class="product-detail-sortdesc"> Khung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vải    Khung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vảiKhung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vải </p>
                                <div class="CartActionAdd ProductActionAdd"> <a href="/economy/shoppingcart/add/pid/117" class="addtocart noredirect a-btn-2" data-params="#product-detail-info"> <span class="a-btn-2-text">Xem chi tiết</span> </a> </div>
                              </div>
                                  <!--            <div class="product-info-col2">
                        </div>--> 
                                </div>
                          </div>
                              <div class="product-detail-more"> </div>
                            </div>
                      </div>
                        </div>
                  </div>
                    </div>
                <a href="/tu-giay-go-pd,142"> <img alt="Tủ giày gỗ" src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body"> <span class="list-content-title"> <a href="/tu-giay-go-pd,142"> Tủ giày gỗ </a> </span>
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">3.900.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">3.700.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-5%</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm7"><span>Xem nhanh</span></button>
                <div class="modal fade bs-example-modal-sm7" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                      <div class="modal-dialog modal-sm">
                    <div class="modal-content ">
                          <div class="header-popup clearfix"> <i class="icon-popup"></i>
                        <div class="title-popup">Chi tiết sản phẩm</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                          <div class="cont">
                        <div class="product-detail">
                              <div class="product-detail-box">
                            <div class="product-detail-img">
                                  <div class="product-img-main"> <a class="product-img-small product-img-large cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </div>
                                  <div class="product-img-item">
                                <ul>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                    </ul>
                              </div>
                                </div>
                            <div class="product-detail-info" id="product-detail-info">
                                  <h2 class="product-info-title">Tủ giày gỗ </h2>
                                  <div class="product-info-col1">
                                <p class="product-price"> <span class="product-detail-price"> <span class="pricetext">900.000</span><span class="currencytext">đ</span> </span> </p>
                                <p class="product-info-price-market">
                                      <label>Giá cũ:</label>
                                      <span class="product-detail-price-market"> <span class="pricetext">990.000</span><span class="currencytext">đ</span> </span> </p>
                                <p class="product-info-price-save">
                                      <label>Tiết kiệm:</label>
                                      <span class="product-detail-price-save"> <span class="pricetext">90.000</span><span class="currencytext">đ</span> </span> </p>
                                <p class="product-detail-sortdesc"> Khung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vải    Khung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vảiKhung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vải </p>
                                <div class="CartActionAdd ProductActionAdd"> <a href="/economy/shoppingcart/add/pid/117" class="addtocart noredirect a-btn-2" data-params="#product-detail-info"> <span class="a-btn-2-text">Xem chi tiết</span> </a> </div>
                              </div>
                                  <!--            <div class="product-info-col2">
                        </div>--> 
                                </div>
                          </div>
                              <div class="product-detail-more"> </div>
                            </div>
                      </div>
                        </div>
                  </div>
                    </div><a href="/tu-ruou-go-phong-khach-pd,141"> <img alt="Tủ rượu gỗ phòng khách" src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body"> <span class="list-content-title"> <a href="/tu-ruou-go-phong-khach-pd,141"> Tủ rượu gỗ phòng khách </a> </span>
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">4.000.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">3.800.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-5%</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm8"><span>Xem nhanh</span></button>
                <div class="modal fade bs-example-modal-sm8" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                      <div class="modal-dialog modal-sm">
                    <div class="modal-content ">
                          <div class="header-popup clearfix"> <i class="icon-popup"></i>
                        <div class="title-popup">Chi tiết sản phẩm</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                          <div class="cont">
                        <div class="product-detail">
                              <div class="product-detail-box">
                            <div class="product-detail-img">
                                  <div class="product-img-main"> <a class="product-img-small product-img-large cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </div>
                                  <div class="product-img-item">
                                <ul>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                    </ul>
                              </div>
                                </div>
                            <div class="product-detail-info" id="product-detail-info">
                                  <h2 class="product-info-title">Tủ giày gỗ </h2>
                                  <div class="product-info-col1">
                                <p class="product-price"> <span class="product-detail-price"> <span class="pricetext">900.000</span><span class="currencytext">đ</span> </span> </p>
                                <p class="product-info-price-market">
                                      <label>Giá cũ:</label>
                                      <span class="product-detail-price-market"> <span class="pricetext">990.000</span><span class="currencytext">đ</span> </span> </p>
                                <p class="product-info-price-save">
                                      <label>Tiết kiệm:</label>
                                      <span class="product-detail-price-save"> <span class="pricetext">90.000</span><span class="currencytext">đ</span> </span> </p>
                                <p class="product-detail-sortdesc"> Khung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vải    Khung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vảiKhung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vải </p>
                                <div class="CartActionAdd ProductActionAdd"> <a href="/economy/shoppingcart/add/pid/117" class="addtocart noredirect a-btn-2" data-params="#product-detail-info"> <span class="a-btn-2-text">Xem chi tiết</span> </a> </div>
                              </div>
                                  <!--            <div class="product-info-col2">
                        </div>--> 
                                </div>
                          </div>
                              <div class="product-detail-more"> </div>
                            </div>
                      </div>
                        </div>
                  </div>
                    </div> <a href="/sofa-ni-pd,140"> <img alt="Sofa nỉ" src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body"> <span class="list-content-title"> <a href="/sofa-ni-pd,140"> Sofa nỉ </a> </span>
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">15.000.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">14.700.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-2%</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm9"><span>Xem nhanh</span></button>
                <div class="modal fade bs-example-modal-sm9" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                      <div class="modal-dialog modal-sm">
                    <div class="modal-content ">
                          <div class="header-popup clearfix"> <i class="icon-popup"></i>
                        <div class="title-popup">Chi tiết sản phẩm</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                          <div class="cont">
                        <div class="product-detail">
                              <div class="product-detail-box">
                            <div class="product-detail-img">
                                  <div class="product-img-main"> <a class="product-img-small product-img-large cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </div>
                                  <div class="product-img-item">
                                <ul>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                      <li> <a class="product-img-small cboxElement" href="http://w3ni160.web3nhat.net/mediacenter/media/images/products/113/1/s800_600/234_1434965964_8415587d7ccc21b2.jpg"> <img src="css/img/post1.jpg"> </a> </li>
                                    </ul>
                              </div>
                                </div>
                            <div class="product-detail-info" id="product-detail-info">
                                  <h2 class="product-info-title">Tủ giày gỗ </h2>
                                  <div class="product-info-col1">
                                <p class="product-price"> <span class="product-detail-price"> <span class="pricetext">900.000</span><span class="currencytext">đ</span> </span> </p>
                                <p class="product-info-price-market">
                                      <label>Giá cũ:</label>
                                      <span class="product-detail-price-market"> <span class="pricetext">990.000</span><span class="currencytext">đ</span> </span> </p>
                                <p class="product-info-price-save">
                                      <label>Tiết kiệm:</label>
                                      <span class="product-detail-price-save"> <span class="pricetext">90.000</span><span class="currencytext">đ</span> </span> </p>
                                <p class="product-detail-sortdesc"> Khung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vải    Khung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vảiKhung gỗ kháng ẩm; kháng khuẩn. Mút D40 kháng khuẩn; độ bền cao; đàn hồi tốt. Chân Inox không gỉ; được bọc vải </p>
                                <div class="CartActionAdd ProductActionAdd"> <a href="/economy/shoppingcart/add/pid/117" class="addtocart noredirect a-btn-2" data-params="#product-detail-info"> <span class="a-btn-2-text">Xem chi tiết</span> </a> </div>
                              </div>
                                  <!--            <div class="product-info-col2">
                        </div>--> 
                                </div>
                          </div>
                              <div class="product-detail-more"> </div>
                            </div>
                      </div>
                        </div>
                  </div>
                    </div> <a href="/sofa-go-pd,139"> <img alt="Sofa gỗ " src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body"> <span class="list-content-title"> <a href="/sofa-go-pd,139"> Sofa gỗ </a> </span>
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">33.000.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">30.000.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-9%</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
      </div>
          <!--end-list-gird--> 
        </div>
  </div>
      <div class="centerContent">
    <div class="main-list"> <span>Nội thất phòng ngủ</span> <a href="/noi-that-phong-ngu-pc,403" class="view-all">Xem tất cả</a> </div>
    <div class="product-all">
          <div class="list grid">
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> <a href="/tu-quan-ao-go-sang-trong-va-hien-dai-cho-khong-gian-cua-gia-dinh-ban-pd,144"> <img alt="Tủ quần áo gỗ " src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body"> <span class="list-content-title"> <a href="/tu-quan-ao-go-sang-trong-va-hien-dai-cho-khong-gian-cua-gia-dinh-ban-pd,144"> Tủ quần áo gỗ </a> </span>
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">4.300.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">3.900.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-9%</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> <a href="/tu-quan-ao-go-pd,143"> <img alt="Tủ quần áo gỗ " src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body"> <span class="list-content-title"> <a href="/tu-quan-ao-go-pd,143"> Tủ quần áo gỗ </a> </span>
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">3.800.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">3.500.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-8%</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> <a href="/tu-keo-4-ngan-wo-504-pd,132"> <img alt="Tủ kéo 4 ngăn" src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body"> <span class="list-content-title"> <a href="/tu-keo-4-ngan-wo-504-pd,132"> Tủ kéo 4 ngăn </a> </span>
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">500.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">450.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-10%</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> <a href="/tu-quan-ao-pd,129"> <img alt="Tủ quần áo" src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body"> <span class="list-content-title"> <a href="/tu-quan-ao-pd,129"> Tủ quần áo </a> </span>
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">4.500.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">3.800.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-16%</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
      </div>
          <!--end-list-gird--> 
        </div>
  </div>
      <div class="centerContent">
    <div class="main-list"> <span>Nội thất phòng ăn</span> <a href="/noi-that-phong-an-pc,405" class="view-all">Xem tất cả</a> </div>
    <div class="product-all">
          <div class="list grid">
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> <a href="/ban-ghe-an-go-soi-pd,146"> <img alt="Bàn ghế ăn gỗ sồi " src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body"> <span class="list-content-title"> <a href="/ban-ghe-an-go-soi-pd,146"> Bàn ghế ăn gỗ sồi </a> </span>
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">13.500.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">12.000.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-11%</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> <a href="/ban-ghe-an-hien-dai-pd,145"> <img alt="Bàn ghế ăn hiện đại " src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body"> <span class="list-content-title"> <a href="/ban-ghe-an-hien-dai-pd,145"> Bàn ghế ăn hiện đại </a> </span>
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">13.000.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">11.700.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-10%</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> <a href="/ban-ghe-an-hien-dai-pd,136"> <img alt="Bàn ghế ăn hiện đại " src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body"> <span class="list-content-title"> <a href="/ban-ghe-an-hien-dai-pd,136"> Bàn ghế ăn hiện đại </a> </span>
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">19.500.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">18.500.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-5%</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> <a href="/ban-ghe-an-go-soi-ma-ba33-pd,123"> <img alt="Bàn ghế ăn gỗ sồi " src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body"> <span class="list-content-title"> <a href="/ban-ghe-an-go-soi-ma-ba33-pd,123"> Bàn ghế ăn gỗ sồi </a> </span>
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">19.390.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">16.000.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-17%</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
      </div>
          <!--end-list-gird--> 
        </div>
  </div>
      <div class="centerContent">
    <div class="main-list"> <span>Nộ thất phòng tắm</span> <a href="/no-that-phong-tam-pc,413" class="view-all">Xem tất cả</a> </div>
    <div class="product-all">
          <div class="list grid">
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> <a href="/sen-voi-pd,148"> <img alt="Sen vòi" src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body"> <span class="list-content-title"> <a href="/sen-voi-pd,148"> Sen vòi </a> </span>
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">1.750.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">1.650.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-6%</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> <a href="/dia-xa-phong-pd,147"> <img alt="Đĩa xà phòng" src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body"> <span class="list-content-title"> <a href="/dia-xa-phong-pd,147"> Đĩa xà phòng </a> </span>
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">300.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">210.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-30%</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> <a href="/chau-ban-am-ban-toto-lw646jwf-pd,134"> <img alt="Chậu bán âm bàn TOTO " src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body"> <span class="list-content-title"> <a href="/chau-ban-am-ban-toto-lw646jwf-pd,134"> Chậu bán âm bàn TOTO </a> </span>
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">3.300.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">3.120.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-5%</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
        <div class="list-item">
              <div class="list-content">
            <div class="list-content-box">
                  <div class="list-content-img"> <a href="/chau-rua-dat-am-ban-toto-pd,131"> <img alt="Chậu rửa đặt âm bàn TOTO" src="css/img/post1.jpg"> </a> </div>
                  <div class="list-content-body"> <span class="list-content-title"> <a href="/chau-rua-dat-am-ban-toto-pd,131"> Chậu rửa đặt âm bàn TOTO </a> </span>
                <div class="product-price-all clearfix">
                      <div class="product-price-market"> <span><span class="pricetext">2.300.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="product-price product-price-list"> <span><span class="pricetext">2.150.000</span><span class="currencytext">đ</span></span> </div>
                      <div class="sale-of"> <span>-7%</span> </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
      </div>
          <!--end-list-gird--> 
        </div>
  </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<div class="footer">
      <div class="container">
    <div class="row ">
          <div class="col-md-8 clearfix">
        <div class="col-sm-7 left-footer-col-8">
              <div class="dc-footer">
            <div class="footer-nd">
                  <p><span style="font-size: 18px; line-height: 28.7999992370605px;"><b>Về chúng tôi</b></span></p>
                  <p><strong>Địa chỉ : 335 Cầu Giấy -&nbsp;Hà Nội - Việt Nam</strong><br />
                Tài khoản cá nhân:&nbsp;<strong>ACB: 8822233</strong>&nbsp;- Tên chủ tài khoản:&nbsp;<strong>Trần văn B</strong>&nbsp;(Ngân hàng ACB - Phòng giao dịch Kim liên - Hà Nội)<br />
                Tài khoản cá nhân:&nbsp;<strong>Agribank: 166668446666</strong>- Tên chủ tài khoản:&nbsp;<strong>Nguyễn Văn C</strong><br />
                Tài khoản cá nhân:&nbsp;<strong>ACB: 152958919</strong>&nbsp;- Tên chủ tài khoản:&nbsp;<strong>CTY TNHH DT TM XD Solid</strong><br />
                Tài khoản cá nhân:&nbsp;<strong>Sacombank: 060055006262</strong>&nbsp;- Tên chủ tài khoản:&nbsp;<strong>CTY TNHH DT TM XD solid</strong></p>
                  <p>© Copy right-2015 web3nhat.vn</p>
                </div>
          </div>
            </div>
        <div class="col-sm-5 right-footer-col-4">
              <div class="menu-footer">
            <div class=" menu-col">
                  <ul class="list-group">
                <li class="list-group-item menu-origin has-item " > <a href="javascript:void(0)"  title="Hỗ trợ khách hàng">Hỗ trợ khách hàng</a>
                      <ul class="list-group">
                    <li class="list-group-item   " > <a href="/cac-cau-hoi-thuong-gap-pde,35"  title="Các câu hỏi thường gặp">Các câu hỏi thường gặp</a> </li>
                    <li class="list-group-item   " > <a href="/huong-dan-dat-hang-pde,32"  title="Hướng dẫn đặt hàng">Hướng dẫn đặt hàng</a> </li>
                    <li class="list-group-item   " > <a href="/phuong-thuc-van-chuyen-pde,33"  title="Phương thức vận chuyển">Phương thức vận chuyển</a> </li>
                    <li class="list-group-item   " > <a href="/chinh-sach-doi-tra-pde,34"  title="Chính sách đổi trả">Chính sách đổi trả</a> </li>
                  </ul>
                    </li>
              </ul>
                </div>
            <div class=" menu-col">
                  <ul class="list-group">
                <li class="list-group-item menu-origin has-item " > <a href="/gioi-thieu"  title="Về Web 3 Nhất">Về Web 3 Nhất</a>
                      <ul class="list-group">
                    <li class="list-group-item   " > <a href="/gioi-thieu"  title="Giới thiệu 3 Nhất">Giới thiệu 3 Nhất</a> </li>
                    <li class="list-group-item   " > <a href="/tuyen-dung"  title="Tuyển dụng">Tuyển dụng</a> </li>
                    <li class="list-group-item   " > <a href="/lien-he"  title="Liên hệ">Liên hệ</a> </li>
                  </ul>
                    </li>
              </ul>
                </div>
          </div>
            </div>
      </div>
          <!--end-col-md-8-->
          
          <div class="col-md-4" style="height: 300px;overflow: hidden">
        <div id="14355644025590f97225a64" class="map"></div>
        <script>
        var map;
        var infowindow = [];
        var defaultLatLng = new google.maps.LatLng(21.007066,105.831931);
        var latlng;
        function initialize() {
            var mapOptions = {
                zoom: 16,
                center: defaultLatLng
            };
            map = new google.maps.Map(document.getElementById('14355644025590f97225a64'), mapOptions);
            infowindow[28] = new google.maps.InfoWindow({content: "<div class=\"map-info\">\r\n    <h3 class=\"map-info-name\">C\u00f4ng ty C\u00f4ng Ngh\u1ec7 3 Nh\u1ea5t<\/h3>\r\n    <p class=\"map-info-more\">\r\n        82 Ph\u1ea1m Ng\u1ecdc Th\u1ea1ch - \u0110\u1ed1ng \u0110a - H\u00e0 n\u1ed9i &nbsp;&nbsp;|&nbsp;&nbsp; support@web3nhat.com &nbsp;&nbsp;|&nbsp;&nbsp; 0948854888    <\/p>\r\n<\/div>"});
            //
            placeMarker(defaultLatLng, map, 28);

    
        }

        function placeMarker(position, map, id) {
            var marker = new google.maps.Marker({
                position: position,
                draggable: false,
                map: map
            });
            google.maps.event.addListener(marker, 'click', function(e) {
                infowindow[id].open(map, marker);
            });
            if (id ==28) {
                google.maps.event.trigger(marker, 'click');
            }
        }
        //
        google.maps.event.addDomListener(window, 'load', initialize);

    </script> 
      </div>
        </div>
    <!--end-row-->
    <div class="designby"><a target="_blank" title="Thiết kế web, thiết kế web chuyên nghiệp" href="http://web3nhat.vn">Thiết kế web: Web3Nhat</a></div>
  </div>
      <!--end-container--> 
    </div>
</div>
<script type="text/javascript">
/*<![CDATA[*/
jQuery(document).on('submit', '.searchform', function() {
                                        var sv = jQuery(this).find('.inputSearch').val();
                                        if (sv == '' || sv.length < 2) {
                                            alert('Từ khóa tìm kiếm không đúng. Từ khóa phải có ít nhất 2 ký tự.');
                                            return false;
                                        }
                                    });
                                    if(jQuery('.searchbox .searchSelect option:selected').val()){
                                            var categorybox = jQuery('.searchbox .searchSelect').closest('.search-category-select');
                                            if(categorybox){
                                                categorybox.find('.search-category-text').text(categorybox.find('.searchSelect option:selected').text());
                                            }
                                            
                                        }
                                       
                                    jQuery('.searchbox .searchSelect').on('change', function() {
                                        jQuery(this).closest('.search-category-select').find('.search-category-text').text(jQuery(this).find('option:selected').text());
                                    });
                                    

                                var id = (jQuery('#bg489').length)?'#bg489 ':'';
                                var jcarousel = $('.jcarousel').jcarousel({wrap: 'circular'}); 
                                $(id+'.jcarousel').jcarouselAutoscroll({autostart: true,interval: 4000,target: '+=1'});
                                $(id+'.jcarousel-control-prev').on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '-=1'
            });

        $(id+'.jcarousel-control-next')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '+=1'
            });
                                 $(id+'.jcarousel-pagination')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                perPage: 1,
                item: function(page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });
         
/*]]>*/
</script>
</body>
</html>