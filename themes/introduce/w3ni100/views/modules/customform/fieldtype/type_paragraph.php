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
        <?php echo CHtml::textArea(Forms::getSubmitName($field), '', array('class' => "w3-form-input input-textarea inputbox")); ?>
        <?php echo $form->error($model, $field['field_key']); ?>
    </td>
</tr>