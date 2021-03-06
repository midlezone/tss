	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'identity_card', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<div class="controls col-sm-10">
			<?php echo $form->textField($model, 'identity_card', array('class' => 'span12 col-sm-12')); ?>
			<?php echo $form->error($model, 'identity_card'); ?>	
		</div>
	</div>
	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'created_identity_card', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<div class="controls col-sm-10">
			<input class="span12 col-sm-12" name="Users[created_identity_card]" id="Users_created_identity_card" type="text" value="<?php echo date('d-m-Y', $model->created_identity_card) ?>">
			<?php echo $form->error($model, 'created_identity_card'); ?>	
		</div>
	</div>
	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'address_identity_card', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<div class="controls col-sm-10">
			<?php echo $form->textField($model, 'address_identity_card', array('class' => 'span12 col-sm-12')); ?>
			<?php echo $form->error($model, 'address_identity_card'); ?>	
		</div>
	</div>
	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'front_identity_card', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<?php  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?>		
		<img style="margin-left: 12px;"  src="<?php echo $actual_link ?>/mediacenter/media/files/1145/avatar/442_1538117903_3885badd10f2823e.jpg">
	</div>
	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'back_identity_card', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<img style="margin-left: 12px;" src="<?php echo $actual_link ?>/mediacenter/media/files/1145/avatar/442_1538117903_3885badd10f2823e.jpg">
	</div>
	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'X??c Th???c Email', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<div class="controls col-sm-10">
			<?php if($model->verified_email == 0): ?>
				<input class="span12 col-sm-12" name="Users[verified_email]" id="Users_verified_email" type="text" value="Ch??a X??c Th???c" disabled>
			<?php else: ?>
				<input class="span12 col-sm-12" name="Users[verified_email]" id="Users_verified_email" type="text" value="???? X??c Th???c" disabled>
			<?php endif; ?>
		</div>
	</div>
	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'M?? gi???i thi???u', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<div class="controls col-sm-10">
			<?php echo $form->textField($model, 'token', array('class' => 'span12 col-sm-12')); ?>
			<?php echo $form->error($model, 'token'); ?>	
		</div>
	</div>
	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'Link gi???i thi???u', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<div class="controls col-sm-10">
			<?php echo $form->textField($model, 'link_introduce', array('class' => 'span12 col-sm-12')); ?>
			<?php echo $form->error($model, 'link_introduce'); ?>	
		</div>
	</div>
	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'Ng?????i gi???i thi???u', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<div class="controls col-sm-10">
			<?php echo $form->textField($model, 'zoda_granted', array('class' => 'span12 col-sm-12','disabled'=>'true')); ?>
		</div>
	</div>
 