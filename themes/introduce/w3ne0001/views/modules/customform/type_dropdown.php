<li class="form_li">
<span><?php echo $field['label']; ?></span><br />
    <select name="<?php echo $field['cid']; ?>">
        <?php if (isset($field['field_options']['include_blank_option']) && $field['field_options']['include_blank_option']) { ?>
            <option value="">&nbsp;</option>
        <?php } ?>
        <?php foreach ($field['field_options']['options'] as $option) { ?>
            <option value="<?php echo (isset($option['value']) ? $option['value'] : ''); ?>">
                <?php echo $option['label']; ?>
            </option>
        <?php } ?>
    </select>
</li>