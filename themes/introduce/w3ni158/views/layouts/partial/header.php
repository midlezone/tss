<div class="header">
    <div class="box-top clearfix">
        <div class="left-top">
            <div class="logo">
                <h1>
                    <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                        <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                        <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                    </a>
                </h1>
            </div><!--end-logo-->
            <div class="header_banner">
            <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_HEADER));
                ?>
            </div>
        </div>
        <div class="right-top">
            <div class="box-right">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_RIGHT));
                ?>
            </div><!--end-right-top-->
        </div>
    </div>
    <div class="bg-border-patten"></div>
    <div class="bg-menu">
        <div class="box-menu">
            <div class="icon-bg"><i class="title-img-text-left"></i></div>
            <div class="icon-bg"> <i class="title-img-text-right"></i></div>
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
            ?>
        </div>
    </div>
    <div class="banner-top">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_BOTTOM));
        ?>
    </div>
</div>