
<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Ảnh Đại Diện', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->hiddenField($model, 'avatar_id', array('class' => 'span12 col-sm-12')); ?>
				
                <div style="clear: both;"></div>
                <div id="newsavatar" style="display: block; margin-top: 10px;">
                    <div id="newsavatar_img" style="display: inline-block; max-width: 100px; max-height: 100px; overflow: hidden; vertical-align: top; <?php if ($model->avatar_id) echo 'margin-right: 10px;'; ?>">  
                        <?php if ($model->avatar_path && $model->avatar_name) { ?>
                            <img src="<?php echo ClaHost::getImageHost() . $model->avatar_path . 's500_500/' . $model->avatar_name; ?>" style="width: 100%;" />
                        <?php } ?>
                    </div>
                    <div id="newsavatar_form" style="display: inline-block;">
                        <?php echo CHtml::button(Yii::t('setting', 'btn_select_avatar'), array('class' => 'btn  btn-sm')); ?>
                    </div>
                </div>
                <?php echo $form->error($model, 'avatar_id'); ?>
            </div>
</div>