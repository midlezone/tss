
<?php $this->beginContent('//layouts/main'); ?>
<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1)); ?>
<div class="box-general">
    <?php
    echo $content;
    ?>
    <div class="row">
        <div class="col-sm-8">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2)); ?>
        </div>
        <div class="col-sm-4">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3)); ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>