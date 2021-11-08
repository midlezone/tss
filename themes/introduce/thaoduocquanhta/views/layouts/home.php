<?php $this->beginContent('//layouts/main'); ?>
<div class="left">
    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT)); ?>
</div>
<div class="right">
    <div class="slider">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
    </div>
    <div class="content">
        <?php
        echo $content;
        ?>
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
        ?>
    </div>
</div>
<?php $this->endContent(); ?>