
<div class="header">
    <div class="bg-top-logo">
        <div class="container clearfix">
            <div class="box-logo">
                <div class="logo clearfix">
                    <h1>
                        <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                            <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                        </a>
                        <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                    </h1>
                </div>
            </div>

            <div class="header-r clearfix">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX));
                ?>
            </div>
        </div>
    </div>
    <div class="bg-menu">
        <div class="container clearfix">
            <div id='cssmenu'>
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN));
                ?>
            </div>
        </div>
    </div>
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT));
    ?>
</div>
