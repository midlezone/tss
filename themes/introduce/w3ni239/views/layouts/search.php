<?php $this->beginContent('//layouts/main'); ?>
<?php
echo $content;
?>
<div class="main-content main-content-bg main-content-padding clearfix">
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
    ?>
</div>
<?php $this->endContent(); ?>