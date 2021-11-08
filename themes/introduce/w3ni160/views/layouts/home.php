<?php $this->beginContent('//layouts/main'); ?>
<div class="clearfix layout layout-2">
    <div id="leftCol">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT)); ?>
    </div>
    <div id="contentCol">
        <div id="centerCol">
        <?php
        echo $content;
        ?>
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>