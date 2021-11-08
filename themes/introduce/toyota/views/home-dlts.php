<?php $this->beginContent('//layouts/main'); ?>
  
    <div id="contentCol">
        <div id="centerCol">
            <?php
            echo $content;
            ?>
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
        </div>
    </div>
<?php $this->endContent(); ?>