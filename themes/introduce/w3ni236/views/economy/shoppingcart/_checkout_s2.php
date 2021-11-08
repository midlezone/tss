<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'sc-checkout-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'htmlOptions' => array('class' => 'form-horizontal widget-form'),
        ));
?>
<div class="sc checkout checkout-st2">

    <h2 class="sc-title"><?php echo Yii::t('shoppingcart', 'shoppingcart'); ?></h2>
    <div class="sc-ck-info">
        <div class="row">
            <div class="col-xs-6 billing">
                <h3 class="sc-billing-text"><?php echo Yii::t('shoppingcart', 'Thông tin khách hàng') ?></h3>
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
                <!--                <div class="checkbox cs-check" style="padding-top: 0px;">
                                    <input id="ytbilltoship" type="hidden" name="Billing[billtoship]" value="0">
                                    <label>
                                        <input type="checkbox" name="Billing[billtoship]" id="billtoship" <?php if ($billing->billtoship) echo 'checked="checked"'; ?> value="1" /> <?php echo Yii::t('shoppingcart', 'shippingaddress'); ?> 
                                    </label>
                                </div>-->
            </div>
            <div class="col-xs-6 shipping <?php if ($billing->billtoship) echo 'hidden'; ?>" id="shipping">
                <h3 class="sc-shipping-text"><?php echo Yii::t('shoppingcart', 'shipping-text') ?></h3>
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


    </div>
    <div class="sc">
        <div class="accordion-inner">
            <?php
            $this->renderPartial('pack', array(
                'shoppingCart' => $shoppingCart,
                'update' => false,
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
            <?php echo CHtml::submitButton(Yii::t('shoppingcart', 'Xác nhận và gửi'), array('class' => 'btn btn-sm btn-primary pull-right', 'id' => 'submitcheckout', 'onsubmit' => 'submitF();')); ?>
            <?php echo CHtml::Button(Yii::t('shoppingcart', 'back_button'), array('class' => 'btn btn-sm btn-primary pull-right', 'onclick' => 'history.go(-1);', 'style' => 'margin-right: 20px;')); ?>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>

<script>
    var payment = {is_payment_online:<?php echo (int) SitePayment::model()->checkPaymentOnline(); ?>, payment_method_online:<?php echo Orders::PAYMENT_METHOD_ONLINE; ?>, method: 0, method_child: 0};
    jQuery(document).ready(function () {
        jQuery('#billtoship').on('click', function () {
            if (jQuery(this).prop("checked"))
                jQuery('#shipping').addClass('hidden');
            else
                jQuery('#shipping').removeClass('hidden');
        });
        //payment online

    });
</script>