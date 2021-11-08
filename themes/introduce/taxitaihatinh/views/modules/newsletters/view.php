<?php if ($show_widget_title) { ?>
	<div class="title-m title_sp">
						<h2>
							<a title="Về chúng tôi" href="">
								<?php echo $widget_title ?></a>
						</h2>
		</div>
<?php } ?>
<div class="cont">
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
                <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('email'), 'title' => $model->getAttributeLabel('email'))); ?>
            <div>
                <?php echo $form->error($model, 'email'); ?>
            </div>
            <?php echo CHtml::submitButton(Yii::t('common', 'signup'), array('class' => 'btn btn-sm', 'id' => 'newslettersubmit')); ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>
