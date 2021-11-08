
<div class="w3-form-group form-group">
    <div class=" col-xs-12 w3-form-button">
        <div class="registered-action">
            <?php
            switch ($field['field_options']['button_type']) {
                case 'submitform': {
                        echo CHtml::submitButton($field['field_label'], array('class' => 'btn btn-primary w3-btn btn-submit'));
                    } break;
                case 'resetform': {
                        echo CHtml::resetButton($field['field_label'], array('class' => 'btn w3-btn btn-reset'));
                    }break;
                default: {
                        echo CHtml::button($field['field_label'], array('class' => 'btn w3-btn btn-def'));
                    }
            }
            ?>
        </div>
    </div>
</div>