<?php $this->beginContent('//layouts/main'); ?>
<div class="content content clearfix">
    <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
    <div class="right">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK1));
        ?>
    </div>
    <div class="left">
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
<?php $this->endContent(); ?><?php


