<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
    <div class=" col-xs-12 col-sm-7 col-md-7">
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
    <div class="col-xs-12 col-sm-5 col-md-5">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_RIGHT));
        ?>
    </div>
</div>
<?php $this->endContent(); ?>