<div class="form-group w3-form-group">
    <div class="col-xs-12 w3-form-field">
        <?php echo CHtml::textArea(Forms::getSubmitName($field), '', array('class' => "form-control w3-form-input input-textarea",'placeholder' => $field['field_label'])); ?>
        <?php echo $form->error($model, $field['field_key']); ?>
    </div>
</div>