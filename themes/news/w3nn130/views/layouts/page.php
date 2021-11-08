<?php $this->beginContent('//layouts/main'); ?>
<div class="box center alpha" style="width:630px">
    <?php echo $content; ?>
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
    ?>
</div>
<?php $this->endContent(); ?>