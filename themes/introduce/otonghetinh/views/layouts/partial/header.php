<div id="header">
    <div class="top-header clearfix">
        <div class="container">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_LEFT));
            ?>
        </div>
    </div>
    
    <div class="cont-header clearfix">
        <div class="container">
            <div class="logo">
                    <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                        <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                        <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                    </a>
            </div>
            <div class="cont-header-r clearfix">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX));
                ?>
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN));
                ?>
            </div>
        </div>
    </div>

</div>