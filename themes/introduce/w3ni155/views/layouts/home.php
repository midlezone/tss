<?php $this->beginContent('//layouts/main'); ?>
<div class="clearfix layout">
    <div id="contentCol" class="fixrwd2">
        <div class="banner-top clearfix">
            <div class="slideshow">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1)); ?>
            </div>
            <div class="guide">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2)); ?>
            </div>
        </div>
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
        <div id="centerCol">
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