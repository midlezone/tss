<div class="bottom-center-main-right">
    <div class="Course-Registration">
        <?php if ($show_widget_title) { ?>
            <?php $themUrl = Yii::app()->theme->baseUrl; ?>
            <div class="header-popup clearfix"> 
                <i class="icon-popup"></i>
                <div class="title-popup">
                    <a title="#" href="#"> <img alt="#" src="<?php echo $themUrl ?>/css/img/but.png"><?php echo $widget_title; ?></a>
                </div>
            </div>
        <?php } ?>
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
            foreach ($fields as $field)
                Yii::app()->controller->renderPartial('//modules/customform/type_' . $field['field_type'], array('field' => $field, 'model' => $model, 'form' => $form, 'labelClass' => $labelClass,));
            $this->endWidget();
            ?>
        </div>
    </div>
</div>