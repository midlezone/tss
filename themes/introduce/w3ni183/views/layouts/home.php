<?php $this->beginContent('//layouts/main'); ?>

<?php echo $content; ?>
<div class="service">
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
    ?>
</div>
<div class="service courses">
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2));
    ?>
</div>
<div class="featured-photos">
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3));
    ?>
</div>
<div class="bottom-main">
    <div class="row">
        <div class="col-sm-8">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK4));
            ?>
        </div>
        <div class="col-sm-4">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK1));
            ?>
            <?php $this->widget('common.widgets.modules.courseRegisterEdu.courseRegisterEdu'); ?>
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK5));
            ?>
        </div>
    </div>
</div>
<div class="banner-bottom">
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK6));
    ?>
</div>
<div class="doi-tac">
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK7));
    ?>
</div>

<?php $this->endContent(); ?>