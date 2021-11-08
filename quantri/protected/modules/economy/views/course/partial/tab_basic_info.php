<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/category/category.css");
$arr = array('' => Yii::t('category', 'category_parent_0'));
$option_category = $category->createOptionArray(ClaCategory::CATEGORY_ROOT, ClaCategory::CATEGORY_STEP, $arr);
$option_lecturer = Lecturer::getOptionLecturer();
?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/upload/ajaxupload.min.js"></script>
<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Trận Đấu', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'name', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>
</div>


<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Tỷ lệ Kèo', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'alias', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'alias'); ?>
    </div>
</div>


<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Giải Đấu', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->dropDownList($model, 'cat_id', array('' => Yii::t('product', 'manufacturer_choice')) + Manufacturer::getAllManufacturerArr(), array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'cat_id'); ?>
    </div>
</div>


<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Lựa Chọn', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'time_for_study', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'time_for_study'); ?>
    </div>
</div>


<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Tỷ Số', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'school_schedule', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'school_schedule'); ?>
    </div>
</div>

<div class="form-group no-margin-left">
    <div class="controls col-sm-12">
        <div class="row">
			
			 <?php echo $form->labelEx($model,'Ngày giờ', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php
                $this->widget('common.extensions.EJuiDateTimePicker.EJuiDateTimePicker', array(
                    'model' => $model, //Model object
                    'name' => 'Course[course_open]', //attribute name
                    'mode' => 'datetime', //use "time","date" or "datetime" (default)
                    'value' => ((int) $model->course_open > 0 ) ? date('d-m-Y H:i:s', (int) $model->course_open) : date('d-m-Y H:i:s'),
                    'language' => 'vi',
                    'options' => array(
                        'showSecond' => true,
                        'dateFormat' => 'dd-mm-yy',
                        'timeFormat' => 'HH:mm:ss',
                        'controlType' => 'select',
                        'stepHour' => 1,
                        'stepMinute' => 1,
                        'stepSecond' => 1,
                        //'showOn' => 'button',
                        'showSecond' => true,
                        'changeMonth' => true,
                        'changeYear' => false,
                        'tabularLevel' => null,
                    //'addSliderAccess' => true,
                    //'sliderAccessArgs' => array('touchonly' => false),
                    ), // jquery plugin options
                    'htmlOptions' => array(
                        'class' => 'span12 col-sm-12',
                    )
                ));
                ?>
                <?php echo $form->error($model, 'course_open'); ?>
            </div>
			
           
        </div>
    </div>
</div>

<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Kết quả', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'sort_description', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'sort_description'); ?>
    </div>
</div>


<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->dropDownList($model, 'status', ActiveRecord::statusArray(), array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'status'); ?>
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