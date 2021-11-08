<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '2200777593494533');
	
	
  fbq('track', 'Purchase');

	
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=2200777593494533&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<div class="w3n-order container">
	<h2 class="product-category">ĐĂNG KÝ KHÓA HỌC THÀNH CÔNG</h2>
	<div class="oder_succs"> 
    <table width="100%" cellpadding="5" cellspacing="5" style=" border-collapse: inherit;border-spacing: 5px;">
		<div class="infor_oder">
		
			<p>Chào <strong><span class="yel">Quý Khách,</span></strong></p>
			<p>Quý khách vừa đăng ký thành công khóa học của <a href=""><?php echo $_SERVER['HTTP_HOST']; ?></a>.
			</p>
				<p>Thông tin đăng ký đang chờ xác nhận thanh toán. Vui lòng thực hiện chuyển khoản với thông tin chi tiết bên dưới:</p>
					<div class="box-bankinfo">
					  <h4>thông tin chuyển khoản</h4>
					  <div class="bank-info">

						  <div class="bank-group-left">
							  <div class="bank-col-1">
								  <img src="https://checkout.scdn.vn/images/ecom/checkout/bank-list/vietcombank-sucess.jpg" alt="logo ngân hàng">
								</div>
							   <div class="bank-col-midle">
								  <span class="bank-name">NGÂN HÀNG VIETCOMBANK</span>
								  <span class="bank-branch">Chi nhánh: Thanh Xuân - Hà Nội</span>
							  </div>
						  </div>
						  <div class="bank-col-2">
							  <span class="bank-acc-name">Tên tài khoản nhận: <strong>Lê Vân Anh</strong></span>
							  <span class="bank-acc-number">Số tài khoản nhận: <strong>0711000274835</strong></span>
							  <span class="bank-money">Số tiền thanh toán: <strong>1.390.000 VNĐ</strong></span>
						  </div>
					  </div>	  
					  
				</div>   
				<p>Sau khi chúng tôi xác nhận giao dịch chuyển khoản thành công.</p>
				<p>Thông tin đăng nhập sẽ được gửi tới email của quý khách, vui lòng kiểm tra email để biết thêm chi tiết.</p>
			
		</div>
		
		
    </table>
	</div>
	
</div>

<script>
    jQuery('#printorder').on('click', function() {
        w = window.open();
        w.document.write($('.w3n-order').html());
        w.print();
        w.close();
    });
</script>