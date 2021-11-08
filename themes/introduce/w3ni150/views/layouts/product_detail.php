<?php $this->beginContent('//layouts/main'); ?>
        <div class="centerContent">
            <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
            <?php
            echo $content;
            ?>
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
            ?>
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BOTTOM));
            ?>
        </div>
<?php $this->endContent(); ?>