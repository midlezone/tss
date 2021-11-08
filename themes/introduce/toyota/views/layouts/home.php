
<?php $this->beginContent('//layouts/main'); ?>
<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
<div class="customer">
    <?php
    echo $content;
    ?>
</div>

<?php $this->endContent(); ?>