<div class="header">
    <div class="bg-top-logo">
        <div class="container clearfix">
            <div class="box-logo">
                <div class="logo">
                    <h1><a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                            <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                            <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                        </a></h1>
                </div>
                <!--end-logo--> 
            </div>
            <!--end-box-logo-->
            <div class="header-r">
                <div class="banner  clearfix"><?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_RIGHT));
                    ?></div>
            </div>
        </div>
        <!--end-container--> 
    </div>
    <!--end-bg-top-logo-->
    <div class="bg-menu">
        <div class="container clearfix">
            <div id="cssmenu">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
                ?>
            </div>
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_BOTTOM));
            ?>
            <!--end-menu-top--> 
        </div>
        <!--end-container--> 
    </div>
    <!--end-bg-menu-->
    <div class="banner-top-top ">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
        ?>
    </div>
</div>

