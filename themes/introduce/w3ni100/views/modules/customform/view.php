<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'w3n-submit-form',
    'action' => Yii::app()->createUrl('site/form/submit', array('id' => $form_id)),
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'htmlOptions' => array('class' => 'w3f-form'),
        ));
?>
<table border="0" cellspacing="5" cellpadding="5">
    <?php
    foreach ($fields as $field)
        $this->render($this->basepath . '.fieldtype.type_' . $field['field_type'], array('field' => $field, 'model' => $model, 'form' => $form));
    ?>
</table>
<?php
$this->endWidget();
?>
