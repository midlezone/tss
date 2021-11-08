<div class="w3n-order container">
	<h2 class="product-category">ĐĂNG KÝ MUA TIP THÀNH CÔNG</h2>
	<div class="oder_succs">
	<div class="oder_succs"> 
    <table width="100%" cellpadding="5" cellspacing="5" style=" border-collapse: inherit;border-spacing: 5px;">
		<div class="infor_oder">
		
			<p>Chào <strong><span class="yel"><?php echo $order['billing_name'] ?>,</span></strong></p>
			<p>Quý khách vừa đặt thành công sản phẩm của <a href=""><?php echo $_SERVER['HTTP_HOST']; ?></a>, mã đơn hàng của quý khách là:<strong><span class="yel"> <?php echo $order['order_id']; ?></span></strong>.
			</p>
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
							  <span class="bank-note">Nội Dung chuyển Khoản: <?php echo $order['order_id']; ?></span>
						  </div>
					  </div>	  
					  
				</div>   
				<p>Thông tin Tip sẽ được gửi tới email và Số Điện Thoại của quý khách, vui lòng kiểm tra email hoặc điện thoại.</p>
			
		</div>
		<div class="infor_oder">
			<p><b><?php echo Yii::t('shoppingcart', 'order-time'); ?>: </b><?php echo date('d-m-Y H:i:s', $order['created_time']); ?></p>
			<p><b>Số Điện Thoại:<b> </b><?php echo $order['billing_phone'] ?></p>
			<p><b><?php echo Yii::t('shoppingcart', 'payment_method'); ?>: </b><?php echo $paymentmethod; ?></p>
		</div>
		
		 <div class="sc-totalprice"><p><b>Tổng tiền thanh toán:<b> <?php echo Product::getPriceText(array('price' => $order['price'])); ?> </b></p></div>
		
    </table>
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