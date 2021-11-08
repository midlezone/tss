<?php $this->beginContent('//layouts/main'); ?>
<?php echo $content; ?>
<div class="general">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
                ?>
            </div>
            <div class="col-sm-4">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2));
                ?>
            </div>
        </div>
    </div>
</div>


<?php
$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3));
?>
<?php
$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK4));
?>

<div class="news clearfix">
    <div id="triangle-down"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 left-content">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK5));
                ?>
            </div>
            <div class="col-sm-4 right-content">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK6));
                ?>
            </div>
        </div>
    </div>
</div>
<div class="banner_fullwidth container">
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BOTTOM));
    ?>
</div>

<?php
$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK7));
?>

<?php $this->endContent(); ?>