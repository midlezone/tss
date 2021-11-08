<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'sc-checkout-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'htmlOptions' => array('class' => 'form-horizontal widget-form'),
        ));
?>

<div class="sc checkout checkout-st2 container">
	<div class="note">
		<p>
			<h3 class="note_title">Quyền lợi khi trở thành thành viên của chuspa.vn</h3>
			<p>	* Được đọc toàn bộ những bài viết, bài giảng vể kinh doanh Spa trong tất cả các vấn đề như nhân sự, marketing, quản lý, đào tạo...
			Đây là những bài học được rút ra từ kinh nghiệm kinh doanh và quản lý Spa trong 10 năm qua.</p>
			<p>	* Được Admin hỗ trợ tư vấn qua điện thoại các vấn đề về kinh doanh, đối tác, phần mềm quản lý Spa. Kể cả trường hợp chưa mở hoặc đang kinh doanh Spa.</p>
			<p>	* Có thể yêu cầu gặp trực tiếp Admin tại Hà Nội 1 tháng/lần/3 tiếng</p>
			<p>	* Có thể yêu cầu Admin về cơ sở của mình để tư vấn (sẽ tính công tác phí)</p>
			<p>	* Tham gia các buổi off các chủ Spa do Admin tổ chức.</p>
			<p>	* Phí thành viên: 4.990.000 đồng/năm</p>
		</p>
	</div>
    <h2 class="product-category">Đăng ký Xem Website</h2>
    <div class="sc-ck-info">
        <div class="row">
            <div class="col-xs-6 billing">
                <h3 class="sc-billing-text">Thông Tin Đăng Nhập</h3>
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
						<div class="errorMessage" id="Users_email_em_" style=""><?php if($error_email): ?><?php echo $error_email ?> <?php endif; ?></div>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($billing, 'phone', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
                        <?php echo $form->textField($billing, 'phone', array('class' => 'form-control', 'style' => 'width: 100%;')); ?>
                        <?php echo $form->error($billing, 'phone'); ?>
                    </div>
                </div>
                
            </div>
        
        </div>
    </div>
	<div class="row ps">
        <div class="col-xs-6 payment">
            <h3 class="sr-method-text">Hình thức thanh toán</h3>
			 <div class="radio pm_parent">
				<label><input type="radio" name="Orders[payment_method]" value="1" checked>
				Chuyển Khoản Ngân Hàng</label>
			</div>                                       
             <div class="errorMessage" id="Orders_payment_method_em_" style="display:none"></div> 
		</div>        
    </div>
    
    <div class="sc">
        <div class="accordion-inner">
            <?php
            $this->renderPartial('chuspa', array(
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
            <?php echo CHtml::submitButton(Yii::t('shoppingcart', 'Xác Nhận Và Gửi Đăng Ký'), array('class' => 'btn btn-sm btn-primary pull-right', 'id' => 'submitcheckout','onsubmit'=>'submitF();')); ?>
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