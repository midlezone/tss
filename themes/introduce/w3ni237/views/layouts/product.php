<?php $this->beginContent('//layouts/main'); ?>
<div class="clearfix layout">
    <div id="contentCol">
        <div id="centerCol">
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
</div>
<?php $this->endContent(); ?>