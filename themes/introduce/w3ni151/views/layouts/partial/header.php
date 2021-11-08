<div class="header">
    <div class="bg-top">
        <div class="container clearfix">
            <div class="box-logo">
                <div class="logo">
                    <h1>
                        <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                            <img alt="về trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                            <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                        </a>
                    </h1>
                </div><!--end-logo-->
            </div>
            <div class="box-right-top">
                <div class="timkiem">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_RIGHT));
                    ?>
                </div> <!--end-timkiem-->
            </div> <!--end-box-right-top-->
        </div><!--end-container-->

    </div><!--end-bg-top-->
    <div class="bg-menu clearfix">
        <div class="container">
            <div class="menu-top">
                <div class="box-menu">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
                    ?>
                </div>
            </div><!--end-menu-top-->
        </div><!--end-container-->
    </div>
    <div class="banner-top">
        <div class="container">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER));
            ?>
        </div>
    </div>
</div>