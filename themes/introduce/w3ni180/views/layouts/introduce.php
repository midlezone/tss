<?php $this->beginContent('//layouts/main'); ?>
<div class="col-xs-12 clearfix">
    <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
</div>
<div class="left-col clearfix">
    <?php
    echo $content;
    ?>
</div>
<div class="right-col">
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_RIGHT));
    ?>
</div>
<?php $this->endContent(); ?>