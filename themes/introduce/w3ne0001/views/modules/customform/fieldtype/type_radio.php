<li class="form_li">
    <span><?php echo $field['label']; ?></span><br />
    <?php foreach ($field['field_options']['options'] as $option) { ?>
        <?php echo CHtml::radioButton($field['cid'], $option['checked'], array(), array('value' => (isset($option['value']) ? $option['value'] : ''))); ?>
        <label><?php echo $option['label']; ?></label>
    <?php } ?>
    <?php if (isset($field['field_options']['include_other_option']) && $field['field_options']['include_other_option']) { ?>
        <?php echo CHtml::radioButton($field['cid'], false, array(), array('value' => '-1')); ?>
        <label>Other</label>
        <?php echo CHtml::textField($field['cid'] . 'other'); ?>
    <?php } ?>
</li>