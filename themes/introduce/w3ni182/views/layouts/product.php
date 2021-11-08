<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
    <div class=" col-xs-12 col-sm-3 col-md-3">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT));
        ?>
    </div>
    <div class="col-xs-12 col-sm-9 col-md-9">
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
<?php $this->endContent(); ?>