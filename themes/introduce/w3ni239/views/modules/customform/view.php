<?php

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'w3n-submit-form',
    'action' => Yii::app()->createUrl('site/form/submit', array('id' => $form_id)),
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
        'class' => 'form-horizontal w3f-form',
        'role' => 'form'
    ),
        ));
?>
<?php

foreach ($fields as $field)
//    if ($field['field_type'] != 'date') {
        Yii::app()->controller->renderPartial('//modules/customform/view/type_' . $field['field_type'], array('field' => $field, 'model' => $model, 'form' => $form, 'labelClass' => $labelClass,));
//    }
$this->endWidget();
?>