<?php $this->beginContent('//layouts/main'); ?>
<div class="clearfix layout layout-2">
    <div class="page-head">
        <div class="container">
            <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
        </div>   
    </div>
    <div class="container">
        <div id="leftCol">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT));
            ?>
        </div>
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