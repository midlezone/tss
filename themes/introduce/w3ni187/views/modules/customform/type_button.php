<div class="w3-form-group form-group">
    <div class="col-xs-12 w3-form-button">
        <?php
        switch ($field['field_options']['button_type']) {
            case 'submitform': {
                    echo '<div class="registered-action">';
                    echo '<button type="submit" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"><span>Gửi liên hệ</span></button>';
                    echo '<div>';
                } break;
            case 'resetform': {
                    echo CHtml::resetButton(Yii::t('common', $field['field_label']), array('class' => 'btn btn-default btn-reset w3-btn w3-btn-rs'));
                }break;
            default: {
                    echo CHtml::button(Yii::t('common', $field['field_label']), array('class' => 'btn btn-default w3-btn w3-btn-df'));
                }
        }
        ?>
    </div>
</div>
