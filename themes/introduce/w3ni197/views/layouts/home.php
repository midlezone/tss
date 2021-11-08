<?php
$this->beginContent('//layouts/main');
$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
echo $content;
$this->endContent();