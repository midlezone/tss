<?php $this->beginContent('//layouts/main'); ?>
<div id="left">
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT));
    ?>
</div>
<div id="content">
    <div class="title-main-content">
        <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
    </div>
    <?php
    echo $content;
    ?>
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
    ?>
</div>
<?php $this->endContent(); ?>