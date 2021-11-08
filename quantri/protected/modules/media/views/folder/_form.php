<div class="row">
    <div class="col-xs-12 no-padding">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'folders-form',
            'htmlOptions' => array('class' => 'form-horizontal','enctype' => 'multipart/form-data'),
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
        ));
        ?>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'folder_name', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'folder_name', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'folder_name'); ?>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'folder_description', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textArea($model, 'folder_description', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'folder_description'); ?>
            </div>
        </div>

        <div class="control-group form-group buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('file', 'folder_create') : Yii::t('file', 'folder_edit'), array('class' => 'btn btn-info', 'id' => 'savenews')); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>