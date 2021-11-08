<?php $this->beginContent('//layouts/main'); ?>
<div class="col-xs-12 clearfix">
    <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
</div>
<div class="clearfix">
    <?php
    echo $content;
    ?>
</div>
<?php $this->endContent(); ?>