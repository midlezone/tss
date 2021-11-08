<?php $this->beginContent('//layouts/main'); ?>
<!--<div class="banner-trong">
    <a href="#" title="#"><img src="css/img/banner-trong.jpg" alt="#"></a>
</div>-->
<?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
<div class="content clearfix">
    <div class="left left-realestate">
        <?php $this->widget('common.widgets.modules.realestateProjectModule.realestateProjectModule'); ?>
    </div>
    <div class="right">
        <div id="contentCol">
            <div id="centerCol">
                <div class="centerContent">
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