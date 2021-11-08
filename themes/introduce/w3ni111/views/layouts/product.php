<?php $this->beginContent('//layouts/main'); ?>
<div class="fullpage <?php echo (Yii::app()->controller->action->id == 'detail') ? 'detail' : ''; ?>">
    <section id="ef-page-header">
        <div id="ef-head-inner">
            <div id="ef-page-title">
                <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
            </div>
            <div id="ef-page-controls">
            </div>
        </div>
    </section>

    <section id="ef-page">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER));
        ?>
        <div class="ef-page-inner">
            <?php echo $content; ?>
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
            ?>
        </div>
    </section>
</div>
<?php $this->endContent(); ?>