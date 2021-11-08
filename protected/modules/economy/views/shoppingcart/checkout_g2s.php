<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'sc-checkout-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'htmlOptions' => array('class' => 'form-horizontal widget-form'),
        ));
?>
<div class="container">
<div class="sc checkout checkout-st2">
    
    <div class="sc-ck-info col-xs-6">
            <div class="billing">
               <div class="step-title ttl-box block-info-tl-login">
					<?php if (Yii::app()->user->isGuest) { ?>
						  <span class="tl-login">ĐĂNG NHẬP</span>
					<?php } ?>
						<span class="tl1">Thông tin người nhận</span>
			   </div>
			   <div id="checkout-step-shipping">
					<div class="form-group">
						<?php echo $form->label($billing, 'name', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<?php echo $form->textField($billing, 'name', array('class' => 'form-control', 'style' => 'width: 100%;')); ?>
							<?php echo $form->error($billing, 'name'); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo $form->label($billing, 'email', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<?php echo $form->textField($billing, 'email', array('class' => 'form-control', 'style' => 'width: 100%;')); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo $form->label($billing, 'phone', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<?php echo $form->textField($billing, 'phone', array('class' => 'form-control', 'style' => 'width: 100%;')); ?>
							<?php echo $form->error($billing, 'phone'); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo $form->label($billing, 'address', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<?php echo $form->textField($billing, 'address', array('class' => 'form-control', 'style' => 'width: 100%;')); ?>
							<?php echo $form->error($billing, 'address'); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo $form->label($billing, 'city', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<?php echo $form->dropDownList($billing, 'city', LibProvinces::getListProvinceArr(), array('class' => 'form-control')); ?>
							<?php echo $form->error($billing, 'city'); ?>
						</div>
					</div>
					
				</div>
            </div>
           
    </div>

    <div class="sc col-xs-6">
        <div class="accordion-inner">
			 <div class="billing">
				<div class="step-title ttl-box1 block-info-tl-login">
							  <span class="tl-login" onclick="login_click(true);"></span>
							<span class="tl1">Thông tin đơn hàng</span>
				</div>
				<?php
				$this->renderPartial('pack_g2s', array(
					'shoppingCart' => $shoppingCart,
					'update' => false,
				));
				?>
			</div>
        </div>
    </div>
	
	 <div class="sc-ck-info payment_method">
           
            <div class="billing">
                <div class="step-title ttl-box"><span class="tl1">Hình thức thanh toán</span></div>
				<?php echo $form->error($order, 'payment_method'); ?>
				 <div class="errorMessage" id="Orders_payment_method_em_"><?php echo $error_pm_point;?></div>
				 <div class="errorMessage1" id="Orders_payment_method_em_"><?php echo $error_pm_point1;?></div>
				<div class="form-group">
						<div class="payment">
						   <div class="radio pm_parent">
							 
							  <input type="radio" name="Orders[payment_method]" id="Orders1" value="1">
							  <span class="txt">Thanh toán khi nhận hàng</span>
						   </div>
						   <div class="radio pm_parent">
							  <input type="radio" name="Orders[payment_method]"  id="Orders2" value="2">
							  <span class="txt">Thanh toán trực tuyến</span>
								<div class="online-step onlineShow" style="display:none;">
									  <input type="radio" name="Orders[payment_method_online]"  id="Orders3" value="3" checked>
									  <span class="txt1">Chuyển khoản ngân hàng</span>
										<div class="custom-dropdown drd-bank-transfer" data-dropdown-custom="3">
										
											<select class="dropdown-label" style="display:none;">
											  <option value="0" selected>- NH Vietcombank</option>
											  <option value="1">- NH Tiên Phong</option>
											  <option value="2">- NH Agribank</option>
											  <option value="3" >- NH Vietinbank</option>
											  <option value="4" >- NH Sacombank</option>
											  <option value="4" >- Ngân hàng khác</option>
											</select>
											
										  </div>
								   </div>
						   </div>
						   
						   
						   <div class="radio pm_parent">
							  <input type="radio" name="Orders[payment_method]"  id="Orders4" value="4">
							  <span class="txt">Thanh toán Bằng Điểm Tích Lũy</span>
							  <?php if (Yii::app()->user->isGuest) { ?>
							   <span class="tl-login1" style="display:none;">ĐĂNG NHẬP</span>
							  <?php } else { ?>

							    <span class="point" style="display:none;" >Số Điểm Hiện Tại Của Bạn: <?php echo $billing->point; ?> </span>
								<span class="point" style="display:none;" >Tổng Số Tiền Thanh Toán Cho Đơn Hàng VND: <?php echo $shoppingCart->getTotalPrice1(); ?> </span>
								<span class="point" style="display:none;" >Số Điểm Thanh Toán Cho Đơn Hàng: <?php echo $shoppingCart->getTotalPoint(); ?>  </span>

								<span class="point" style="display:none;" >Chuyển Điểm Để Thanh Toán <a target="_blank" href="/economy/shoppingcart/exchange">Click</a> </span>
							  <?php } ?>
						   </div>
						   
						   <div class="errorMessage" id="Orders_payment_method_em_" style="display:none"></div>
						</div>
						
							
							
				</div>
                  
            </div>
    </div>
	
    <?php if ($order->note) { ?>
        <div class="sc-node" style="padding-bottom: 20px;">
            <?php echo $form->label($order, 'note', array('class' => 'control-label')); ?>
            <div class="sc-note">
                <?php echo $form->textArea($order, 'note', array('class' => 'form-control', 'style' => 'width: 100%;')); ?>
                <?php echo $form->error($order, 'note'); ?>
            </div>
        </div>
    <?php } ?>
    <div class="row">
        <div class="">
            <?php echo CHtml::submitButton(Yii::t('shoppingcart', 'confirm_button'), array('class' => 'btn123 btn btn-sm btn-primary pull-right', 'id' => 'submitcheckout','onsubmit'=>'submitF();')); ?>
        </div>
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