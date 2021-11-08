<?php
$this->beginContent('//layouts/main');
?>
<div class="container">
    <div class="top-banner">
        <div class="row">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1)); ?>
        </div>
    </div>
    <div class="option-color">
        <div class="row">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2)); ?>
        </div>
    </div>
    <div class="featured-products">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3)); ?>
    </div>
    <div class="bottom-main">
        <div class="row">
            <div class="col-xs-4">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK4)); ?>
            </div>
            <div class="col-xs-4">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK5)); ?>
            </div>
            <div class="col-xs-4">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK6)); ?>
            </div>
        </div>
    </div>
</div>
<?php
echo $content;
$this->endContent();
