<?php $this->beginContent('//layouts/main'); ?>
<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
<div class="container">
    <div class="clearfix layout">
        <div id="contentCol">
            <div id="centerCol">
                <?php
                echo $content;
                ?>
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER)); ?>
                <div class="row">
                    <div class="col-sm-8">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
                        ?>
                    </div>
                    <div class="col-sm-4 boxvideo">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2));
                        ?>
                    </div>
                </div>
                <div class="row block4">
                    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK4)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>