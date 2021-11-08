
<div class="widget widget-box">
    <div class="widget-header"><h4><?php echo Yii::t('common','create'); ?></h4></div>
    <div class="widget-body no-padding">
        <div class="widget-main">
            <div class="row">
				<div class="col-xs-12 no-padding">
					<?php
					$form = $this->beginWidget('CActiveForm', array(
						'id' => 'orders-form',
						'enableAjaxValidation' => false,
						'enableClientValidation' => true,
						'htmlOptions' => array('class' => 'form-horizontal widget-form'),
							));
					?>
						
						<div class="control-group form-group">
							<?php echo $form->labelEx($model, 'Tên Sản Phẩm', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textField($model, 'product_name', array('class' => 'span12 col-sm-12')); ?>
								<?php echo $form->error($model, 'product_name'); ?>
							</div>					
						</div>
						<div class="control-group form-group">
							<?php echo $form->labelEx($model, 'IMEI', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textField($model, 'imei', array('class' => 'span12 col-sm-12')); ?>
								<?php echo $form->error($model, 'imei'); ?>
							</div>					
						</div>
						
						<div class="control-group form-group">
							<?php echo $form->labelEx($model, 'Giá Sản Phẩm', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textField($model, 'product_price', array('class' => 'numberFormat span12 col-sm-12')); ?>
								<?php echo $form->error($model, 'product_price'); ?>
							</div>					
						</div>
						<div class="control-group form-group">
							<?php echo $form->labelEx($model, 'Ngày Mua Máy', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textField($model, 'created_time1', array('class' => 'span12 col-sm-12')); ?>
								<?php echo $form->error($model, 'created_time1'); ?>
							</div>					
						</div>
						
						<div class="control-group form-group">
							<?php echo $form->labelEx($model, 'billing_name', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textField($model, 'billing_name', array('class' => 'span12 col-sm-12')); ?>
								<?php echo $form->error($model, 'billing_name'); ?>
							</div>					
						</div>
						<div class="control-group form-group">
							<?php echo $form->labelEx($model, 'billing_email', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textField($model, 'billing_email', array('class' => 'span12 col-sm-12')); ?>
								<?php echo $form->error($model, 'billing_email'); ?>
							</div>					
						</div>
						
						<div class="control-group form-group">
							<?php echo $form->labelEx($model, 'billing_phone', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textField($model, 'billing_phone', array('class' => 'span12 col-sm-12')); ?>
								<?php echo $form->error($model, 'billing_phone'); ?>
							</div>					
						</div>
						
						<div class="control-group form-group">
							<?php echo $form->labelEx($model, 'billing_address', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textField($model, 'billing_address', array('class' => 'span12 col-sm-12')); ?>
								<?php echo $form->error($model, 'billing_address'); ?>
							</div>					
						</div>
						
						<div class="control-group form-group">
							<?php echo $form->labelEx($model, 'billing_city', array('class' => 'col-sm-2 control-label no-padding-left')); ?>           		
							 <div class="controls col-sm-10">
										<?php echo $form->dropDownList($model, 'billing_city', LibProvinces::getListProvinceArr(), array('class' => 'form-control')); ?>
										<?php echo $form->error($model, 'billing_city'); ?>
							  </div>			
						</div>		
						
						<div class="control-group form-group">
							<?php echo $form->labelEx($model, 'Hình Thức Thanh Toán', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textArea($model, 'payment_method', array('class' => 'span12 col-sm-12')); ?>
							</div>					
						</div>
						
						
						<div class="control-group form-group">
							<?php echo $form->labelEx($model, 'Ghi Chú', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textArea($model, 'note', array('class' => 'span12 col-sm-12')); ?>
								<?php echo $form->error($model, 'note'); ?>
							</div>					
						</div>
						
						

					<div class="control-group form-group buttons">
					  <?php echo CHtml::submitButton(Yii::t('common', 'update'), array('class' => 'btn btn-sm btn-primary','style'=>'margin-left:20px;')); ?>

					</div>

					<?php $this->endWidget(); ?>

				</div><!-- form -->
			</div>

        </div>
    </div>
</div>