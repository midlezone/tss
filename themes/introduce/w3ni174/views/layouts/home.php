<?php $this->beginContent('//layouts/main'); ?>
<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
<div class="container">
    <div class="service">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER)); ?>
    </div>
    <div class="feedback">
        <div class="row">
            <div class="col-sm-6">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1)); ?>
            </div>
            <div class="col-sm-6">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2)); ?>
            </div>
        </div>
    </div>
    <div class="featured-photos">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3)); ?>
    </div>
    <div class="list-news clearfix">
        <div class="row">
            <div class="col-sm-8">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK4)); ?>
            </div>
            <div class="col-sm-4">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK5)); ?>
            </div>
        </div>
    </div>
    <div class="featured-services">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK6)); ?>
    </div>

</div>

<?php
echo $content;
?>
<?php $this->endContent(); ?>