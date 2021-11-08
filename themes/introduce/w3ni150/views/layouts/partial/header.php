<div class="header" id="header">
    <div class="bg-top-logo">
        <div class="box-top">
            <div class="container clearfix">
                <div class="box-logo">
                    <div class="logo">
                        <h1>
                            <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                                <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                                <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                            </a>
                        </h1>
                    </div><!--end-logo--> 
                </div>
            </div><!--end-container-->
            <div class="bg-menu">
                    <div class="container clearfix">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
                        ?>
                    </div><!--end-container-->
            </div><!--end-bg-menu-->
        </div><!--end-box-top-->
    </div><!--end-bg-top-logo-->
</div>