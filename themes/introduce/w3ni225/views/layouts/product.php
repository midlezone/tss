<?php $this->beginContent('//layouts/main'); ?>
<div class="top-cont clearfix">
    <div class="container">
        <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
    </div>
</div>
<?php echo $content; ?>
<?php
$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
?>
<?php $this->endContent(); ?>