<?php $this->beginContent('//layouts/main'); ?>
<div class="content">
    <div class="box-breadcrumb">
        <div class="container ">
            <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
        </div>
    </div>

    <div class="left">
        <div class="container ">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT));
            ?>
        </div>
    </div>
    <div class="right">
        <div class="container ">
            <div id="contentCol">
                <div id="centerCol">
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
</div>
<div class="bottom-main">
    <div class="container">
        <div class="partner">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK5)); ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>