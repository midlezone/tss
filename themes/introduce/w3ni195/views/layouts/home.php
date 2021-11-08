
<?php $this->beginContent('//layouts/main'); ?>
<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
<?php

echo $content;
?>
<?php $this->endContent(); ?>