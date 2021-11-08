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
    <?php echo $form->textField($model, 'order_id', array('class' => '', 'placeholder' => $model->getAttributeLabel('order_id'))); ?>
     <label><?php echo $model->getAttributeLabel('order_status');  ?> : </label>
    <?php echo $form->dropDownList($model, 'order_status', Orders::getStatusArr()); ?>
    <?php echo CHtml::submitButton(Yii::t('common', 'common_search'), array('class' => 'btn btn-sm')); ?>
    <?php $this->endWidget(); ?>

</div><!-- search-form -->