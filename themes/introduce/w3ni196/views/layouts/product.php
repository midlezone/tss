<?php $this->beginContent('//layouts/main'); ?>
<div class="box-breadcrumb">
    <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
</div>
<div class="container">
    <div class="content">
        <div class="right">
            <div class="content">
                <div class="product">
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
</div>
<?php $this->endContent(); ?>