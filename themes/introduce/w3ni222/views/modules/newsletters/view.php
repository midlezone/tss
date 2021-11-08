<?php if ($show_widget_title) { ?>
    <div class="title-bt">
        <span><?php echo $widget_title ?></span>
    </div>
<?php } ?>
<div class="newsletters">
    <?php if ($helptext) { ?>
        <p class="newsletters-text"><?php echo $helptext; ?></p>
    <?php } ?>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'newsletter-form',
        'action' => Yii::app()->createUrl('site/site/receivenewsletter'),
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'htmlOptions' => array('class' => 'form-horizontal newsletter-form'),
    ));
    ?>
    <div class="form-group no-margin-left no-margin-right name">
        <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('name'), 'title' => $model->getAttributeLabel('name'))); ?>
        <div>
            <?php echo $form->error($model, 'name'); ?>
        </div>
    </div>       
    <div class="form-group no-margin-left no-margin-right">
        <div class="input-group email">
            <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('email'), 'title' => $model->getAttributeLabel('email'))); ?>
            <?php echo CHtml::submitButton(Yii::t('common', 'signup'), array('class' => 'btn btn-sm', 'id' => 'newslettersubmit', 'style' => '')); ?>
        </div>
        <div>
            <?php echo $form->error($model, 'email'); ?>
        </div>
    </div> 
    <div class="newsletters-message" style="display: none;"></div>
    <?php $this->endWidget(); ?>
</div>
