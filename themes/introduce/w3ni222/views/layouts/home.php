<?php $this->beginContent('//layouts/main'); ?>

<?php echo $content; ?>
<div class="feature clearfix">
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
    ?>
</div>
<div class="left">
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2));
    ?>
    <div class=" registerfrm">
        <?php $this->widget('common.widgets.modules.courseRegisterEdu.courseRegisterEdu'); ?>
    </div>
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK6));
    ?>
</div>
<div class="right">
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3));
    ?>
    <div class="registerfrm hide-destop">
        <div class=" registerfrm">
            <?php $this->widget('common.widgets.modules.courseRegisterEdu.courseRegisterEdu'); ?>
        </div>
    </div>
    <div class="lichkhaigiang">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK5));
        ?>
    </div>

</div>
<div class="main-bottom">
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK4));
    ?>
</div>
<?php $this->endContent(); ?>