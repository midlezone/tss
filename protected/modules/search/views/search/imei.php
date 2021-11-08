<?php if (count($order)): ?>
<div class="w3n-order">
	<h2>Thông tin Sản Phẩm</h2>
	<div class="producst_info"> 
		<?php
			$this->renderPartial('_product1', array(
				'products' => $order,
			));
		?>		
		
	</div>
	
    <h2>Thông tin Khách Hàng</h2>
	<?php foreach ($order as $value) {?>
	<div class="w3n-order1">
		<div class="producst_info_1"><span><b>Khách Hàng:</b>:&nbsp;</span><?php echo $value['billing_name'] ?></div>
		<div class="producst_info_1"><b>Số Điện Thoại:</b>&nbsp;<?php echo $value['billing_phone'] ?></div>
		<div class="producst_info_1"><b>Địa Chỉ:</b>&nbsp; <?php echo $value['billing_address'] ?></div>
		
		<div class="producst_info_1"><b>Email:</b>&nbsp; <?php echo $value['billing_email'] ?></div>
		<div class="producst_info_1"><b>Thời Gian Mua Máy:</b>&nbsp; <?php echo date('d-m-Y H:i:s', $value['created_time']); ?></div>
		<div class="producst_info_1"><b>Hình Thức Thanh Toán:</b>&nbsp;<?php echo $value['payment_method'] ?></div>
		<div class="producst_info_1"><b>Ghi Chú:</b>&nbsp;<?php echo $value['note'] ?></div>		

	</div>
	<?php } ?>
	 
	
	
	
    
</div>
<div class="row">
    <div class="col-xs-12">
        </br>
        <button class="btn btn-info pull-right" id="printorder"><?php echo Yii::t('shoppingcart', 'order_print'); ?></button>
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
<?php else: ?>
<div class="search-result">
        <p class="textreport">Không Tồn Tại Sản Phẩm Nào Trùng Với IMEI Mà Bạn Đã Nhập!</p>
</div>

<?php endif; ?>