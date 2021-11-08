
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
							<?php echo $form->labelEx($order, 'Tên Sản Phẩm', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textField($order, 'product_name', array('class' => 'span12 col-sm-12')); ?>
								<?php echo $form->error($order, 'product_name'); ?>
							</div>					
						</div>
						<div class="control-group form-group">
							<?php echo $form->labelEx($order, 'IMEI', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textField($order, 'imei', array('class' => 'span12 col-sm-12')); ?>
								<?php echo $form->error($order, 'imei'); ?>
							</div>					
						</div>
						
						<div class="control-group form-group">
							<?php echo $form->labelEx($order, 'Giá Sản Phẩm', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textField($order, 'product_price', array('class' => 'numberFormat span12 col-sm-12')); ?>
								<?php echo $form->error($order, 'product_price'); ?>
							</div>					
						</div>
						<div class="control-group form-group">
							<?php echo $form->labelEx($order, 'Ngày Mua Máy', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textField($order, 'created_time1', array('class' => 'span12 col-sm-12')); ?>
								<?php echo $form->error($order, 'created_time1'); ?>
							</div>					
						</div>
						
						<div class="control-group form-group">
							<?php echo $form->labelEx($billing, 'name', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textField($billing, 'name', array('class' => 'span12 col-sm-12')); ?>
								<?php echo $form->error($billing, 'name'); ?>
							</div>					
						</div>
						<div class="control-group form-group">
							<?php echo $form->labelEx($billing, 'email', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textField($billing, 'email', array('class' => 'span12 col-sm-12')); ?>
								<?php echo $form->error($billing, 'email'); ?>
							</div>					
						</div>
						
						<div class="control-group form-group">
							<?php echo $form->labelEx($billing, 'phone', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textField($billing, 'phone', array('class' => 'span12 col-sm-12')); ?>
								<?php echo $form->error($billing, 'phone'); ?>
							</div>					
						</div>
						
						<div class="control-group form-group">
							<?php echo $form->labelEx($billing, 'address', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textField($billing, 'address', array('class' => 'span12 col-sm-12')); ?>
								<?php echo $form->error($billing, 'address'); ?>
							</div>					
						</div>
						
						<div class="control-group form-group">
							<?php echo $form->labelEx($billing, 'city', array('class' => 'col-sm-2 control-label no-padding-left')); ?>           		
							 <div class="controls col-sm-10">
										<?php echo $form->dropDownList($billing, 'city', LibProvinces::getListProvinceArr(), array('class' => 'form-control')); ?>
										<?php echo $form->error($billing, 'city'); ?>
							  </div>			
						</div>		
						
						<div class="control-group form-group">
							<?php echo $form->labelEx($order, 'Hình Thức Thanh Toán', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textArea($order, 'payment_method', array('class' => 'span12 col-sm-12')); ?>
							</div>					
						</div>
						
						
						<div class="control-group form-group">
							<?php echo $form->labelEx($order, 'Ghi Chú', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
							<div class="controls col-sm-10">
								<?php echo $form->textArea($order, 'note', array('class' => 'span12 col-sm-12')); ?>
								<?php echo $form->error($order, 'note'); ?>
							</div>					
						</div>
						
						

					<div class="control-group form-group buttons">
						<?php echo CHtml::submitButton(Yii::t('common', 'create'), array('class' => 'btn btn-sm btn-primary')); ?>
					</div>

					<?php $this->endWidget(); ?>

				</div><!-- form -->
			</div>

        </div>
    </div>
</div>