	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<div class="controls col-sm-10">
			<?php echo $form->textField($model, 'name', array('class' => 'span12 col-sm-12')); ?>
			<?php echo $form->error($model, 'name'); ?>	
		</div>
	</div>
	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'phone', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<div class="controls col-sm-10">
			<?php echo $form->textField($model, 'phone', array('class' => 'span12 col-sm-12')); ?>
			<?php echo $form->error($model, 'phone'); ?>
		</div>
	</div>
	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'email', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<div class="controls col-sm-10">
			<?php echo $form->textField($model, 'email', array('class' => 'span12 col-sm-12')); ?>
			<?php echo $form->error($model, 'email'); ?>
		</div>
	</div>
 
	
	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'sex', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
			<div class="controls col-sm-10">
				<input type="radio" value="1" name="gender" id="male" checked="<?php if ($model->sex == 1): ?> check <?php endif; ?>">
				<label for="male">Nam</label>
				<input type="radio" value="0" name="gender" id="female" checked="<?php if ($model->sex == 0): ?> check <?php endif; ?>">
				<label for="female">Nữ</label>
			</div>
	</div>

	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'birthday', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<div class="controls col-sm-10">
			<?php echo $form->textField($model, 'birthday', array('class' => 'span12 col-sm-12')); ?>
			<?php echo $form->error($model, 'birthday'); ?>
		</div>
	</div>
	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'district_id', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<div class="controls col-sm-10">
			<input class="span12 col-sm-12" name="Users[province_id]" id="Users_province_id" type="text" maxlength="200" value="<?php echo $district_id['type'] ?> <?php echo $district_id['name'] ?>" >
			<div class="errorMessage" id="Users_province_id_em_" style="display:none"></div>		
		</div>
	</div>
		<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'province_id', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<div class="controls col-sm-10">
			<input class="span12 col-sm-12" name="Users[province_id]" id="Users_province_id" type="text" maxlength="200" value="<?php echo $province_id['type'] ?> <?php echo $province_id['name'] ?>" >
			<div class="errorMessage" id="Users_province_id_em_" style="display:none"></div>		
		</div>
	</div>
	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'Hạng Thành Viên', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
			<select class="" name="Users[zocoin]" id="zocoin" >
				<option value="">Level</option>
				<option <?php if ($model->zocoin == 'Hội viên' ) echo 'selected' ; ?> value="Hội viên">Hội viên</option>
				<option <?php if ($model->zocoin == 'Silver' ) echo 'selected' ; ?> value="Silver">Silver</option>
				<option <?php if ($model->zocoin == 'Gold' ) echo 'selected' ; ?> value="Gold">Gold</option>
				<option <?php if ($model->zocoin == 'Platinum' ) echo 'selected' ; ?> value="Platinum">Platinum</option>
				<option <?php if ($model->zocoin == 'Diamond' ) echo 'selected' ; ?> value="Diamond">Diamond</option>
				<option <?php if ($model->zocoin == 'Fan Cứng' ) echo 'selected' ; ?> value="Fan Cứng">Fan Cứng</option>
			</select>
	</div>
	<div class="control-group form-group">
		<?php echo $form->labelEx($model, 'Điểm Tích Lũy', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
		<div class="controls col-sm-10">
			<?php echo $form->textField($model, 'zoda_granted', array('class' => 'span12 col-sm-12')); ?>
			<?php echo $form->error($model, 'zoda_granted'); ?>
		</div>
	</div>