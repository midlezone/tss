<?php if ($show_widget_title) { ?>
    <div class="title-bt">
        <span>
            <?php echo $widget_title ?>
        </span>
    </div>
<?php } ?>
<div class="newsletters">
    <p class="newsletters-text"><?php echo $helptext; ?></p>
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
        <div class="input-group email1">
            <?php echo $form->textField($model, 'email', array('id'=>'Newsletters_email','class' => 'form-control', 'placeholder' => $model->getAttributeLabel('email'), 'title' => $model->getAttributeLabel('email'))); ?>
            <span class="input-group-addon" style="font-size: 14px;">
                <?php echo CHtml::submitButton(Yii::t('common', 'signup'), array('class' => 'btn btn-sm', 'id' => 'newslettersubmit', 'style' => 'padding:0; color:#fff; border-radius: 0px;  display: block;')); ?>
            </span> 
        </div>
        <div>
            <?php echo $form->error($model, 'email'); ?>
        </div>
    </div>
    <?php $this->endWidget(); ?>
    </div>

    
