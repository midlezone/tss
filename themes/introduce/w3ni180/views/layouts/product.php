<?php $this->beginContent('//layouts/main'); ?>
<div class="col-xs-12 clearfix">
    <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
</div>
<div class="col-sm-12 clearfix">
    <div class="left-col clearfix">
        <?php
        echo $content;
        ?>
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
        ?>
    </div>
    <div class="right-col">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_RIGHT));
        ?>
    </div>
</div>
<?php $this->endContent(); ?>