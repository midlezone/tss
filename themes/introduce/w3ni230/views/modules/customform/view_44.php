<div class="col-sm-4">
    <div class="Course-Registration1 contactinhome">
        <div class="header-popup clearfix"> 
            <h3>Order Ship</h3>
        </div>
        <div class="cont">
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
            foreach ($fields as $field) {
                Yii::app()->controller->renderPartial('//modules/customform/type_' . $field['field_type'], array('field' => $field, 'model' => $model, 'form' => $form, 'labelClass' => $labelClass,));
            }
            ?>
            <?php
            $this->endWidget();
            ?>
        </div>
    </div>
</div>
