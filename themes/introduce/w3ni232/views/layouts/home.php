
<?php $this->beginContent('//layouts/main'); ?>
<?php
echo $content;
?>
<div class="banner-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1)); ?>

            </div>
            <div class="col-sm-6">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2)); ?>

            </div>

            <div class="col-sm-3">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3)); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK4)); ?>
<div class="bottom-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK5)); ?>
            </div>
            <div class="col-sm-6">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK6)); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>