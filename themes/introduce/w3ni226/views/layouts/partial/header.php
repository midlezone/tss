<div id="header">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="top-header clearfix">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK1));
                    ?>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="logo clearfix">
                    <h1>
                        <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                            <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                        </a>
                        <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                    </h1>
                </div>
                <!--end-logo--> 
            </div>
            <div class="col-sm-9">
                <div class="header-r clearfix">
                    <div class="banner"></div>
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX));
                    ?>
                </div>
            </div>
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
    </div>
</div>
<div id="slider">
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_HEADER));
    ?>
</div>
