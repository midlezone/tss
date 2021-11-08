<?php $this->beginContent('//layouts/main'); ?>
<div class="content clearfix">
    <div class="centerContent">
        <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
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
<?php $this->endContent(); ?>