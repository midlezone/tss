<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/effects/imagesloaded.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/effects/masonry.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ckeditor/ckeditor.js');
?>
<script type="text/javascript">
    var ta = true;
    jQuery(document).ready(function () {
        //
        CKEDITOR.replace("Albums_album_description", {
            height: 400,
            language: '<?php echo Yii::app()->language ?>'
        });
    });
    jQuery(function ($) {
    });
</script>
<div class="form" style="padding: 10px;">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'albums-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'htmlOptions' => array('class' => 'form-horizontal'),
    ));
    ?>

    <div class="albox">
        <div class="alheader">
            <div class="altitle">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'album_name', array('class' => 'col-sm-3 control-label no-padding-left')); ?>
                    <div class="col-sm-9">
                        <?php echo $form->textField($model, 'album_name', array('class' => 'col-sm-11')); ?>
                        <div class="col-sm-12 help-block no-padding">
                            <?php echo $form->error($model, 'album_name'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'ishot', array('class' => 'col-sm-3 control-label no-padding-left')); ?>
                    <div class="col-sm-9">
                        <?php echo $form->checkBox($model, 'ishot'); ?>
                        <div class="col-sm-12 help-block no-padding">
                            <?php echo $form->error($model, 'ishot'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'order', array('class' => 'col-sm-3 control-label no-padding-left')); ?>
                    <div class="col-sm-9">
                        <?php echo $form->textField($model, 'order', array('class' => 'col-sm-11')); ?>
                        <div class="col-sm-12 help-block no-padding">
                            <?php echo $form->error($model, 'order'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'cat_id', array('class' => 'col-sm-3 control-label no-padding-left')); ?>
                    <div class="col-sm-9">
                        <?php echo $form->dropDownList($model, 'cat_id', $option_category, array('class' => 'span10 col-sm-12')); ?>
                        <div class="col-sm-12 help-block no-padding">
                            <?php echo $form->error($model, 'cat_id'); ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="alaction">
                <div class="buttons">
                    <?php
                    $this->widget('common.widgets.upload.Upload', array(
                        'type' => 'images',
                        'id' => 'imageupload',
                        'buttonheight' => 25,
                        'path' => array('albums', $this->site_id, Yii::app()->user->id),
                        'limit' => 100,
                        'fileSizeLimit' => '10MB',
                        'multi' => true,
                        'imageoptions' => array(
                            'resizes' => array(array(200, 200))
                        ),
                        'buttontext' => 'Thêm ảnh',
                        'displayvaluebox' => false,
                        'oncecomplete' => "var firstitem   = jQuery('#algalley .alimglist').find('.alimgitem:first');var alimgitem   = '<div class=\"alimgitem\"><div class=\"alimgitembox\"> <div class=\"delimg\"><a href=\"#\" class=\"new_delimgaction\"><i class=\"icon-remove\"></i></a></div><div class=\"alimgthum\"><img src=\"'+da.imgurl+'\"></div><div class=\"alimgaction\"><input type=\"radio\" value=\"new_'+da.imgid+'\" name=\"setava\"><span>" . Yii::t('album', 'album_set_avatar') . "</span></div><input type=\"hidden\" value=\"'+da.imgid+'\" name=\"newimage[]\" class=\"newimage\" /></div></div>';if(firstitem.html()){firstitem.before(alimgitem);}else{jQuery('#algalley .alimglist').append(alimgitem);}; updateImgBox();"
                    ));
                    ?>
                    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('common', 'create') : Yii::t('common', 'update'), array('class' => 'btn btn-info', 'id' => 'savealbum')); ?>
                </div>
            </div>

            <div style="clear: both;"></div>
        </div>
        <div id="algalley" class="algalley">
            <div style="display:none" id="Albums_imageitem_em_" class="errorMessage"><?php echo Yii::t('album', 'album_must_one_img'); ?></div>
            <div class="alimgbox">
                <div class="alimglist">
                    <?php
                    foreach ($images as $image) {
                        $this->renderPartial('imageitem', array('image' => $image, 'avatar_id' => $model->avatar_id));
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group" style="border-top: 1px solid #ddd;padding: 20px 0px;margin-top: 20px;">
        <?php echo $form->labelEx($model, 'album_description', array('class' => 'col-sm-12 control-label no-padding-left')); ?>
        <div class="col-sm-12">
            <?php echo $form->textArea($model, 'album_description', array('class' => 'col-sm-11')); ?>
            <div class="col-sm-12 help-block no-padding">
                <?php echo $form->error($model, 'album_description'); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$this->renderPartial('script/mainscript');
?>