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
  fbq('init', '1070781319773131');
  fbq('track', 'PageView');

  	fbq('track', 'Purchase');

</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1070781319773131&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=2200777593494533&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<div class="w3n-order container">
	<h2 class="product-category">ĐẶT HÀNG THÀNH CÔNG</h2>
	<div class="oder_succs"> 
    <table width="100%" cellpadding="5" cellspacing="5" style=" border-collapse: inherit;border-spacing: 5px;">
		<div class="infor_oder">
		
			<p>Chào <strong><span class="yel"><?php echo $order['billing_name'] ?>,</span></strong></p>
			<p>Quý khách vừa đặt thành công sản phẩm của <a href=""><?php echo $_SERVER['HTTP_HOST']; ?></a>, mã đơn hàng của quý khách là:<strong><span class="yel"> <?php echo $order['order_id']; ?></span></strong>.
			</p>
			<?php if ($paymentmethod == 'Chuyển Khoản Ngân Hàng'):?> 
				<p>Đơn hàng đang chờ xác nhận thanh toán. Vui lòng thực hiện chuyển khoản với thông tin chi tiết bên dưới:</p>
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
							  <span class="bank-money">Số tiền thanh toán: <strong><?php echo HtmlFormat::money_format($order['order_total']) ?></strong></span>
							  <span class="bank-note">Ghi chú: Thanh toán cho đơn hàng <?php echo $order['order_id']; ?></span>
						  </div>
					  </div>	  
					  
				</div>   
				<p>Sau khi shop xác nhận có hàng, sản phẩm sẽ được giao hàng đến địa chỉ của quý khách tại 	<b><?php echo $order['billing_address'] ?></b> trong 1 - 2 ngày.</p>
				<p>Mọi thông tin về đơn hàng sẽ được gửi tới email của quý khách, vui lòng kiểm tra email để biết thêm chi tiết.</p>
				<p>Đối với đơn hàng trên 1 triệu miễn phí ship toàn quốc còn lại là phí ship 30k VNĐ</p>
			<?php else: ?>
				<p>Sau khi shop xác nhận có hàng, sản phẩm sẽ được giao hàng đến địa chỉ của quý khách tại 	<b><?php echo $order['billing_address'] ?></b> trong 1 - 2 ngày.</p>
				<p>Mọi thông tin về đơn hàng sẽ được gửi tới email của quý khách, vui lòng kiểm tra email để biết thêm chi tiết.</p>
				<p>Đối với đơn hàng trên 1 triệu miễn phí ship toàn quốc còn lại là phí ship 30k VNĐ</p>
			<?php endif; ?>
			
		</div>
		<div class="infor_oder">
			<p><b><?php echo Yii::t('shoppingcart', 'order-time'); ?>: </b><?php echo date('d-m-Y H:i:s', $order['created_time']); ?></p>
			<p><b>Số Điện Thoại:<b> </b><?php echo $order['billing_phone'] ?></p>
			<p><b><?php echo Yii::t('shoppingcart', 'payment_method'); ?>: </b><?php echo $paymentmethod; ?></p>
		</div>
		
		 <div class="sc-totalprice"><p><b>Tổng tiền thanh toán:<b> <?php echo Product::getPriceText(array('price' => $order['order_total'])); ?> </b></p></div>
		
    </table>
	</div>
	<div class="row">
		<div class="col-xs-12">
			</br>
			<button class="btn btn-info pull-right" id="printorder"><?php echo Yii::t('shoppingcart', 'order_print'); ?></button>
		</div>
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