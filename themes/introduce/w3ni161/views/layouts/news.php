<?php $this->beginContent('//layouts/main'); ?>
<div class="main trong">
    <div class="post">
        <div class="container">
            <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
            <div class="left">
                <?php
                echo $content;
                ?>
            </div>
            <div class="right">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_RIGHT));
                ?>
            </div>
        </div>
    </div>
</div>  
<div class="clear"></div>
<?php $this->endContent(); ?>