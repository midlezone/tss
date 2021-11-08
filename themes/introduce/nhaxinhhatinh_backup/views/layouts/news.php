<?php $this->beginContent('//layouts/main'); ?>
<style>
    #main .container{
        background: #fff; padding:0 15px;
    }
</style>
<div class="container">
    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK3)); ?>

    <div class="content clearfix" style="margin-top: 20px;">
        <div class="left">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT));
            ?>
        </div>
        <div class="right">
            <div id="contentCol">
                <div id="centerCol">
                    <div class="centerContent">
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
        </div>
    </div>
</div>
<?php $this->endContent(); ?>