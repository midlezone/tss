
<script type="text/javascript">
    jQuery(document).on('change', '#Users_province_id', function() {
        jQuery.ajax({
            url: '<?php echo Yii::app()->createUrl('/suggest/suggest/getdistrict') ?>',
            data: 'pid=' + jQuery('#Users_province_id').val(),
            dataType: 'JSON',
            beforeSend: function() {
                w3ShowLoading(jQuery('#Users_province_id'), 'right', 20, 0);
            },
            success: function(res) {
                if (res.code == 200) {
                    jQuery('#Users_district_id').html(res.html);
                }
                w3HideLoading();
            },
            error: function() {
                w3HideLoading();
            }
        });
    });
</script>



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
											<?php echo $form->labelEx($model, 'email', array('class' => 'col-sm-3 control-label ')); ?>
											<div class="controls col-sm-9">
												<?php echo $form->textField($model, 'email', array('class' => 'span9 form-control')); ?>
												<?php echo $form->error($model, 'email'); ?>
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
											<?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-3 control-label ')); ?>
											<div class="controls col-sm-9">
												<?php echo $form->textField($model, 'name', array('class' => 'span9 form-control')); ?>
												<?php echo $form->error($model, 'name'); ?>
											</div>
										</div>
										<div class ="regis control-group form-group" style="margin-top: 5px;">
											<?php echo $form->labelEx($model, 'sex', array('class' => 'col-sm-3 control-label ')); ?>
											<div class ="sex-res controls col-sm-9">
												<?php
												echo $form->dropDownList($model, 'sex', ClaUser::getListSexArr(), array('class' => 'span9 form-control',));
												?>
											</div>
										</div>
										<div class="regis control-group form-group">
											<?php echo $form->labelEx($model, 'phone', array('class' => 'col-sm-3 control-label ')); ?>
											<div class="controls col-sm-9">
												<?php echo $form->textField($model, 'phone', array('class' => 'span9 form-control')); ?>
												<?php echo $form->error($model, 'phone'); ?>
											</div>
										</div>
										<div class="regis control-group form-group">
											<?php echo $form->labelEx($model, 'address', array('class' => 'col-sm-3 control-label ')); ?>
											<div class="controls col-sm-9">
												<?php echo $form->textField($model, 'address', array('class' => 'span9 form-control')); ?>
												<?php echo $form->error($model, 'address'); ?>
											</div>
										</div>
										<div class ="regis control-group form-group" style="margin-top: 5px;">
											<?php echo $form->labelEx($model, 'province_id', array('class' => 'col-sm-3 control-label ')); ?>
											<div class="controls col-sm-9">
												<?php
												echo $form->dropDownList($model, 'province_id', $listprivince, array('class' => 'span9 form-control',));
												?>
												<?php echo $form->error($model, 'province_id'); ?>
											</div>
										</div> 
										<div class ="regis control-group form-group" style="margin-top: 5px;">
											<?php echo $form->labelEx($model, 'district_id', array('class' => 'col-sm-3 control-label ')); ?>
											<div class="controls col-sm-9">
												<?php
												echo $form->dropDownList($model, 'district_id', $listdistrict, array('class' => 'span9 form-control',));
												?>
												<?php echo $form->error($model, 'district_id'); ?>
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

