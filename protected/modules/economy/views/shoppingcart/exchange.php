
<div class="container">
	<div class="exchange_point oder_succs" > 
		<div class="pura_coin">
			<div class="coinmarketcap-currency-widget" data-currency="pura" data-base="USD"  data-secondary="BTC"></div>
		</div>
		<div class="info_point">
			<?php if (Yii::app()->user->isGuest) { ?>
				<span class="text_pr1">Bạn Cần Đăng Nhập Để Thực Hiện Chức Năng Này: <a href="login/login/login"> ĐĂNG NHẬP</a></span>
			 <?php } else { ?></span>
				<div class="change_point"><p class="text_pr1">Chúng tôi hỗ trợ đổi điểm từ PURA</p></div>
				<div class="change_point"><p class="text_pr1"> Tỷ Giá Quy Đổi 1 PURA = 1 POINT </p></div>
				<div class="change_point">
					<p class="text_pr1"> Số Point Hiện Tại Của Bạn Là: 	<span class="point"><?php echo $userinfo['point']; ?> </span></p> 
				</div>
				
				<div class="product-info-quantity">
                       
						<form class="form-horizontal widget-form" id="sc-checkout-form" action="<?php echo Yii::app()->createUrl('/economy/shoppingcart/exchange'); ?>" method="post">
							<div  class="input_val">
								<label class="text_label">Nhập Vào Số Lượng PURA Muốn Trao Đổi:</label>
								<input type="number" name="pura" value="1" max-lenght="1000000" class="product_pura" id="product_pura"  min="1" step="1">
							</div>
							<div  class="input_val1">
								<label  class="text_label">Nhập Vào Ví Của Bạn:</label>
								<input type="text" name="vi" value="<?php echo $vi;?>"  class="product_vi product_pura" id="product_pura"  >
								<div style="margin-top: 10px;" class="errorMessage1" id="Orders_payment_method_em_"><?php echo $error_vi_pura;?></div>
							</div>
							<div>
								<input class="a-btn2" type="submit" name="yt0" value="Xác Nhận Giao Dịch">
							</div>

						</form>
               </div>
				
			 <?php } ?>
			
		</div>
	</div>
</div>