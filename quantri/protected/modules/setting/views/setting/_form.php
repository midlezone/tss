<?php
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ckeditor/ckeditor.js');
?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/upload/ajaxupload.min.js"></script>
<div class="row">
    <div class="col-xs-12 no-padding">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'site-settings-form',
            'htmlOptions' => array('class' => 'form-horizontal'),
            'enableAjaxValidation' => false,
        ));
        ?>

        <?php
        Yii::app()->clientScript->registerScript('sitesettings', "
    jQuery('#sitelogo_img').css({\"margin-right\":\"10px\"});
    jQuery('#sitelogo_form').ajaxUpload({
        url : '" . Yii::app()->createUrl("/setting/setting/uploadfile") . "',
        name: 'file',
        onSubmit: function() {
                //$('#loader-shopping').show();                     
        },
        onComplete: function(result) {
            var obj = $.parseJSON(result);
            if(obj.status == '200') {
                if(obj.data.realurl){
                    jQuery('#SiteSettings_site_logo').val(obj.data.realurl);
                    if(jQuery('#sitelogo_img img').attr('src')){
                        jQuery('#sitelogo_img img').attr('src',obj.data.realurl);
                    }else{
                        jQuery('#sitelogo_img').append('<img src=\"'+obj.data.realurl+'\" />');
                    }
                    jQuery('#sitelogo_img').css({\"margin-right\":\"10px\"});
                }
            }
        }
    });
    
    jQuery('#sitefavicon_form').ajaxUpload({
        url : '" . Yii::app()->createUrl("/setting/setting/uploadfavicon") . "',
        name: 'file',
        onSubmit: function() {
                //$('#loader-shopping').show();                     
        },
        onComplete: function(result) {
            var obj = $.parseJSON(result);
            if(obj.status == '200') {
                if(obj.data.realurl){
                    jQuery('#SiteSettings_favicon').val(obj.data.realurl);
                    if(jQuery('#sitefavicon_img img').attr('src')){
                        jQuery('#sitefavicon_img img').attr('src',obj.data.realurl);
                    }else{
                        jQuery('#sitefavicon_img').append('<img src=\"'+obj.data.realurl+'\" />');
                    }
                    jQuery('#sitefavicon_img').css({\"margin-right\":\"10px\"});
                }
            }
        }
    });

");
        ?>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'site_title', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'site_title', array('class' => 'span9 col-sm-12')); ?>
                <span class="help-inline">
                    <?php echo $form->error($model, 'site_title'); ?>
                </span>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'site_logo', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->hiddenField($model, 'site_logo', array('class' => 'span9 col-sm-12')); ?>
                <div style="clear: both;"></div>
                <div id="sitelogo" style="display: block; margin-top: 10px;">
                    <div id="sitelogo_img" style="display: inline-block; max-width: 100px; overflow: hidden; vertical-align: top; <?php if ($model->site_logo) echo 'margin-right: 10px;'; ?>">  
                        <?php if ($model->site_logo) { ?>
                            <img src="<?php echo $model->site_logo; ?>" style="width: 100%;" />
                        <?php } ?>
                    </div>
                    <div id="sitelogo_form" style="display: inline-block;">
                        <?php echo CHtml::button(Yii::t('setting', 'btn_select_logo'), array('class' => 'btn  btn-sm')); ?>
                    </div>
                </div>
                <?php echo $form->error($model, 'site_logo'); ?>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'favicon', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->hiddenField($model, 'favicon', array('class' => 'span9 col-sm-12')); ?>
                <div style="clear: both;"></div>
                <div id="sitefavicon" style="display: block; margin-top: 10px;">
                    <div id="sitefavicon_img" style="display: inline-block; max-width: 100px; overflow: hidden; vertical-align: top; <?php if ($model->favicon) echo 'margin-right: 10px;'; ?>">  
                        <?php if ($model->favicon) { ?>
                            <img src="<?php echo $model->favicon; ?>" style="width: 100%;" />
                        <?php } ?>
                    </div>
                    <div id="sitefavicon_form" style="display: inline-block;">
                        <?php echo CHtml::button(Yii::t('setting', 'btn_select_favicon'), array('class' => 'btn  btn-sm')); ?>
                    </div>
                </div>
                <?php echo $form->error($model, 'favicon'); ?>
            </div>
        </div>
        <?php if (ClaUser::isSupperAdmin()) { ?>
            <div class="control-group form-group">
                <?php echo $form->labelEx($model, 'site_skin', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
                <div class="controls col-sm-10">
                    <?php echo $form->textField($model, 'site_skin', array('class' => 'span9 col-sm-12')); ?>
                    <span class="help-inline">
                        <?php echo $form->error($model, 'site_skin'); ?>
                    </span>
                </div>
            </div>
            <div class="control-group form-group">
                <?php echo $form->labelEx($model, 'language', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
                <div class="controls col-sm-10">
                    <?php echo $form->dropDownList($model, 'language', array('' => '') + ClaSite::getLanguageSupport(), array('class' => 'span9 col-sm-12')); ?>
                    <span class="help-inline">
                        <?php echo $form->error($model, 'language'); ?>
                    </span>
                </div>
            </div>
            <div class="control-group form-group">
                <?php echo $form->labelEx($model, 'admin_language', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
                <div class="controls col-sm-10">
                    <?php echo $form->dropDownList($model, 'admin_language', array('' => '') + ClaSite::getLanguageSupport(), array('class' => 'span9 col-sm-12')); ?>
                    <span class="help-inline">
                        <?php echo $form->error($model, 'admin_language'); ?>
                    </span>
                </div>
            </div>
            <div class="control-group form-group">
                <?php echo $form->labelEx($model, 'languages_for_site', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
                <div class="controls col-sm-10">
                    <?php
                    $selected = array();
                    if (!$model->isNewRecord) {
                        $languages_for_sites = $model->getLanguageForSite();
                        foreach ($languages_for_sites as $key => $languages_for_site)
                            $selected[$key] = array('selected' => 'selected');
                    }

                    $this->widget('common.extensions.echosen.Chosen', array(
                        'model' => $model,
                        'attribute' => 'languages_for_site',
                        'multiple' => true,
                        'placeholderMultiple' => $model->getAttributeLabel('languages_for_site'),
                        'data' => ClaSite::getLanguageSupport(),
                        'htmlOptions' => array(
                            'class' => 'span12 col-sm-12',
                            'options' => $selected,
                        ),
                    ));
                    ?>
                    <?php echo $form->error($model, 'languages_for_site'); ?>
                </div>
            </div>
            <div class="control-group form-group">
                <?php echo $form->labelEx($model, 'pagesize', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
                <div class="controls col-sm-10">
                    <?php echo $form->textField($model, 'pagesize', array('class' => 'span9 col-sm-12')); ?>
                    <span class="help-inline">
                        <?php echo $form->error($model, 'pagesize'); ?>
                    </span>
                </div>
            </div>
            <div class="control-group form-group">
                <?php echo $form->labelEx($model, 'admin_default', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
                <div class="controls col-sm-10">
                    <?php echo $form->dropDownList($model, 'admin_default', array('news' => 'news', 'economy' => 'economy'), array('class' => 'span9 col-sm-12')); ?>
                    <span class="help-inline">
                        <?php echo $form->error($model, 'admin_default'); ?>
                    </span>
                </div>
            </div>
            <div class="control-group form-group">
                <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
                <div class="controls col-sm-10">
                    <?php echo $form->dropDownList($model, 'status', $model->getStatusArr(), array('class' => 'span9 col-sm-12')); ?>
                    <span class="help-inline">
                        <?php echo $form->error($model, 'status'); ?>
                    </span>
                </div>
            </div>
            <div class="control-group form-group">
                <?php echo $form->labelEx($model, 'site_type', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
                <div class="controls col-sm-10">
                    <?php echo $form->dropDownList($model, 'site_type', ClaSite::getSiteTypes(), array('class' => 'span9 col-sm-12')); ?>
                    <span class="help-inline">
                        <?php echo $form->error($model, 'site_type'); ?>
                    </span>
                </div>
            </div>
            <div class="control-group form-group">
                <?php echo $form->labelEx($model, 'storage_limit', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
                <div class="controls col-sm-10">
                    <?php echo $form->textField($model, 'storage_limit', array('class' => 'span9 col-sm-12')); ?>
                    <span class="help-inline">
                        <?php echo $form->error($model, 'storage_limit'); ?>
                    </span>
                </div>
            </div>
            <div class="control-group form-group">
                <?php echo $form->labelEx($model, 'expiration_date', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
                <div class="controls col-sm-10">
                    <?php
                    $this->widget('common.extensions.EJuiDateTimePicker.EJuiDateTimePicker', array(
                        'model' => $model, //Model object
                        'name' => 'SiteSettings[expiration_date]', //attribute name
                        'mode' => 'datetime', //use "time","date" or "datetime" (default)
                        'value' => ((int) $model->expiration_date > 0 ) ? date('d-m-Y H:i:s', (int) $model->expiration_date) : '',
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
                    <?php echo $form->error($model, 'expiration_date'); ?>
                </div>
            </div>
        <?php } ?>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'admin_email', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'admin_email', array('class' => 'span9 col-sm-12')); ?>
                <span class="help-inline">
                    <?php echo $form->error($model, 'admin_email'); ?>
                </span>
            </div>
        </div>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'phone', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'phone', array('class' => 'span9 col-sm-12')); ?>
                <span class="help-inline">
                    <?php echo $form->error($model, 'phone'); ?>
                </span>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'meta_keywords', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textArea($model, 'meta_keywords', array('class' => 'span9 col-sm-12')); ?>
                <span class="help-inline">
                    <?php echo $form->error($model, 'meta_keywords'); ?>
                </span>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'meta_description', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textArea($model, 'meta_description', array('class' => 'span9 col-sm-12')); ?>
                <span class="help-inline">
                    <?php echo $form->error($model, 'meta_description'); ?>
                </span>
            </div>
        </div>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'google_analytics', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textArea($model, 'google_analytics', array('class' => 'span9 col-sm-12')); ?>
                <span class="help-inline">
                    <?php echo $form->error($model, 'google_analytics'); ?>
                </span>
            </div>
        </div>

        <div class="control-group form-group buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('common', 'update') : Yii::t('common', 'update'), array('class' => 'btn btn-info')); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>