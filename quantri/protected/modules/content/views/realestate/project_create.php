<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ckeditor/ckeditor.js') ?>
<script type="text/javascript">
    jQuery(document).ready(function () {

        CKEDITOR.replace("RealEstateProject_information", {
            height: 400,
            language: '<?php echo Yii::app()->language ?>'
        });
		CKEDITOR.replace("RealEstateProject_location", {
            height: 400,
            language: '<?php echo Yii::app()->language ?>'
        });
    });
</script>
<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/upload/ajaxupload.min.js"></script>
<div class="widget widget-box">
    <div class="widget-header"><h4>
            <?php echo Yii::app()->controller->action->id != "update" ? Yii::t('common', 'update') : Yii::t('common', 'create'); ?>
        </h4></div>
    <div class="widget-body no-padding">
        <div class="widget-main">
            <div class="row">
                <div class="col-xs-12 no-padding">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'realestate-project-form',
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
                            <?php echo $form->dropDownList($model, 'status', ActiveRecord::statusArray(), array('class' => 'span10 col-sm-12',)); ?>
                            <?php echo $form->error($model, 'status'); ?>
                        </div>
                    </div> 
                    <div class="control-group form-group">
                        <?php echo $form->label($model, 'address', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
                        <div class="controls col-sm-10">
                            <?php echo $form->textField($model, 'address', array('class' => 'span10 col-sm-12', 'placeholder' => Yii::t('common', 'address'))); ?>
                            <?php echo $form->error($model, 'address'); ?>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <?php echo $form->labelEx($model, 'province_id', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
                        <div class="controls col-sm-10">
                            <?php echo $form->dropDownList($model, 'province_id', $listprovince, array('class' => 'span10 col-sm-12',)); ?>
                            <?php echo $form->error($model, 'province_id'); ?>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <?php echo $form->labelEx($model, 'district_id', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
                        <div class="controls col-sm-10">
                            <?php echo $form->dropDownList($model, 'district_id', $listdistrict, array('class' => 'span10 col-sm-12',)); ?>
                            <?php echo $form->error($model, 'district_id'); ?>
                        </div>
                    </div> 
                    <div class="control-group form-group">
                        <?php echo $form->labelEx($model, 'avatar', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
                        <div class="controls col-sm-10">
                            <?php echo $form->hiddenField($model, 'avatar', array('class' => 'span12 col-sm-12')); ?>
                            <div id="RealEstateravatar" style="display: block; margin-top: 0px;">
                                <div id="RealEstateavatar_img" style="display: inline-block; max-width: 100px; max-height: 100px; overflow: hidden; vertical-align: top; <?php if ($model->avatar) echo 'margin-right: 10px;'; ?>">  
                                    <?php if ($model->image_path && $model->image_name) { ?>
                                        <img src="<?php echo ClaHost::getImageHost() . $model->image_path . 's100_100/' . $model->image_name; ?>" style="width: 100%;" />
                                    <?php } ?>
                                </div>
                                <div id="RealEstateavatar_form" style="display: inline-block;">
                                    <?php echo CHtml::button(Yii::t('setting', 'btn_select_avatar'), array('class' => 'btn  btn-sm')); ?>
                                </div>
                            </div>
                            <?php echo $form->error($model, 'avatar'); ?>
                        </div>
                    </div>
					
					<div class="control-group form-group">
			            <?php echo $form->labelEx($model, 'Thông tin', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
			            <div class="controls col-sm-10">
			                <div class="span12">
			                    <?php echo $form->textArea($model, 'information', array('class' => 'span12 col-sm-12')); ?>
			                    <?php echo $form->error($model, 'information'); ?>
			                </div>
			            </div>
			        </div>
					
				
		
					  <div class="control-group form-group">
			            <?php echo $form->labelEx($model, 'Quy mô', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
			            <div class="controls col-sm-10">
			                <div class="span12">
			                    <?php echo $form->textArea($model, 'scale', array('class' => 'span12 col-sm-12')); ?>
			                    <?php echo $form->error($model, 'scale'); ?>
			                </div>
			            </div>
			        </div>
					  <div class="control-group form-group">
			            <?php echo $form->labelEx($model, 'Tiến độ', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
			            <div class="controls col-sm-10">
			                <div class="span12">
			                    <?php echo $form->textArea($model, 'progress', array('class' => 'span12 col-sm-12')); ?>
			                    <?php echo $form->error($model, 'progress'); ?>
			                </div>
			            </div>
			        </div>  <div class="control-group form-group">
			            <?php echo $form->labelEx($model, 'Vị trí', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
			            <div class="controls col-sm-10">
			                <div class="span12">
			                    <?php echo $form->textArea($model, 'location', array('class' => 'span12 col-sm-12')); ?>
			                    <?php echo $form->error($model, 'location'); ?>
			                </div>
			            </div>
			        </div>
					  <div class="control-group form-group">
			            <?php echo $form->labelEx($model, 'Tiện ích', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
			            <div class="controls col-sm-10">
			                <div class="span12">
			                    <?php echo $form->textArea($model, 'extension', array('class' => 'span12 col-sm-12')); ?>
			                    <?php echo $form->error($model, 'extension'); ?>
			                </div>
			            </div>
			        </div>
					  <div class="control-group form-group">
			            <?php echo $form->labelEx($model, 'Căn hộ', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
			            <div class="controls col-sm-10">
			                <div class="span12">
			                    <?php echo $form->textArea($model, 'apartment', array('class' => 'span12 col-sm-12')); ?>
			                    <?php echo $form->error($model, 'apartment'); ?>
			                </div>
			            </div>
			        </div>
					  <div class="control-group form-group">
			            <?php echo $form->labelEx($model, 'Phương thức thanh toán', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
			            <div class="controls col-sm-10">
			                <div class="span12">
			                    <?php echo $form->textArea($model, 'payment', array('class' => 'span12 col-sm-12')); ?>
			                    <?php echo $form->error($model, 'payment'); ?>
			                </div>
			            </div>
			        </div>
					  <div class="control-group form-group">
			            <?php echo $form->labelEx($model, 'Liên hệ', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
			            <div class="controls col-sm-10">
			                <div class="span12">
			                    <?php echo $form->textArea($model, 'contact', array('class' => 'span12 col-sm-12')); ?>
			                    <?php echo $form->error($model, 'contact'); ?>
			                </div>
			            </div>
			        </div>
					
                    <div class="control-group form-group buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('common', 'create') : Yii::t('common', 'update'), array('class' => 'btn btn-primary', 'id' => 'btnAddCate')); ?>
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
        jQuery('#RealEstateavatar_form').ajaxUpload({
            url: '<?php echo Yii::app()->createUrl("/content/realestate/uploadfile"); ?>',
            name: 'file',
            onSubmit: function () {
            },
            onComplete: function (result) {
                var obj = $.parseJSON(result);
                if (obj.status == '200') {
                    if (obj.data.realurl) {
                        jQuery('#RealEstateProject_avatar').val(obj.data.avatar);
                        if (jQuery('#RealEstateavatar_img img').attr('src')) {
                            jQuery('#RealEstateavatar_img img').attr('src', obj.data.realurl);
                        } else {
                            jQuery('#RealEstateavatar_img').append('<img src="' + obj.data.realurl + '" />');
                        }
                        jQuery('#RealEstateavatar_img').css({"margin-right": "10px"});
                    }
                }
            }
        });


    });
</script>
<script type="text/javascript">
        jQuery(document).on('change', '#RealEstateProject_province_id', function () {
            jQuery.ajax({
                url: '<?php echo Yii::app()->createUrl('/suggest/suggest/getdistrict') ?>',
                data: 'pid=' + jQuery('#RealEstateProject_province_id').val(),
                dataType: 'JSON',
                beforeSend: function () {
                    w3ShowLoading(jQuery('#RealEstateProject_province_id'), 'right', 20, 0);
                },
                success: function (res) {
                    if (res.code == 200) {
                        jQuery('#RealEstateProject_district_id').html(res.html);
                    }
                    w3HideLoading();
                },
                error: function () {
                    w3HideLoading();
                }
            });
        });
</script>
