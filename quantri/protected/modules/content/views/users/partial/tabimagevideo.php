	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'bank_id', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<div class="controls col-sm-10">
			<?php echo $form->textField($model, 'bank_id', array('class' => 'span12 col-sm-12')); ?>
			<?php echo $form->error($model, 'bank_id'); ?>	
		</div>
	</div>
	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'bank_name', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<div class="controls col-sm-10">
			<?php echo $form->textField($model, 'bank_name', array('class' => 'span12 col-sm-12')); ?>
			<?php echo $form->error($model, 'bank_name'); ?>	
		</div>
	</div>
	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'bank_branch', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<div class="controls col-sm-10">
			<?php echo $form->textField($model, 'bank_branch', array('class' => 'span12 col-sm-12')); ?>
			<?php echo $form->error($model, 'bank_branch'); ?>	
		</div>
	</div>
	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'Số Zocoin Tích Lũy', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<div class="controls col-sm-10">
			<?php echo $form->textField($model, 'zocoin', array('class' => 'span12 col-sm-12','disabled'=>'true')); ?>
		</div>
	</div>
	
	
	
	