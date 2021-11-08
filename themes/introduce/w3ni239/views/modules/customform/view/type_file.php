<div class="form-group w3-form-group">
    <label class="col-sm-<?php echo $labelClass; ?> control-label w3-form-label<?php echo ($field['field_required']) ? ' required' : ''; ?>">
        <?php echo Yii::t('common', $field['field_label']); ?>
        <?php if ($field['field_required']) { ?>
            <span class="required">*</span>
        <?php } ?>
    </label>
    <div class="col-sm-<?php echo $labelClass; ?> w3-form-field">
        <?php echo CHtml::fileField(Forms::getSubmitName($field), '', array('class' => "w3-form-input input-file", 'accept' => ($field['field_options']['file_type'] == FormFields::FILE_IMAGES) ? 'image/*' : '*')); ?>
    </div>
     <div class="des"><?php echo $field['field_options']['description']; ?></div>
</div>