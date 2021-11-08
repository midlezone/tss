<?php $this->beginContent('//layouts/main'); ?>
<div class="container clearfix">
    <div class="left">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT));
        ?>
    </div>
    <div class="right">
        <div class="content warp">
            <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
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