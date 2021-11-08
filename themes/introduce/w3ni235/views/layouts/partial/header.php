<div id="header">
    <div class="top-header-ct clearfix">
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
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_LEFT));
        ?>
        <div class="banner-top">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
            ?>
        </div>
        <div class="searchbox">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX));
            ?>
        </div>
    </div>
    <div class="cont-header clearfix">

        <div id="cssmenu">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN));
            ?>
        </div>
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_RIGHT));
        ?>
    </div>
</div>