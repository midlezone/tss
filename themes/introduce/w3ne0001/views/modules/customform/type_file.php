<div class="w3-form-group">
    <label class="w3-form-label">
        <?php echo $field['field_label'] ?>
        <?php if ($field['field_required']) { ?>
            <span class="required">*</span>
        <?php } ?>
    </label>
    <div class="w3-form-field">
        <?php echo CHtml::fileField(Forms::getSubmitName($field), '', array('class' => "w3-form-input input-file", 'accept' => ($field['field_options']['file_type'] == FormFields::FILE_IMAGES) ? 'image/*' : '*')); ?>
    </div>
</div>