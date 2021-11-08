<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
    <div class="top-cont clearfix">
        <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
    </div>
    <div class="content">
        <div class="row">
            <?php echo $content; ?>
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
            ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>