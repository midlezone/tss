
<div id="footer-cta">
      <div>
         <h2 class="container-wrapper">Cam Kết Chỉ Chia Sẻ Những Sản Phẩm Mà Vân Anh Đã Và Đang Dùng</h2>		
         <hr>
		  <h2 class="container-wrapper" style=" font-size: 20px; width: 100%;">Luôn sẵn sàng phục vụ Quý khách!</h2>
		
      </div>
      <!--container-wrapper-->
</div>
<div id="footer" class="clearfix">

	<a href="javascript:void(0)" class="back-top" title="" id="scrollup" style="display: inline;">
			<span class="back-top-image">
			  <img src="//hstatic.net/101/1000071101/1000193382/back-top.png" alt="">
			</span>    
	</a>
    <div class="bottom-footer clearfix container-wrapper">
            <div class="row">
               <div id="footer-social">
				   <h3>Follow Us</h3>
				   <a target="_blank" id="footer-facebook-link" href="https://www.facebook.com/myphamlevananh" title="Lisse on Facebook">
				   <i class="ss-icon ss-icon-medium">facebook</i>
				   <span>Facebook</span>
				   </a>				   
				   <a target="_blank" id="footer-instagram-link" href="https://www.instagram.com/le_van_anh03/" title="Lisse on Instagram">
				   <i class="ss-icon ss-icon-medium">instagram</i>
				   <span>Instagram</span>
				   </a>
				   <a target="_blank" id="footer-youtube-link" href="https://www.youtube.com/channel/UCLqFUMlQmwD7oh__5JdEaUg/videos" title="Lisse on YouTube">
				   <i class="ss-icon ss-icon-medium">youtube</i>
				   <span>YouTube</span>
				   </a>
				</div>
				
               <div id="footer-nav"> 
					<ul>
					  
					  <li><a id="footer-nav1-/" href="/dieu-khoan-pde,5146">Điều Khoản</a></li>
					  
					  <li><a id="footer-nav1-/pages/store" href="/chinh-sach-bao-mat-pde,5147">Chính Sách Bảo Mật</a></li>
					  
					  <li><a id="footer-nav1-/pages/terms" href="/huong-dan-mua-hang-pde,4148">Hướng Dẫn Mua Hàng</a></li>
					  <li><a id="footer-nav2-/pages/testimonials" href="/thanh-toan-pde,5149">Thanh Toán</a></li>
					 
					  
					</ul>
					<ul>  					  		  
					   <li><a id="footer-nav1-/pages/refund-policy" href="/tra-hang-hoan-tien-pde,5150">Trả Hàng Hoàn Tiền</a></li>
					  <li><a id="footer-nav2-/pages/contact-us" href="/cham-soc-khach-hang-pde,5151">Chăm Sóc Khách Hàng</a></li>
					  
					  <li><a id="footer-nav2-/pages/privacy-policy" href="/chinh-sach-bao-hanh-pde,5152">Chính Sách Bảo Hành</a></li>
					  
					  
					</ul>
				 </div>
                <div id="footer-about">
					<a href='http://online.gov.vn/Home/WebDetails/68464'>
					<img alt='' title='' src='http://online.gov.vn/Content/EndUser/LogoCCDVSaleNoti/logoSaleNoti.png'/></a>
					<img alt="Về trang chủ" src="/mediacenter/media/images/1182/logo/326_1544169906_5305c0a29b2308e2.png">
					<p><b>CÔNG TY TNHH OCEAN BEAUTY</b></p><br/>					
					<p>Địa Chỉ: Tầng 2, Số 68 Phố Trần Thái Tông, Phường Dịch Vọng Hậu, Quận Cầu Giấy, Thành phố Hà Nội</p><br/>	
					<p>Điện thoại/fax: 0243.783.4778</p><br/>	
					<p>Hotline: 090.793.8866</p><br/>	
					<p>Email: info@levananh.com</p><br/>	
					<p>Mã số doanh nghiệp:<b>0106611658</b> do Sở Kế hoạch và Đầu tư Hà Nội cấp ngày 31/07/2014</p>
					<?php
					$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK4));
					?>
				</div>
				
            </div>
        </div>
   
</div>
<div id="footer-credits" class="clearfix">
    <div class="container-wrapper" style="font-size:14px; text-align:center;">@2018 LÊ VÂN ANH</div>
  </div>
<style>
        #scrollup{
           
        }
       
    </style>
<script>
    
    $(document).ready(function(){
        $('#scrollup').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    });
     $('.slide_dh').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 1
    });
</script>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v3.3'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="2234607923247588"
  logged_in_greeting="Chào bạn, Vân Anh có thể giúp gì cho bạn?"
  logged_out_greeting="Chào bạn, Vân Anh có thể giúp gì cho bạn?">
</div>
