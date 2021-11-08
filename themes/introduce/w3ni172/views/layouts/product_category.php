<?php $this->beginContent('//layouts/main'); ?>
<div class="top-cont clearfix">
    <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
</div>
<div class="left overleaf">
    <div id="maincontent">
        <div class="clearfix layout layout-2">
            <div id="leftCol">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK8));
                ?>
            </div>
            <div id="contentCol" class="clearfix">
                <?php
                    echo $content;
                ?>
                <?php
//                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
                ?>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<?php $this->endContent(); ?>