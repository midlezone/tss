<div id="header">
    <div class="top-header">
        <div class="container">
			   <div class="header-left">
				  <ul class="nav nav-pills nav-top">
					 <li class="phone">
						<span><i class="fa fa-phone"></i><strong>0988.713.777</strong></span>
					 </li>
					 <li class="email1">
						<span><i class="fa fa-envelope"></i><a href="kientrucrealhouse@gmail.com" target="_blank">nhaxinhhatinh.vn@gmail.com</a></span>
					 </li>
				  </ul>
				  <div class="header-contact" id="">
				  </div>
			   </div>
			    <div class="logo ">
                    <h1  class="clearfix"> 
                        <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
						<img alt="Về trang chủ" src="/mediacenter/media/images/1198/logo/logo.jpg">
                        </a>
                        <span class="hide-text">
                            <?php echo Yii::app()->siteinfo['site_title']; ?>
                        </span> 
						
                    </h1>
                </div>
				
			   <div class="header-right">
				  <div class="topright_are">
					  <div class="searchbox">
							<?php
							$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX));
							?>
						</div>
					 
				  </div>
			   </div>
		</div>
    </div>
    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_HEADER)); ?>
    <div class="cont-header">
        <div class="container">
            <div class="container clearfix">
               
				
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