<div class="header">
   
    <!--end-bg-top-->
    <div class="bg-box-top">
        <div class="box-top ">
            <div class="container clearfix">
                <div class="logo">
                    <h1>
                        <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                            <img alt="Về trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                            <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                        </a>
                    </h1>
                </div>
                <div class="box-right clearfix">
                    <div class="box-phone">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_BOTTOM));
                        ?>
                    </div>
                    <div class="timkiem">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER));
                        ?>
                    </div>
                    <!--end-timkiem--> 
                </div>
                <!--end-box-right--> 
            </div>
            <!--end-container-->
            <div class="box-menu">
                <div class="container">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
                    ?>
                </div>
                <!--end-container--> 
            </div>
            <!--end-box-menu--> 
        </div>
        <!--end-box-top--> 
    </div>
    <!--end-bg-box-top-->
    <div class="banner-top">
        <div class="container">
            <div class="grid_12">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
                ?>
            </div>
        </div>

    </div>
</div>