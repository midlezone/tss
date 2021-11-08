<?php $this->beginContent('//layouts/main'); ?>
<div class="cont">
    <div id="row">
        <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
        <?php
        echo $content;
        ?>
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
        ?>
    </div>
</div>
<?php $this->endContent(); ?>