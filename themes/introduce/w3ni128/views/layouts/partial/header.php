<div class="header" id="header">
    <div class="top">
        <div class="bg-menu-top">
            <div class="container">
                <div class="box-top clearfix">
                    <div class="logo">
                        <h1>
                            <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                                <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                                <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                            </a>
                        </h1>
                    </div><!--end-logo-->
                    <div class="right-menu">
                        <div class="box-menu">
                            <?php
                            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
                            ?>
                        </div><!--end-box-menu-->  
                        <div class="timkiem">
                            <?php
                            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_RIGHT));
                            ?>
                        </div><!--timkiem-->
                    </div> <!--end-right-menu--> 
                </div><!--end-box-top-->
            </div><!--end-container-->
        </div>
        <div class="top-img">
            <div class="container">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER));
                ?>
            </div>
        </div>
    </div>
</div>