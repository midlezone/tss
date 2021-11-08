<?php $this->beginContent('//layouts/main'); ?>
<div class="welcome">
    <div class="container">
        <?php echo $content; ?>
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1)); ?>
    </div>
</div>

<div class="fastfood">
    <div class="container">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2)); ?>
    </div>
</div>

<div class="categories-cont">
    <div class="container">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3)); ?>
    </div>
</div>
<div class="new-product">
    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK4)); ?>
</div>

<?php $this->endContent(); ?>