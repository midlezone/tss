<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/category/category.css");
?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/upload/ajaxupload.min.js"></script>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ckeditor/ckeditor.js') ?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        CKEDITOR.replace("Lecturer_description", {
            height: 400,
            language: '<?php echo Yii::app()->language ?>'
        });
    });
</script>

<div class="widget widget-box">
    <div class="widget-header"><h4>Thêm Thống kê xiên</h4></div>
    <div class="widget-body no-padding">
        <div class="widget-main">
            <div class="row">
                <div class="col-xs-12 no-padding">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'category-form',
                        'htmlOptions' => array('class' => 'form-horizontal'),
                        'enableAjaxValidation' => false,
                    ));
                    ?>
                    <div class="control-group form-group">
                        <?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
                        <div class="controls col-sm-10">
                            <?php echo $form->textField($model, 'name', array('class' => 'span10 col-sm-12')); ?>
                            <?php echo $form->error($model, 'name'); ?>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
                        <div class="controls col-sm-10">
                            <?php echo $form->dropDownList($model, 'status', ActiveRecord::statusArray(), array('class' => 'span10 col-sm-12')); ?>
                            <?php echo $form->error($model, 'status'); ?>
                        </div>
                    </div>
                   
                    <div class="control-group form-group">
                        <label class="col-sm-2 control-label no-padding-left" for="Lecturer_subject">Tổng Số Trận</label>
                        <div class="controls col-sm-10">
                            <?php echo $form->textField($model, 'subject', array('class' => 'span10 col-sm-12')); ?>
                            <?php echo $form->error($model, 'subject'); ?>
                        </div>
                    </div>
                  
                    <div class="control-group form-group">
                        <label class="col-sm-2 control-label no-padding-left" for="Lecturer_subject">Thắng</label>
                        <div class="controls col-sm-10">
                            <?php echo $form->textField($model, 'phone', array('class' => 'span10 col-sm-12')); ?>
                            <?php echo $form->error($model, 'phone'); ?>
                        </div>
                    </div>
                    <div class="control-group form-group">
                       <label class="col-sm-2 control-label no-padding-left" for="Lecturer_subject">Thua</label>
                        <div class="controls col-sm-10">
                            <?php echo $form->textField($model, 'facebook', array('class' => 'span10 col-sm-12')); ?>
                            <?php echo $form->error($model, 'facebook'); ?>
                        </div>
                    </div>
                  
                    <div class="control-group form-group buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('common', 'save') : Yii::t('common', 'save'), array('class' => 'btn btn-primary', 'id' => 'btnAddCate')); ?>
                    </div>
                    <?php
                    $this->endWidget();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(function ($) {
        jQuery('#lectureravatar_form').ajaxUpload({
            url: '<?php echo Yii::app()->createUrl("/economy/lecturer/uploadfile"); ?>',
            name: 'file',
            onSubmit: function () {
            },
            onComplete: function (result) {
                var obj = $.parseJSON(result);
                if (obj.status == '200') {
                    if (obj.data.realurl) {
                        jQuery('#Lecturer_avatar').val(obj.data.avatar);
                        if (jQuery('#lectureravatar_img img').attr('src')) {
                            jQuery('#lectureravatar_img img').attr('src', obj.data.realurl);
                        } else {
                            jQuery('#lectureravatar_img').append('<img src="' + obj.data.realurl + '" />');
                        }
                        jQuery('#lectureravatar_img').css({"margin-right": "10px"});
                    }
                }
            }
        });


    });
</script>
