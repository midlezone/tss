<?php $this->beginContent('//layouts/main'); ?>
<style>
    #main .container{
        background: #fff; padding:0 15px;
    }
</style>
<div class="container">
    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK3)); ?>
    <div class="clearfix layout layout-2">
        <div id="leftCol">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT)); ?>
        </div>
        <div id="contentCol" class="lh">
            <div id="centerCol">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
                <div class="centerContent">
                    <?php
                    echo $content;
                    ?>
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>