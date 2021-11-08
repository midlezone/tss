<div class="header" <?php if (Yii::app()->siteinfo['site_logo']) { ?>style="background-image: url(<?php echo Yii::app()->siteinfo['site_logo']; ?>);"<?php } ?>>
    <div class="logo">
        <h1 style="margin:0px;">
            <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
        </h1>
    </div>
    <div class="box-menu">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
        ?>
    </div>
</div>