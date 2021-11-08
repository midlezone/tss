

<div class="clearfix layout layout-2 container">
    <div id="leftCol">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT)); ?>
    </div>
    <div id="contentCol">
   
        <div id="centerCol">
            <div class="centerContent">
					 <?php
						$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
						?>
						<div class="wrep">
							<div id="pageTitle2">
									<div id="title" style="padding-top: 5px; text-transform: uppercase;"><?php echo Yii::t('common', 'login'); ?></div>
							</div>
								
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
									<?php echo $form->labelEx($model, 'Số Điện Thoại', array('class' => 'col-sm-3 control-label ')); ?>
									<div class="controls col-sm-9">
										<?php echo $form->textField($model, 'username', array('class' => 'span9 form-control')); ?>
										<?php echo $form->error($model, 'username'); ?>
									</div>
								</div>
								<div class ="regis control-group form-group">
									<?php echo $form->labelEx($model, 'password', array('class' => 'col-sm-3 control-label ')); ?>
									<div class="controls col-sm-9">
										<?php echo $form->passwordField($model, 'password', array('class' => 'span9 form-control')); ?>
										<?php echo $form->error($model, 'password'); ?>
									</div>
								</div>
								<div class="mod-login-forgot"><a href="login/login/Forgotpassword">Quên Mật Khẩu?</a></div>
								<div class="form-group" style="padding-top: 10px;">
									<div class=" col-sm-9" >
										<?php echo CHtml::submitButton(Yii::t('common', 'login'), array('tabindex' => 10, 'class' => 'join fivetips-joinlink',)); ?>
									
			 
									</div>
								</div>
								<?php $this->endWidget(); ?>
							</div>
															
						</div>
               
            </div>
        </div>
    </div>
</div>

