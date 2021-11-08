<?php
//
$category = new ClaCategory();
$category->type = ClaCategory::CATEGORY_NEWS;
$category->generateCategory();
$arr = array('' => Yii::t('category', 'category_parent_0'));
//
$option = $category->createOptionArray(ClaCategory::CATEGORY_ROOT, ClaCategory::CATEGORY_STEP, $arr);
//
?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/upload/ajaxupload.min.js"></script>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ckeditor/ckeditor.js') ?>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/colorbox/style3/colorbox.css"></link>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/colorbox/jquery.colorbox-min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {

        $("#addCate").colorbox({width: "80%", overlayClose: false});
        CKEDITOR.replace("News_news_desc", {
            height: 400,
            language: '<?php echo Yii::app()->language ?>'
        });
    });
    jQuery(function ($) {
        jQuery('#newsavatar_form').ajaxUpload({
            url: '<?php echo Yii::app()->createUrl("/content/news/uploadfile"); ?>',
            name: 'file',
            onSubmit: function () {
            },
            onComplete: function (result) {
                var obj = $.parseJSON(result);
                if (obj.status == '200') {
                    if (obj.data.realurl) {
                        jQuery('#News_avatar').val(obj.data.avatar);
                        if (jQuery('#newsavatar_img img').attr('src')) {
                            jQuery('#newsavatar_img img').attr('src', obj.data.realurl);
                        } else {
                            jQuery('#newsavatar_img').append('<img src="' + obj.data.realurl + '" />');
                        }
                        jQuery('#newsavatar_img').css({"margin-right": "10px"});
                    }
                } else {
                    if (obj.message)
                        alert(obj.message);
                }

            }
        });
    });
</script>
<div class="row">
    <div class="col-xs-12 no-padding">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'news-form',
            'htmlOptions' => array('class' => 'form-horizontal'),
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
        ));
        ?>
		
		 <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'Danh sách lịch', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <div class="input-group">
                    <?php echo $form->dropDownList($model, 'news_category_id', $option, array('class' => 'form-control')); ?>
                    <div class="input-group-btn" style="padding-left: 10px;">  
                        <a href="<?php echo Yii::app()->createUrl('content/newscategory/addcat', array('pa' => ClaCategory::CATEGORY_ROOT) + $_GET) ?>" id="addCate" class="btn btn-primary btn-sm" style="line-height: 16px;">
                            <?php echo Yii::t('category', 'category_add'); ?>
                        </a>
                    </div>
                </div>
                <?php echo $form->error($model, 'news_category_id'); ?>
            </div>
        </div>
		
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'Nội dung lịch trong ngày', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'news_title', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'news_title'); ?>
            </div>
        </div>
     
       
        <div class="control-group form-group" style="display:none">
            <?php echo $form->labelEx($model, 'Nội dung lịch trong ngày', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textArea($model, 'news_sortdesc', array('class' => 'span12 col-sm-12','value' => 'test')); ?>
                <?php echo $form->error($model, 'news_sortdesc'); ?>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'Nội dung lịch trong tuần', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <div class="span12">
                    <?php echo $form->textArea($model, 'news_desc', array('class' => 'span12 col-sm-12')); ?>
                    <?php echo $form->error($model, 'news_desc'); ?>
                </div>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'Địa điểm', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'news_source', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'news_source'); ?>
            </div>
        </div>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'Chủ Trì', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'poster', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'poster'); ?>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'Thời Gian', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php
                $this->widget('common.extensions.EJuiDateTimePicker.EJuiDateTimePicker', array(
                    'model' => $model, //Model object
                    'name' => 'News[publicdate]', //attribute name
                    'mode' => 'datetime', //use "time","date" or "datetime" (default)
                    'value' => ((int) $model->publicdate > 0 ) ? date('d-m-Y H:i:s', (int) $model->publicdate) : date('d-m-Y H:i:s'),
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
                <?php echo $form->error($model, 'publicdate'); ?>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->dropDownList($model, 'status', ActiveRecord::statusArray(), array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'status'); ?>
            </div>
        </div>

      
        <div class="control-group form-group buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('news', 'news_create') : Yii::t('news', 'news_edit'), array('class' => 'btn btn-info', 'id' => 'savenews')); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>