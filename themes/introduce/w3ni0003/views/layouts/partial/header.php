<div id="header">
    <div class="container">
        <div class="head">
            <div class="logo">
                <h1 class="img-logo">
                    <a href="<?php echo Yii::app()->homeUrl; ?>">
                        <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                    </a> 
                </h1>
            </div>
            <div class="baner-head">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_RIGHT));
                ?>
            </div>
        </div>
    </div>
    <div class="menu-top">
        <div class="container">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
            ?>
        </div>
    </div><!--end-nav-->
</div>