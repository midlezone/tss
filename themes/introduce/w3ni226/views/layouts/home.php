<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
    <div class="service">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER)); ?>
    </div>
</div>
<?php
echo $content;
?>
<?php $this->endContent(); ?>