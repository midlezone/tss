<?php $this->beginContent('//layouts/main'); ?>
<div class="clearfix layout layout-2-right">
    <div id="contentCol">
        <div id="rightCol">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_RIGHT));
            ?>
        </div>
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
<?php
$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BOTTOM));
?>
<?php $this->endContent(); ?>