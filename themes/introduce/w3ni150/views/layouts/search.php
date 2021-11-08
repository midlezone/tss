<?php $this->beginContent('//layouts/main'); ?>
<div class="clearfix layout">
    <div id="contentCol">
        <div id="centerCol">
            <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
            <?php
            echo $content;
            ?>
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
            ?>
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BOTTOM));
            ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>