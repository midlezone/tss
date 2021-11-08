<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'sc-checkout-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'htmlOptions' => array('class' => 'form-horizontal widget-form'),
        ));
?>
<div class="sc checkout checkout-st2 container">

    <h2 class="product-category"><?php echo Yii::t('shoppingcart', 'checkoutandorder'); ?></h2>
    <div class="sc-ck-info">
        <div class="row">
            <div class="col-xs-6 billing">
                <h3 class="sc-billing-text"><?php echo Yii::t('shoppingcart', 'billing-text') ?></h3>
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
                        <?php echo $form->error($billing, 'email'); ?>
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
                <div class="checkbox cs-check" style="padding-top: 0px;">
                    <input id="ytbilltoship" type="hidden" name="Billing[billtoship]" value="0">
                    <label>
                        <input type="checkbox" name="Billing[billtoship]" id="billtoship" <?php if ($billing->billtoship) echo 'checked="checked"'; ?> value="1" /> <?php echo Yii::t('shoppingcart', 'shippingaddress'); ?> 
                    </label>
                </div>
            </div>
            <div class="col-xs-6 shipping <?php if ($billing->billtoship) echo 'hidden'; ?>" id="shipping">
                 <h2 class="product-category"><?php echo Yii::t('shoppingcart', 'shipping-text') ?></h2>
                <div class="form-group">
                    <?php echo $form->label($shipping, 'name', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
                        <?php echo $form->textField($shipping, 'name', array('class' => 'form-control', 'style' => 'width: 100%;')); ?>
                        <?php echo $form->error($shipping, 'name'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($shipping, 'phone', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
                        <?php echo $form->textField($shipping, 'phone', array('class' => 'form-control', 'style' => 'width: 100%;')); ?>
                        <?php echo $form->error($shipping, 'phone'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($shipping, 'address', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
                        <?php echo $form->textField($shipping, 'address', array('class' => 'form-control', 'style' => 'width: 100%;')); ?>
                        <?php echo $form->error($shipping, 'address'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($shipping, 'city', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
                        <?php echo $form->dropDownList($shipping, 'city', LibProvinces::getListProvinceArr(), array('class' => 'form-control')); ?>
                        <?php echo $form->error($shipping, 'city'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ps">
        <div class="col-xs-6 payment">
            <h3 class="sr-method-text"><?php echo Yii::t('shoppingcart', 'payment_method'); ?></h3>
            <?php
            $paymentmethod = Orders::getPaymentMethod2();
            if ($paymentmethod) {
                foreach ($paymentmethod as $pk => $plabel) {
                    ?>
                   <div class="radio pm_parent">
                        <label>
                            <input type="radio" name="Orders[payment_method]" value="<?php echo $pk; ?>" <?php if ($order->payment_method == $pk) echo 'checked="checked"' ?> />
                            <?php echo $plabel; ?>
                        </label></br>
                        <label>
                            <input type="radio" name="Orders[payment_method]" value="2"/>
                            Thanh toán Khi Nhận Hàng (COD)
                        </label>
                    </div>
                    <?php
                }
            }
            ?>
            <?php echo $form->error($order, 'payment_method'); ?>
        </div>
        <div class="col-xs-6 transport" style="display:none;">
            <h3 class="sr-method-text"><?php echo Yii::t('shoppingcart', 'transport_method'); ?></h3>
            <input type="radio" name="Orders[transport_method]" value="1" checked="">
        </div>
    </div>
    <div class="sc">
        <div class="accordion-inner">
            <?php
            $this->renderPartial('pack1', array(
                'shoppingCart' => $shoppingCart,
                'update' => false,
				 'bonus' => $bonus,
				'revenue' => $revenue
            ));
            ?>
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
        <div class="col-xs-12">
            <?php echo CHtml::submitButton(Yii::t('shoppingcart', 'confirm_button'), array('class' => 'btn btn-sm btn-primary pull-right', 'id' => 'submitcheckout','onsubmit'=>'submitF();')); ?>
            <?php echo CHtml::Button(Yii::t('shoppingcart', 'back_button'), array('class' => 'btn btn-sm btn-primary pull-right', 'onclick' => 'history.go(-1);', 'style'=>'margin-right: 20px;')); ?>
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