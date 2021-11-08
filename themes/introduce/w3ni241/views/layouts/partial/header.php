<?php $themUrl = Yii::app()->theme->baseUrl; ?>
<div id="header">
    <div class="container">
        <div class="logo">
            <h1>
                <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                    <img alt="Về trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                    <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                </a>
            </h1>
        </div>
        <div class="connected">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BANNER_MAIN));
            ?>
        </div>
    </div>
</div>
<div id="nav">
    <div class="container">
        <div id='cssmenu'>

            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN));
            ?>

        </div>
        <div class="box-timkiem">
            <div class="icon-tk"> </div>
            <div class="timkiem">
                <div class="searchbox">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>