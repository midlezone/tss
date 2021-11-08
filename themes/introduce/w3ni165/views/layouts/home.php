<?php $this->beginContent('//layouts/main'); ?>
<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
<div class="news-product">    
    <div class="row">
        <div class="col-xs-12">
            <div class="box ">
                <div class="box-cont">
                    <div class="grid_12">
                        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="solutions">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-cont">
                    <div class="grid_12">
                        <?php
                        echo $content;
                        ?>
                        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="customer">
    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3)); ?>
</div>

<?php $this->endContent(); ?>