<?php $this->beginContent('//layouts/main'); ?>
<style>
    #main .container{
        background: #fff; padding:0 15px;
    }
</style>
<div class="container">
    <div class="banner">
    </div>
    <div class="content clearfix">
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