<?php $this->beginContent('//layouts/main'); ?>
<div id="main-sp">
    <?php
    $this->renderPartial('//layouts/partial/pleft');
    ?>
    <div class="content-sp">
        <div class="width-main-sp">
            <div class="title-main-content-sp">
                <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
            </div>
            <?php echo $content; ?>
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
            ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>