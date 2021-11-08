<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ckeditor/ckeditor.js') ?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        CKEDITOR.replace("Promotions_description", {
            height: 200,
            language: '<?php echo Yii::app()->language ?>'
        });
    });
</script>
<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Mã giảm giá', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'name', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>
</div>

<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Mức ưu đãi', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <select class="span12 col-sm-12" name="Promotions[sortdesc]" id="Product_sortdesc">
			<option value="0">0%</option>
			<option value="5">5%</option>
			<option value="10">10%</option>
			<option value="15">15%</option>
			<option value="20">20%</option>
			<option value="25">25%</option>
			<option value="30">30%</option>
			<option value="35">35%</option>
			<option value="40">40%</option>
		</select>
        <?php echo $form->error($model, 'sortdesc'); ?>
    </div>
	
</div>
<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Áp dụng cho Vip', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->checkBox($model, 'showinhome'); ?>
    </div>
</div>

<div class="form-group no-margin-left ">
    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('product', 'Tạo Mã') : Yii::t('product', 'Cập Nhật Mã'),
	array('class' => 'btn btn-primary', 'id' => 'btnAddCate')); ?>
</div>