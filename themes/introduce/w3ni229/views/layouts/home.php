<?php $this->beginContent('//layouts/main'); ?>
<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>

<?php
echo $content;
?>

<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1)); ?>
<div class="strategy-product">
    <div class="container">
        <div class="title title_1">
            <h2>
                <a href="#" class="ms-tittle-product">Ngành nghề khai thác</a>
            </h2>
        </div>
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK4)); ?>
    </div>
</div>

<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3)); ?>

<div class="bottom-main">
    <div class="container">
        <div class="partner">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK5)); ?>
        </div>
    </div>
</div>

<?php $this->endContent(); ?>