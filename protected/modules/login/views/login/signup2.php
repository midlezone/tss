
<div class="clearfix layout container">
    
    <div id="contentCol">   
        <div id="centerCol">
            <div class="centerContent">
					 <?php
						$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
						?>
						<div class="wrep">
							<div class="regis-title" id="pageTitle2">
									<div id="title" style="padding-top: 5px; text-transform: uppercase;"><?php echo Yii::t('user', 'user_signup_title'); ?></div>
							</div>
							<div class="form-regis"  style="padding-top: 10px;">
								<div class="regis register">
									<div class="form">
										<?php
										$form = $this->beginWidget('CActiveForm', array(
											'id' => 'user-form',
											'enableAjaxValidation' => false,
											'enableClientValidation' => true,
											'htmlOptions' => array(
												'class' => 'form-horizontal',
											),
										));
										?>
																		
										<div class="regis control-group form-group">
											<?php echo $form->labelEx($model, 'phone', array('class' => 'col-sm-3 control-label ')); ?>
											<div class="controls col-sm-9">
												<?php echo $form->textField($model, 'phone', array('class' => 'span9 form-control')); ?>
												<?php echo $form->error($model, 'phone'); ?>
											</div>
										</div>
										
										<div class ="regis control-group form-group">
											<?php echo $form->labelEx($model, 'password', array('class' => 'col-sm-3 control-label ')); ?>
											<div class="controls col-sm-9">
												<?php echo $form->passwordField($model, 'password', array('class' => 'span9 form-control')); ?>
												<?php echo $form->error($model, 'password'); ?>
											</div>
										</div>
										<div class ="regis control-group form-group">
											<?php echo $form->labelEx($model, 'passwordConfirm', array('class' => 'col-sm-3 control-label ')); ?>
											<div class="controls col-sm-9">
												<?php echo $form->passwordField($model, 'passwordConfirm', array('class' => 'span9 form-control')); ?>
												<?php echo $form->error($model, 'passwordConfirm'); ?>
											</div>
										</div>
										<div class="regis control-group form-group">
											<?php echo $form->labelEx($model, 'email', array('class' => 'col-sm-3 control-label ')); ?>
											<div class="controls col-sm-9">
												<?php echo $form->textField($model, 'email', array('class' => 'span9 form-control')); ?>
												<?php echo $form->error($model, 'email'); ?>
											</div>
										</div>
									
										 <div class="regis control-group form-group">
											<?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-3 control-label ')); ?>
											<div class="controls col-sm-9">
												<?php echo $form->textField($model, 'name', array('class' => 'span9 form-control')); ?>
												<?php echo $form->error($model, 'name'); ?>
											</div>
										</div>
										<div class="form-group" style="padding-top: 10px;">
											<div class="col-sm-offset-3 col-sm-9">
												<?php echo CHtml::submitButton(Yii::t('common', 'signup'), array('tabindex' => 10, 'class' => 'regis btn btn-primary',)); ?>
											</div>
										</div>
										<?php $this->endWidget(); ?>
									</div>
								</div>
							</div>	
						
															
						</div>
               
            </div>
        </div>
    </div>
</div>

