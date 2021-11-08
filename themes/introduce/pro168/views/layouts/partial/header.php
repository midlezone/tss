<div id="header">
	
    <div class="container">
        
        <div class="cont-header clearfix">
            <div class="logo  ">
                <h1>
                    <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                        <img alt="Về trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                        <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                    </a>
                </h1>
            </div>
            <div class="banner">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_HEADER));
                ?>
            </div>
            <div class="searchbox">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX));
                ?>
            </div>
        </div>
    </div>
</div>
<div id="nav-menu">
    <div class="container">
        <div id="cssmenu">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN));
            ?>
        </div>
    </div>
</div>
