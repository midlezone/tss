<?php $this->beginContent('//layouts/main'); ?>

<div class="main-content  clearfix">
    <div class="main-content-bg main-content-padding">
        <?php
        echo $content;
        ?>
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK3)); ?>
    </div>
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
    ?>
</div>
<?php $this->endContent(); ?>