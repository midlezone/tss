<div class="header">
    <div class="header-top">
        <div class="container clearfix head-top-contain">
            <div class="header-top-l"><span class="head-text">Support Online : <span>(+34) 93 719 2750<span></span></div>                        
            <div class="header-top-r">
                <div class="box-right-top" style="">
                    <div class="timkiem">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_RIGHT));
                        ?>
                    </div> <!--end-timkiem-->
                </div>                
            </div>            
        </div>
    </div>
    <div class="bg-top">
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
            <div class="menu-top">
                <div class="box-menu">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
                    ?>
                </div>
            </div>
             <!--end-box-right-top-->
        </div><!--end-container-->

    </div><!--end-bg-top-->
    
    <div class="banner-top">        
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER));
        ?>        
    </div>
</div>