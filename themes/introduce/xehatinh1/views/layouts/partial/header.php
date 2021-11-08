<div id="header">
    <div class="top-header">
        <div class="container clearfix">
			<div class="address-content">
				<i class="fa fa-map-marker"></i>
				<span>Số 06 - Phan Đình Phùng - Thành phố Hà Tĩnh</span>
				
			</div>
			<div class="tel">
				<a href="tel:0379468468"><i class="fa fa-phone"></i>0379.468.468</a>
			</div>
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_HEADER)); ?>
        </div>
    </div>
    <div class="cont-header">
        <div class="container clearfix">
            <div class="logo clearfix">
                <h1  class="clearfix"> 
                    <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                        <img alt="Về trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                    </a>
                    <span class="hide-text">
                        <?php echo Yii::app()->siteinfo['site_title']; ?>
                    </span> 
                </h1>
            </div>
             <h3 class="hotline_top">0373 114 114</h3>
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN));
            ?>

        </div>
    </div>
</div>