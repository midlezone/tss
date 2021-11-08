<div class="widget widget-box">
    <div class="widget-header"><span class="title"><?php echo Yii::t('user', 'change_password'); ?></span></div>
    <div class="widget-body no-padding">
        <div class="widget-main">
            <div class="row">
    <div class="col-xs-12 no-padding">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'pass-change',
            'htmlOptions' => array('class' => 'form-horizontal'),
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
        ));
        ?>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'current_password', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->passwordField($model, 'current_password', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'current_password'); ?>
            </div>
        </div>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'new_password', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->passwordField($model, 'new_password', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'new_password'); ?>
            </div>
        </div>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'confirm_password', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->passwordField($model, 'confirm_password', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'confirm_password'); ?>
            </div>
        </div>

        <div class="control-group form-group buttons">
            <?php echo CHtml::submitButton(Yii::t('user', 'save_password'), array('class' => 'btn btn-info', 'id' => 'savepass')); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>
        </div>
    </div>
</div>