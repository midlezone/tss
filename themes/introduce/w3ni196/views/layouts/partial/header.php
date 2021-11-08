<div id="header">
    <div class="cont-header">
        <div class="container">
            <div class="logo clearfix">
                <h1 class="clearfix"> 
                    <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                        <img alt="Về trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                    </a>
                </h1>
            </div>
            <div id='cssmenu'>
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN)); ?>
            </div>
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX)); ?>
        </div>
    </div>
</div>
