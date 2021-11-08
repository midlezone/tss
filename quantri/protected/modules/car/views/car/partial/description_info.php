<div class="form-group no-margin-left">
    <?php echo $form->labelEx($carInfo, 'attribute', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textArea($carInfo, 'attribute', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($carInfo, 'attribute'); ?>
    </div>
</div>
<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'sortdesc', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textArea($model, 'sortdesc', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'sortdesc'); ?>
    </div>
</div>
<div class="form-group no-margin-left">
    <?php echo $form->labelEx($carInfo, 'description', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textArea($carInfo, 'description', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($carInfo, 'description'); ?>
    </div>
</div>