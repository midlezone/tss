<div class="form-group w3-form-group">
    <div class="col-sx-12 w3-form-field">
        <?php echo CHtml::emailField(Forms::getSubmitName($field), '', array('class' => "form-control w3-form-input input-email", 'placeholder' => $field['field_label'])); ?>
        <?php echo $form->error($model, $field['field_key']); ?>
    </div>
</div>