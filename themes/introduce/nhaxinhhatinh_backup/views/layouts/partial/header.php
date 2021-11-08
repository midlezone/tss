<div id="header">
    <div class="top-header">
        <div class="container">
			   <div class="header-left">
				  <ul class="nav nav-pills nav-top">
					 <li class="phone">
						<span><i class="fa fa-phone"></i><strong>0988.656.940</strong></span>
					 </li>
					 <li class="email1">
						<span><i class="fa fa-envelope"></i><a href="kientrucrealhouse@gmail.com" target="_blank">nhaxinhhatinh.vn@gmail.com</a></span>
					 </li>
				  </ul>
				  <div class="header-contact" id="">
				  </div>
			   </div>
			   <div class="header-right">
				  <div class="topright_are">
					  <div class="searchbox">
							<?php
							$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX));
							?>
						</div>
					 <div class="share-links">
						<a target="_blank" rel="nofollow" class="share-facebook" href="https://www.facebook.com/kientrucrealhouse/" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i>
						</a>
					 </div>
				  </div>
			   </div>
			</div>
    </div>
    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_HEADER)); ?>
    <div class="cont-header">
        <div class="container">
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
                <div id='cssmenu'>
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN));
                    ?>
                </div>
               
                
            </div>
        </div>
    </div>
</div>
<div id="slider">
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BANNER_MAIN));
    ?>
</div>