<div class="w3-form-group form-group">
    <div class=" col-sm-<?php echo $labelClass; ?> w3-form-button">
        <?php
        switch ($field['field_options']['button_type']) {
            case 'submitform': {
                    echo CHtml::submitButton(Yii::t('common', $field['field_label']), array('class' => 'btn  btn-primary w3-btn w3-btn-sb'));
                } break;
            case 'resetform': {
                    echo CHtml::resetButton(Yii::t('common', $field['field_label']), array('class' => 'btn btn-default btn-reset w3-btn w3-btn-rs'));
                }break;
            default: {
                    echo CHtml::button(Yii::t('common', $field['field_label']), array('class' => 'btn btn-default w3-btn w3-btn-df'));
                }
        }
        ?>
        <div class="des"><?php echo $field['field_options']['description']; ?></div>
    </div>
</div>