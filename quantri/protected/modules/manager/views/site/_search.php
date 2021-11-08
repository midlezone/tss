<div class="form-search">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
        'htmlOptions' => array(
            'class' => "form-inline",
        ),
    ));
    ?>

    <?php echo $form->textField($model, 'site_id', array('class' => '', 'placeholder' => $model->getAttributeLabel('site_id'))); ?>
    <?php echo $form->textField($model, 'site_title', array('class' => '', 'placeholder' => $model->getAttributeLabel('site_title'))); ?>
    <?php echo $form->dropDownList($model, 'site_type', array(''=>Yii::t('common','all'))+ClaSite::getSiteTypes(), array('class' => '')); ?>
    <?php echo CHtml::submitButton(Yii::t('common', 'common_search'), array('class' => 'btn btn-sm')); ?>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->