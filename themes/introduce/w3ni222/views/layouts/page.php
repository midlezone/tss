<?php $this->beginContent('//layouts/main'); ?>
<!--<div class="banner-trong">
    <a href="#" title="#"><img src="css/img/banner-trong.jpg" alt="#"></a>
</div>-->
<div class="content clearfix">
    <div class="left">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT));
        ?>
    </div>
    <div class="right">
        <div id="contentCol">
            <div id="centerCol">
                <div class="centerContent">
                    <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
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
</div>
<?php $this->endContent(); ?>