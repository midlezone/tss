<div id="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="logo clearfix">
                    <h1 class="clearfix">
                        <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                            <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                            <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                        </a>
                    </h1>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="header-r clearfix">
                    <div class="top-header clearfix">
                        <div class="top-header-r clearfix">
                            <?php
                            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX));
                            ?>
                            <?php
                            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_RIGHT));
                            ?>
                        </div>
                    </div>

                </div>
                <div id="nav">
                    <div id='cssmenu'>
                        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
