<?php
//
$array = array('' => Yii::t('product', 'choicategory'));
$option = $category->createOptionArray(ClaCategory::CATEGORY_ROOT, ClaCategory::CATEGORY_STEP, $array);
//unset($option[0]);
//
?>
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/effects/imagesloaded.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/effects/masonry.min.js');
?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ckeditor/ckeditor.js') ?>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/colorbox/style3/colorbox.css"></link>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/colorbox/jquery.colorbox-min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/jquery-ui.min.css"></script>
<script type="text/javascript">
    var ta = true;
    jQuery(document).ready(function () {
        $("#addCate").colorbox({width: "80%", overlayClose: false});
        //
        CKEDITOR.replace("CarInfo_description", {
            height: 400,
            language: '<?php echo Yii::app()->language ?>'
        });
        CKEDITOR.replace("CarInfo_attribute", {
            height: 400,
            language: '<?php echo Yii::app()->language ?>'
        });
    });
    jQuery(function ($) {
    });
</script>
<div class="row">
    <div class="col-xs-12 no-padding">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'car-form',
            'htmlOptions' => array('class' => 'form-horizontal'),
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
        ));
        ?>
        <div class="tabbable">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active">
                    <a data-toggle="tab" href="#basicinfo">
                        <?php echo Yii::t('product', 'product_basicinfo'); ?>
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#description_info">
                        <?php echo Yii::t('car', 'description_info'); ?>
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#imagevideo">
                        <?php echo Yii::t('product', 'product_imagevideo'); ?>
                    </a>
                </li>             
                <li>
                    <a data-toggle="tab" href="#panorama">
                        <?php echo Yii::t('car', 'image_panorama'); ?>
                    </a>
                </li>             
                <li>
                    <a data-toggle="tab" href="#carSeo">
                        <?php echo Yii::t('product', 'product_seo'); ?>
                    </a>
                </li>

            </ul>

            <div class="tab-content">
                <div id="basicinfo" class="tab-pane active">
                    <?php
                    $this->renderPartial('partial/tabbasicinfo', array('model' => $model, 'carInfo' => $carInfo, 'form' => $form, 'option' => $option));
                    ?>
                </div>
                <div id="description_info" class="tab-pane">
                    <?php
                    $this->renderPartial('partial/description_info', array('model' => $model, 'carInfo' => $carInfo, 'form' => $form, 'option' => $option));
                    ?>
                </div>
                <div id="imagevideo" class="tab-pane">
                    <?php
                    $this->renderPartial('partial/tabimagevideo', array('model' => $model, 'carInfo' => $carInfo));
                    ?>
                </div>
                <div id="panorama" class="tab-pane">
                    <?php
                    $this->renderPartial('partial/tabpanorama', array('model' => $model));
                    ?>
                </div>
                <div id="carSeo" class="tab-pane">
                    <?php
                    $this->renderPartial('partial/tabseo', array('model' => $model, 'carInfo' => $carInfo, 'form' => $form));
                    ?>
                </div>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!-- form -->
</div>
<?php
$this->renderPartial('script/mainscript', array('model' => $model));
?>