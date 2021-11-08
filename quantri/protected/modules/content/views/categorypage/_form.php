<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ckeditor/ckeditor.js') ?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/upload/ajaxupload.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        CKEDITOR.replace("CategoryPage_content", {
            height: 400,
            language: '<?php echo Yii::app()->language ?>'
        });
    });
</script>

<div class="row">
    <div class="col-xs-12 no-padding">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'category-page-form',
            'htmlOptions' => array('class' => 'form-horizontal'),
            'enableAjaxValidation' => false,
        ));
        ?>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'title', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'title', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'title'); ?>
            </div>
        </div>
        <?php if (!$model->isNewRecord) { ?>
            <div class="control-group form-group">
                <?php echo $form->labelEx($model, 'alias', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
                <div class="controls col-sm-10">
                    <?php echo $form->textField($model, 'alias', array('class' => 'span12 col-sm-12')); ?>
                    <?php echo $form->error($model, 'alias'); ?>
                </div>
            </div>
        <?php } ?>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'avatar', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->hiddenField($model, 'avatar', array('class' => 'span12 col-sm-12')); ?>
                <div id="coursecategoryravatar" style="display: block; margin-top: 0px;">
                    <div id="coursecategoryavatar_img" style="display: inline-block; max-width: 100px; max-height: 100px; overflow: hidden; vertical-align: top; <?php if ($model->avatar) echo 'margin-right: 10px;'; ?>">  
                        <?php if ($model->image_path && $model->image_name) { ?>
                            <img src="<?php echo ClaHost::getImageHost() . $model->image_path . 's100_100/' . $model->image_name; ?>" style="width: 100%;" />
                        <?php } ?>
                    </div>
                    <div id="coursecategoryavatar_form" style="display: inline-block;">
                        <?php echo CHtml::button(Yii::t('setting', 'btn_select_avatar'), array('class' => 'btn  btn-sm')); ?>
                    </div>
                </div>
                <?php echo $form->error($model, 'avatar'); ?>
            </div>
        </div>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'content', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textArea($model, 'content', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'content'); ?>
            </div>
        </div>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'meta_keywords', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textArea($model, 'meta_keywords', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'meta_keywords'); ?>
            </div>
            <div style="clear: both;"><br/></div>
            <?php echo $form->labelEx($model, 'meta_description', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textArea($model, 'meta_description', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'meta_description'); ?>
            </div>
            <div style="clear: both;"><br/></div>
            <?php echo $form->labelEx($model, 'meta_title', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textArea($model, 'meta_title', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'meta_title'); ?>
            </div>
        </div>
        <div class="control-group form-group buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('common', 'create') : Yii::t('common', 'update'), array('class' => 'btn btn-info')); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->
<script type="text/javascript">
    jQuery(function ($) {
        jQuery('#coursecategoryavatar_form').ajaxUpload({
            url: '<?php echo Yii::app()->createUrl("/content/categorypage/uploadfile"); ?>',
            name: 'file',
            onSubmit: function () {
            },
            onComplete: function (result) {
                var obj = $.parseJSON(result);
                if (obj.status == '200') {
                    if (obj.data.realurl) {
                        jQuery('#CategoryPage_avatar').val(obj.data.avatar);
                        if (jQuery('#coursecategoryavatar_img img').attr('src')) {
                            jQuery('#coursecategoryvatar_img img').attr('src', obj.data.realurl);
                        } else {
                            jQuery('#coursecategoryavatar_img').append('<img src="' + obj.data.realurl + '" />');
                        }
                        jQuery('#coursecategoryavatar_img').css({"margin-right": "10px"});
                    }
                }
            }
        });


    });
</script>