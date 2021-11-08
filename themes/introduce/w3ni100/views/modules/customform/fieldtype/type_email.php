<tr>
    <td>
        <b>
            <?php echo $field['field_label'] ?>
            <?php if ($field['field_required']) { ?>
                <span style="color:red">*</span>
            <?php } ?>
        </b>
    </td>
    <td>
        <?php echo CHtml::textField(Forms::getSubmitName($field), '', array('class' => "w3-form-input input-email form-control inputbox")); ?>
        <?php echo $form->error($model, $field['field_key']); ?>
    </td>
</tr>