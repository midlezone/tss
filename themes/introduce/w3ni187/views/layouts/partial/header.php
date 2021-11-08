<div id="header" class="clearfix">
    <div class="logo clearfix">
        <h1  class="clearfix"> 
            <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                <img alt="Về trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
            </a>
            <span class="hide-text">
                <?php echo Yii::app()->siteinfo['site_title']; ?>
            </span> 
        </h1>
    </div>
    <div class="header-r clearfix">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_RIGHT));
        ?>
    </div>
</div>
<div id="nav">
    <div id="cssmenu">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN));
        ?>
    </div>
</div>