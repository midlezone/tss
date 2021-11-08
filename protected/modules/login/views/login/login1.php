

<div class="container">
    <div class="clearfix layout layout-2" style="margin-top: 20px;">
      
        <div  class="lh">
            <div id="centerCol">
					<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
					<div class="centerContent">
							<ul class="breadcrumb">
									<li><a href="#" title="Bạn Cần Đăng Nhập Để Xem Sản Phẩm Của Công Ty">YOU NEED TO LOGIN TO VIEW PRODUCT OF COMPANY</a></li>
							</ul>
								
							<div class="form-login"  style="padding-top: 10px;">
								<?php
								$form = $this->beginWidget('CActiveForm', array(
									'id' => 'login-form',
									'htmlOptions' => array(
										'class' => 'form-horizontal',
									),
									'enableClientValidation' => true,
									'enableAjaxValidation' => false,
								));
								?>
								<div class="regis control-group form-group">
									<?php echo $form->labelEx($model, 'Username / Email *', array('class' => 'col-sm-3 control-label ')); ?>
									<div class="controls col-sm-9">
										<?php echo $form->textField($model, 'username', array('class' => 'span9 form-control')); ?>
										<?php echo $form->error($model, 'username'); ?>
									</div>
								</div>
								<div class ="regis control-group form-group">
									<?php echo $form->labelEx($model, 'Password *', array('class' => 'col-sm-3 control-label ')); ?>
									<div class="controls col-sm-9">
										<?php echo $form->passwordField($model, 'password', array('class' => 'span9 form-control')); ?>
										<?php echo $form->error($model, 'password'); ?>
									</div>
								</div>
								<div class="form-group" style="padding-top: 10px;">
									<div class="col-sm-offset-3 col-sm-9">
										<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input tabindex="10" class="btn btn-primary" type="submit" name="yt0" value="Login"></font></font>
									</div>
								</div>
								<?php $this->endWidget(); ?>
							</div>
					</div>
					
							
															
			</div>
        </div>
    </div>
</div>
