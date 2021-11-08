<li class="form_li">
    <span><?php echo $field['label']; ?></span><br />
        <?php foreach ($field['field_options']['options'] as $option) { ?>
                <?php echo CHtml::checkBox($field['cid'], $option['checked'], array('value' => (isset($option['value']) ? $option['value'] : ''),'class'=>"checkinput")); ?>
                <label><?php echo $option['label']; ?></label>
        <?php } ?>
        <?php if (isset($field['field_options']['include_other_option']) && $field['field_options']['include_other_option']) { ?>
                <?php echo CHtml::checkBox($field['cid'], false, array('value' => '-1','class'=>"checkinput")); ?>
                <label>Other <?php echo CHtml::textField($field['cid'] . 'other'); ?></label>
        <?php } ?>
</li>