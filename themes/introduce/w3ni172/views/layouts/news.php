<?php $this->beginContent('//layouts/main'); ?>
<div class="top-cont clearfix">
    <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
</div>
<div class="left overleaf">
    <div id="maincontent">
        <div class="clearfix layout layout-2">
            <div class="col-md-9 clearfix" style="padding: 0px">
                <?php
                    echo $content;
                ?>
            </div>
            <div class="col-md-3 news-suggest" style="padding: 0px 0px 0px 20px;">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK8));
                ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<?php $this->endContent(); ?>