<div class="row">
    <div class="col-xs-12 no-padding">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'banner-groups-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
        ));
        ?>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'banner_group_name', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'banner_group_name', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'banner_group_name'); ?>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'banner_group_description', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textArea($model, 'banner_group_description', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'banner_group_description'); ?>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'group_size', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <div class ="col-sm-6" style="padding-right: 20px; padding-left: 0px;">
                    <?php echo $form->textField($model, 'width', array('placeholder' => $model->getAttributeLabel('width'), 'class' => 'col-sm-12')); ?>
                </div>
                <?php echo $form->textField($model, 'height', array('placeholder' => $model->getAttributeLabel('height'), 'class' => 'span12 col-sm-6')); ?>
                <?php echo $form->error($model, 'groupsize'); ?>
            </div>
        </div>

        <div class="control-group form-group buttons" style="border-bottom: none;">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('banner', 'banner_group_create') : Yii::t('banner', 'banner_group_edit'), array('class' => 'btn btn-info', 'id' => 'savebanner')); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->