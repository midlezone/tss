
<div class="form-group w3-form-group box-radio">
    <label class="col-sm-<?php echo $labelClass; ?> control-label w3-form-label<?php echo ($field['field_required']) ? ' required' : ''; ?>">
        <?php echo Yii::t('common', $field['field_label']); ?>
        <?php if ($field['field_required']) { ?>
            <span class="required">*</span>
        <?php } ?>
    </label>
    <?php ?>
    <div class="col-sm-<?php echo $labelClass; ?> w3-form-field">
        <?php foreach ($field['field_options']['options'] as $option) { ?>
            <label>
                <?php echo CHtml::radioButton(Forms::getSubmitName($field), $option['checked'], array('value' => (isset($option['value']) ? $option['value'] : ''))); ?>
                <?php echo Yii::t('common', $option['label']); ?></label>
            <br>
        <?php } ?>
        <?php if (isset($field['field_options']['include_other_option']) && $field['field_options']['include_other_option']) { ?>
            <?php echo CHtml::radioButton(Forms::getSubmitName($field), false, array(), array('value' => '-1')); ?>
            <label><?php echo Yii::t('common', 'other'); ?></label>
            <?php echo CHtml::textField(Forms::getSubmitName($field) . 'other'); ?>
        <?php } ?>
    </div>
    <div class="des"><?php echo $field['field_options']['description']; ?></div>
</div>