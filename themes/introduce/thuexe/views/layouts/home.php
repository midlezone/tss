

<?php $this->beginContent('//layouts/main'); ?>
<?php
echo $content;
?>
<div class="top-main">
    <div class="container">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER)); ?>
    </div>
</div>

<div class="center-main">
    <div class="container">
        <div class="center-main-left "> 
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT)); ?>
            <div class="bottom-center-main clearfix">
                    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2)); ?>
            </div>
        </div>
        <div class="center-main-right">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_RIGHT)); ?>
        </div>
    </div>
</div>
<div class="footer-main">
    <div class="container">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BOTTOM)); ?>
    </div>
</div>
<?php $this->endContent(); ?>