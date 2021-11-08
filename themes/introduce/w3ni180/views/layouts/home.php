<?php $this->beginContent('//layouts/main'); ?>
<div class="wrap-banner clearfix">
    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1)); ?>
</div>
<div class="box-product clearfix">
    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2)); ?>
</div>
<div class="banner_full_width">
    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3)); ?>
</div>
<div class="box-product clearfix">
    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK4)); ?>
</div>
<div class="box-introdce clearfix">
    <div class="col-sm-8 left-introduce">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK5)); ?>
    </div>
    <div class="col-sm-4">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK6)); ?>
    </div>
</div>
<div class="clearfix layout layout-2">
    <div id="contentCol">
        <div id="centerCol">
        <?php
        echo $content;
        ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>