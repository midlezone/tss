<div class="widget widget-box">
    <div class="widget-header">
        <h4><?php echo Yii::t('car', 'car_create'); ?></h4>
        <div class="widget-toolbar no-border">
            <a style="" class="btn btn-xs btn-primary" id="savecar" href="#" validate="<?php echo Yii::app()->createUrl('car/car/validate'); ?>">
                <i class="icon-ok"></i>
                <?php echo Yii::t('common', 'save') ?>
            </a>
        </div>
    </div>
    <div class="widget-body no-padding">
        <div class="widget-main">
            <?php $this->renderPartial('_form', array('model' => $model, 'category' => $category, 'carInfo' => $carInfo)); ?>
        </div>
    </div>
</div>