<?php $this->beginContent('//layouts/main'); ?>
<?php $this->renderPartial('//layouts/partial/promotion'); ?>
<div class="wrap">
    <div class="pagecontent">
        <div class="clearfix layout">
            <div id="contentCol">
                <div id="centerCol">
                    <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
                    <?php echo $content; ?>
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>