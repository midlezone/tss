<!--<h2 class="join-list"><i>Join the Laundry List</i></h2>
<div class="searchbox">
    <form class="form-horizontal clearfix">
        <input class="form-control" placeholder="Email" title="Email" name="Newsletters[email]" id="Newsletters_email" type="text" maxlength="100" value="">
        <input class="btn btn-default" type="submit" value="GO">
    </form>
</div>-->

<?php if ($show_widget_title) { ?>
    <h2 class="join-list">
        <i><?php echo $widget_title ?></i>
    </h2>
<?php } ?>
<div class="newsletters">
    <div class="join-list-desc"><?php echo $helptext; ?></div>
    <div class="searchbox">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'newsletter-form',
            'action' => Yii::app()->createUrl('site/site/receivenewsletter'),
            'enableAjaxValidation' => false,
            'enableClientValidation' => false,
            'htmlOptions' => array('class' => 'form-horizontal clearfix'),
        ));
        ?>
        <?php echo $form->hiddenField($model, 'name', array('class' => 'form-control custom-form', 'placeholder' => $model->getAttributeLabel('name'), 'value' => 'Guest')); ?>
        <?php echo $form->textField($model, 'email', array('id' => 'Newsletters_email', 'class' => 'form-control custom-form input-email', 'placeholder' => $model->getAttributeLabel('email'), 'title' => $model->getAttributeLabel('email'))); ?>

        <?php echo CHtml::submitButton(Yii::t('common', 'signup'), array('class' => 'btn btn-default', 'id' => 'newslettersubmit', 'value' => 'go')); ?>
        <?php echo $form->error($model, 'email'); ?>
        <?php $this->endWidget(); ?>

    </div>
</div>


