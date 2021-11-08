<div id="header">
    <div class="top-header">
        <div class="container clearfix">
			<div class="search-banner">
			<div class="form-search-banner">
			   <form method="get" action="/tim-kiem" class="searchform" role="search">
				<input type="text" name="t" class="ip-search-title" placeholder="Nhập nội dung bạn muốn tìm kiếm…">
				<!-- <input type="hidden" name="post_type" value="product"> -->
				<button type="submit" class="btn btn-search-banner">
				<span class="is_dektop">TÌM KIẾM</span><span class="is_mobile"><i class="icon-search"></i></span>
				</button>
			  </form>
			</div>
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
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN));
            ?>
        </div>
    </div>
</div>