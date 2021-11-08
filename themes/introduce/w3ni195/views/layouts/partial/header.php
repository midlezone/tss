<header id="header">
    <div class="cont-header">
        <div class="top-header">
            <div class="logo clearfix">
                <h1>
                    <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                        <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                        <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                    </a>
                </h1>
            </div>
        </div>
        <div class="nav">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
            ?>
        </div>
        <div class="bottom-header">
            <div class="top-left">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_LEFT));
                ?>
            </div>
            <div class="top-right">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_RIGHT));
                ?>
            </div>
        </div>
    </div>
</header>