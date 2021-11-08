<div class="row">
    <div class="col-sm-7">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_RIGHT));
        ?>
    </div>
    <div class="col-sm-5">
        <?php
        if (Yii::app()->siteinfo['contact']) {
            ?>
            <div class="sitecontact"><?php echo Yii::app()->siteinfo['contact']; ?></div>
        <?php } ?>
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
        ?>
    </div>
</div>