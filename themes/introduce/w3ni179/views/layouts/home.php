<?php $this->beginContent('//layouts/main');
echo $content;
?>
<div class="slider">
<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1)); ?>
</div>
<div class="box introduce">
<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2)); ?>
</div>
<?php $this->endContent(); ?>