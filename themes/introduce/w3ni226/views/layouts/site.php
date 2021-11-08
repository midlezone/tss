<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
    <div class="content clearfix">
        <div class="left">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT)); ?>
        </div>
        <div class="right">
            <div id="contentCol">
                <div id="centerCol">
                    <div class="centerContent">
                        <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
                        <?php
                        echo $content;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="featured-services">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK6)); ?>
    </div>
</div>
<?php $this->endContent(); ?>