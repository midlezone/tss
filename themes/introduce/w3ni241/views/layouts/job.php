<?php $this->beginContent('//layouts/main'); ?>
<div class="center-main">
    <div class="container">
        <div class="center-main-left ">
            <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
            <?php
            echo $content;
            ?>
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
            ?>
        </div>
        <div class="center-main-right">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_RIGHT)); ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>