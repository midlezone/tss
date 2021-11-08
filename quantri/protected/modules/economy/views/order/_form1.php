<div class="row">
    <div class="col-xs-12 no-padding">
        <?php
		$form = $this->beginWidget('CActiveForm', array(
			'id' => 'sc-checkout-form',
			'enableAjaxValidation' => false,
			'enableClientValidation' => true,
			'htmlOptions' => array('class' => 'form-horizontal widget-form'),
				));
		?>
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

        <div class="control-group form-group buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('common', 'create') : Yii::t('common', 'update'), array('class' => 'btn btn-info', 'id' => 'savenews')); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>
