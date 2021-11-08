
<div class="mod-layout container">
    <h2 class="mod-layout-title">Quên mật khẩu?</h2>
    <div class="mod-layout-main">
        <h3 class="mod-layout-subtitle" >Vui lòng nhập tài khoản bạn muốn lấy lại mật khẩu.</h3>
         <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'forgot-form',
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
        ));
        ?>
        <div class="forgot" >
            <div class="forgot-form">
                <div class="mod-input mod-input-loginName">
                    <label>Số điện thoại đăng nhập:</label>
                    <input name="ForgotForm[phone]" type="text" id="phone_forgot" 
                     placeholder="Vui lòng nhập số điện thoại" 
                     value="" /> <?php echo $form->error($model, 'phone'); ?>
					 <br>
					  <br>
					
					<label>Email nhận mật khẩu mới:</label>				 
					 <input name="ForgotForm[email]" type="text" id="email_forgot" 
                     placeholder="Vui lòng nhập email nhận mật khẩu mới" 
                     value="" />
                     
                </div>
            </div>
            <?php echo $form->error($model, 'email'); ?>
          
            <div class="forgot-action">
				<?php echo CHtml::submitButton(Yii::t('ForgotForm', 'GỬI'), array('class' => 'next-btn next-btn-primary next-btn-large',)); ?>

            </div>
        </div>
     <?php $this->endWidget(); ?>
    </div>
</div>