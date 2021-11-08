<div id="header" class="clearfix">
    <div class="logo">
        <h1>
            <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                <img alt="Về trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
            </a>
        </h1>
    </div>
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
    ?>
    
</div>
