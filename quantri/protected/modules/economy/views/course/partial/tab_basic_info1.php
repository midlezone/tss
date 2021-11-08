<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/category/category.css");
$arr = array('' => Yii::t('category', 'category_parent_0'));
$option_category = $category->createOptionArray(ClaCategory::CATEGORY_ROOT, ClaCategory::CATEGORY_STEP, $arr);
$option_lecturer = Lecturer::getOptionLecturer();
?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/upload/ajaxupload.min.js"></script>
<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Câu Hỏi', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'name', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>
</div>


<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Đáp Án 1', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'alias', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'alias'); ?>
    </div>
</div>


<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Đáp Án 2', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'time_for_study', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'time_for_study'); ?>
    </div>
</div>


<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Đáp Án 3', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'school_schedule', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'school_schedule'); ?>
    </div>
</div>

<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Đáp Án 4', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'score4', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'score4'); ?>
    </div>
</div>

<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Kết quả', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'sort_description', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'sort_description'); ?>
    </div>
</div>


<script type="text/javascript">
    jQuery(function ($) {
        jQuery('#courseavatar_form').ajaxUpload({
            url: '<?php echo Yii::app()->createUrl("/economy/course/uploadfile"); ?>',
            name: 'file',
            onSubmit: function () {
            },
            onComplete: function (result) {
                var obj = $.parseJSON(result);
                if (obj.status == '200') {
                    if (obj.data.realurl) {
                        jQuery('#Course_avatar').val(obj.data.avatar);
                        if (jQuery('#courseavatar_img img').attr('src')) {
                            jQuery('#courseavatar_img img').attr('src', obj.data.realurl);
                        } else {
                            jQuery('#courseavatar_img').append('<img src="' + obj.data.realurl + '" />');
                        }
                        jQuery('#courseavatar_img').css({"margin-right": "10px"});
                    }
                }
            }
        });


    });
</script>