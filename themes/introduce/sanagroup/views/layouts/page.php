<?php $this->beginContent('//layouts/main'); ?>
<div class="clearfix">
    <div class="left">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT));
        ?>
    </div>
    <div class="right">
        <div class="content">
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