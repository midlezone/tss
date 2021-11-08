<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'sc-checkout-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'htmlOptions' => array('class' => 'form-horizontal widget-form'),
        ));
?>


<div class="sc checkout checkout-st2 container">
	
    <h2 class="product-category">Thanh Toán Mua Tip</h2>
		
		<div class="warpper">
			  <input class="radio" id="one" name="group" type="radio" checked>
			  <input class="radio" id="two" name="group" type="radio">
			  <input class="radio" id="three" name="group" type="radio">
			  <input class="radio" id="year" name="group" type="radio">
			<div class="tabs">
				<label class="tab" id="one-tab" for="one">Tip Theo Ngày</label>
				<label class="tab" id="two-tab" for="two">Tip Theo Tuần</label>
				<label class="tab" id="three-tab" for="three">Tip Theo Tháng</label>
				<label class="tab" id="year-tab" for="year">Tip Theo Năm</label>
			</div>
			  <div class="panels">
				  <div class="panel" id="one-panel">
						<div class="bill-code">
						   <div class="box no-border">
							  <div class="box-body" id="fourt">
								 
								 <div class="form-group2" style="display: block">
									<label for="email">Chọn ngân hàng nhận chuyển khoản: <span class="requid">(*)</span></label><br>
									<select name="Orders[payment_method]" class="form-control" id="bank">
									   <option value="">Chọn ngân hàng nhận chuyển khoản</option>
									   <option value="VietcomBank">VietcomBank</option>
									   <option value="VPBank">VPBank</option>
									</select>
									<div class="errorMessage" id="Users_email_em_" style=""><?php if($error_payment): ?><?php echo $error_payment ?> <?php endif; ?></div>
								 </div>
								 <br>
							   
								 <div class="form-group2">
									<label for="phone">Số điện thoại của bạn: <span class="requid">(*)</span></label>
									<?php echo $form->textField($billing, 'phone', array('class' => 'form-control', 'style' => 'width: 100%;')); ?>
									 <?php echo $form->error($billing, 'phone'); ?>
									<div class="errorMessage" id="Users_email_em_" style=""><?php if($error_phone): ?><?php echo $error_phone ?> <?php endif; ?></div>
								 </div>
								 <div class="form-group2">
									<label for="email">Ghi chú:</label><br>
									<textarea style="height: 100px;" class="form-control" id="note" placeholder="Ghi chú không được dài quá 100 ký tự" maxlength="100"></textarea>
								 </div>
							  </div>
						   </div>
						</div>
						  
						<div class="sc">
							<div class="accordion-inner">
								<?php
								$this->renderPartial('pro168', array(
									'shoppingCart' => $shoppingCart,
									'update' => false,
								));
								?>
							</div>
						</div>
				  </div>
				  
				  <div class="panel" id="two-panel">
						<div class="bill-code">
						   <div class="box no-border">
							  <div class="box-body" id="fourt">
								 
								 <div class="form-group2" >
									<label for="email">Chọn ngân hàng nhận chuyển khoản: <span class="requid">(*)</span></label><br>
									<select name="Orders[payment_method_week]" class="form-control" id="bank">
									   <option value="">Chọn ngân hàng nhận chuyển khoản</option>
									   <option value="VietcomBank">VietcomBank</option>
									   <option value="VPBank">VPBank</option>
									</select>
								 </div>
								 <br>
							   
								 <div class="form-group2">
									<label for="phone">Số điện thoại của bạn: <span class="requid">(*)</span></label>
									<input class="form-control" style="width: 100%;" name="Users[phone_week]" id="Users_phone" type="text" maxlength="20">
									<div class="errorMessage" id="Users_email_em_" style=""><?php if($error_phone): ?><?php echo $error_phone ?> <?php endif; ?></div>
								 </div>
								 <div class="form-group2">
									<label for="email">Ghi chú:</label><br>
									<textarea style="height: 100px;" class="form-control" id="note" placeholder="Ghi chú không được dài quá 100 ký tự" maxlength="100"></textarea>
								 </div>
							  </div>
						   </div>
						</div>
						  
						<div class="sc">
							<div class="accordion-inner">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th style="width: 80px; text-align: center">Hình ảnh</th>
												<th>Tên Tip</th>           
												<th style="width: 80px; text-align: center">Số Lượng</th>
												<th style="width: 110px; text-align: center">Giá Tip</th>
												<th style="width: 110px; text-align: center">Thành Tiền</th>
												<th style="width: 130px; text-align: center">Ưu Đãi </th>
												<th style="width: 130px; text-align: center">Thanh Toán</th>

											</tr>
										</thead>
										<tbody>
														<tr>
													<td class="muted center_text"><a href="">
													</td>
													<td>
														<a href="" class="product-name">quý khách bỏ ra 2.000.000 VNĐ sẽ được nhận TIP của 7 ngày liên tiếp trong tuần</a>
																		</td>
												  
													<td>
																				1                                    </td>
													<td style="text-align:right;">2.000.000</td>
													<td style="text-align:right;"><span class="pricetext">2.000.000</span><span class="currencytext">đ</span></td>
													 <td style="text-align:right;"></td>
													<td style="text-align:right;">2.000.000</td>
												</tr>
													  
											<tr class="sc-totalprice-row">
												<td colspan="6">
													<div class="sc-totalprice-text">
														<span>Thành tiền:</span>
													</div>
													<div class="sc-totalprice-text">
														<span>Tổng tiền thanh toán:</span>
													</div>
												</td>
												<td style="text-align:right;">
													<div class="sc-totalprice">2.000.000</div>
													<div class="sc-totalprice">2.000.000</div>
												</td>
											</tr>
										</tbody>
									</table>
							</div>
						</div>
				  </div>
				  <div class="panel" id="three-panel">
						<div class="bill-code">
						   <div class="box no-border">
							  <div class="box-body" id="fourt">
								 
								 <div class="form-group2" style="display: block">
									<label for="email">Chọn ngân hàng nhận chuyển khoản: <span class="requid">(*)</span></label><br>
									<select name="Orders[payment_method_month]" class="form-control" id="bank">
									   <option value="">Chọn ngân hàng nhận chuyển khoản</option>
									   <option value="VietcomBank">VietcomBank</option>
									   <option value="VPBank">VPBank</option>
									</select>
								 </div>
								 <br>
							   
								 <div class="form-group2">
									<label for="phone">Số điện thoại của bạn: <span class="requid">(*)</span></label>
									<input class="form-control" style="width: 100%;" name="Users[phone_month]" id="Users_phone" type="text" maxlength="20">
									<div class="errorMessage" id="Users_email_em_" style=""><?php if($error_phone): ?><?php echo $error_phone ?> <?php endif; ?></div>
								 </div>
								 <div class="form-group2">
									<label for="email">Ghi chú:</label><br>
									<textarea style="height: 100px;" class="form-control" id="note" placeholder="Ghi chú không được dài quá 100 ký tự" maxlength="100"></textarea>
								 </div>
							  </div>
						   </div>
						</div>
						  
						<div class="sc">
							<div class="accordion-inner">
								<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th style="width: 80px; text-align: center">Hình ảnh</th>
												<th>Tên Tip</th>           
												<th style="width: 80px; text-align: center">Số Lượng</th>
												<th style="width: 110px; text-align: center">Giá Tip</th>
												<th style="width: 110px; text-align: center">Thành Tiền</th>
												<th style="width: 130px; text-align: center">Ưu Đãi </th>
												<th style="width: 130px; text-align: center">Thanh Toán</th>

											</tr>
										</thead>
										<tbody>
														<tr>
													<td class="muted center_text"><a href="">
													</td>
													<td>
														<a href="" class="product-name">quý khách bỏ ra 10.000.000 VNĐ sẽ được nhận TIP của 30 ngày liên tiếp trong tuần</a>
																		</td>
												  
													<td>
																				1                                    </td>
													<td style="text-align:right;">10.000.000</td>
													<td style="text-align:right;"><span class="pricetext">10.000.000</span><span class="currencytext">đ</span></td>
													 <td style="text-align:right;"></td>
													<td style="text-align:right;">10.000.000</td>
												</tr>
													  
											<tr class="sc-totalprice-row">
												<td colspan="6">
													<div class="sc-totalprice-text">
														<span>Thành tiền:</span>
													</div>
													<div class="sc-totalprice-text">
														<span>Tổng tiền thanh toán:</span>
													</div>
												</td>
												<td style="text-align:right;">
													<div class="sc-totalprice">10.000.000</div>
													<div class="sc-totalprice">10.000.000</div>
												</td>
											</tr>
										</tbody>
									</table>
							</div>
						</div>
						
				  </div>
				  
				  <div class="panel" id="year-panel">
						<div class="bill-code">
						   <div class="box no-border">
							  <div class="box-body" id="fourt">
								 
								 <div class="form-group2" style="display: block">
									<label for="email">Chọn ngân hàng nhận chuyển khoản: <span class="requid">(*)</span></label><br>
									<select name="Orders[payment_method_year]" class="form-control" id="bank">
									   <option value="">Chọn ngân hàng nhận chuyển khoản</option>
									   <option value="VietcomBank">VietcomBank</option>
									   <option value="VPBank">VPBank</option>
									</select>
								 </div>
								 <br>
							   
								 <div class="form-group2">
									<label for="phone">Số điện thoại của bạn: <span class="requid">(*)</span></label>
									<input class="form-control" style="width: 100%;" name="Users[phone_year]" id="Users_phone" type="text" maxlength="20">
									<div class="errorMessage" id="Users_email_em_" style=""><?php if($error_phone): ?><?php echo $error_phone ?> <?php endif; ?></div>
								 </div>
								 <div class="form-group2">
									<label for="email">Ghi chú:</label><br>
									<textarea style="height: 100px;" class="form-control" id="note" placeholder="Ghi chú không được dài quá 100 ký tự" maxlength="100"></textarea>
								 </div>
							  </div>
						   </div>
						</div>
						  
						<div class="sc">
							<div class="accordion-inner">
								<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th style="width: 80px; text-align: center">Hình ảnh</th>
												<th>Tên Tip</th>           
												<th style="width: 80px; text-align: center">Số Lượng</th>
												<th style="width: 110px; text-align: center">Giá Tip</th>
												<th style="width: 110px; text-align: center">Thành Tiền</th>
												<th style="width: 130px; text-align: center">Ưu Đãi </th>
												<th style="width: 130px; text-align: center">Thanh Toán</th>

											</tr>
										</thead>
										<tbody>
														<tr>
													<td class="muted center_text"><a href="">
													</td>
													<td>
														<a href="" class="product-name">quý khách bỏ ra 100.000.000 VNĐ sẽ được nhận TIP của 365 ngày liên tiếp trong tuần</a>
																		</td>
												  
													<td>
																				1                                    </td>
													<td style="text-align:right;">100.000.000</td>
													<td style="text-align:right;"><span class="pricetext">100.000.000</span><span class="currencytext">đ</span></td>
													 <td style="text-align:right;"></td>
													<td style="text-align:right;">100.000.000</td>
												</tr>
													  
											<tr class="sc-totalprice-row">
												<td colspan="6">
													<div class="sc-totalprice-text">
														<span>Thành tiền:</span>
													</div>
													<div class="sc-totalprice-text">
														<span>Tổng tiền thanh toán:</span>
													</div>
												</td>
												<td style="text-align:right;">
													<div class="sc-totalprice">100.000.000</div>
													<div class="sc-totalprice">100.000.000</div>
												</td>
											</tr>
										</tbody>
									</table>
							</div>
						</div>
				  </div>
				  
			  </div>
		</div>


	
   
    <div class="row">
        <div class="col-xs-12">
            <?php echo CHtml::submitButton(Yii::t('shoppingcart', 'Xác Nhận Và Gửi'), array('class' => 'btn btn-sm btn-primary pull-right', 'id' => 'submitcheckout','onsubmit'=>'submitF();')); ?>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>

<script>
			
    var payment = {is_payment_online:<?php echo (int)SitePayment::model()->checkPaymentOnline();?>,payment_method_online:<?php echo Orders::PAYMENT_METHOD_ONLINE;?>,method:0,method_child:0};
    jQuery(document).ready(function() {
        jQuery('#billtoship').on('click', function() {
            if (jQuery(this).prop("checked"))
                jQuery('#shipping').addClass('hidden');
            else
                jQuery('#shipping').removeClass('hidden');
        });
        //payment online
        if(payment.is_payment_online){
            jQuery('.pm_parent > label > input[type=radio]').on('click',function(){
                payment.method = jQuery(this).val();               
                if(payment.method==payment.payment_method_online){                
                    jQuery('#submitcheckout').val('Thanh toán');                
                }else{
                    jQuery('#submitcheckout').val('Xác nhận và gửi đơn hàng');
                    payment.method_child = 0;
                }
                jQuery('.pm_list_children.active').removeClass('active').slideUp('fast');            
                jQuery(this).parents('.pm_parent').children('.pm_list_children').addClass('active').slideDown('fast'); 
            });
            jQuery('#sc-checkout-form').on('submit',function(){
                if(payment.method==payment.payment_method_online && payment.method_child == 0){
                    alert("Bạn chưa chọn Ngân hàng bạn muốn sử dụng thanh toán");
                    return false;
                }
            });
        }
    });    
</script>
<script>
	
	$(".main-nav-store-link").css("display", "block");
	$(".menuMain").css("display", "none");

</script>