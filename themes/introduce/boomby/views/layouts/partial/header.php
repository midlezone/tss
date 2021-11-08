<div id="header">

   <div class="top-header">
        <div class="container">
		  <div class="f-mmb box-dlmb">
                <a href="https://apps.apple.com/us/app/l%C3%AA-v%C3%A2n-anh/id1494257098" class="btn-mb1 btn-dls  spr linkios" target="_blank" style="display: none;"></a>
                <a href="https://play.google.com/store/apps/details?id=com.oceanus.lva" class="btn-mb1 btn-dls  spr linkandorid" target="_blank" style="display: inline;"></a>
            </div>
            <div class="top-right">
                <div class="login clearfix">
                    <ul>
                        <?php if (Yii::app()->user->isGuest) { ?>
                            <li class="icon-login">
                                <a href="<?php echo Yii::app()->createUrl('login/login/login'); ?>" id="w3nlogin">
                                    <?php echo Yii::t('common', 'login'); ?>
                                </a>
                            </li>
                          
                        <?php } else { ?>
                            <li class="icon-register" id="accountInfor">
                                <a class="userName" id="menuNameUser" class="" rel="nofollow" onclick="showMenuUser()">
                                    <i class="fa fa-user-circle-o" style="font-size:24px"></i>
                                    <span><?php echo Yii::app()->user->name;?></span>
                                </a>
                                <ul class="userInfor" id="menuUserSetting" style="display:none">
                                    <i class="fa fa-sort-asc" style="font-size:24px"></i>
                                    <li>
                                        <a href="<?php echo Yii::app()->createUrl('profile/profile/userinfo'); ?>">
                                            <i class="fa fa-user-circle-o"></i>
                                            <span>Thông tin tải khoản </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Yii::app()->createUrl('profile/profile/order'); ?>">
                                            <i class="fa fa-calendar-check-o"></i>
                                            <span>Theo giỏi đơn hàng</span>
                                        </a>
                                    </li>
                                
                                    <li class="hasBorder_3vxk">
                                        <a href="<?php echo Yii::app()->createUrl('login/login/logout'); ?>">
                                            <i class="fa fa-sign-out"></i>
                                            <span><?php echo Yii::t('common', 'logout'); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
	
    <div class="main-header-slogan-wrap">
       <h3>Lựa chọn <strong>trải nghiệm</strong> cảm nhận và <strong>chia sẻ.</strong>™</h3>
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
					<a class="main-nav-store-link" href="/san-pham">
						<img src="//cdn.shopify.com/s/files/1/0404/9121/t/59/assets/returntostoreicon.svg?15083666803478346094">
					   <span class="boom-product-page-return-link">Quay Lại Trang sản phẩm</span>
					  </a>
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN));
                    ?>
                </div>
              	 <div class="main-header-contact-section">
                       <ul id="utility-nav">
                          <li class="contact-section-iconlink"><a class="contact-section-iconlink" id="header-account-link2" 
						  href="/san-pham" title="Account">
						  <img src="http://levananh.com/themes/introduce/boomby/css/img/product1.png"><span class="header-account-button-span">Shop</span></a></li>
                           
                         <li class="contact-section-iconlink empty-cart-link"><a class="contact-section-iconlink" id="occupied-cart-link" 
						 href="/gio-hang"><img src="http://levananh.com/themes/introduce/boomby/css/img/cart1.png">
						 <span class="header-account-button-span">Cart</span> </a></li>
                         
                       </ul>
                       <!--utility-nav-->
                       <div class="boom-header-call-section">
                          <h5>Hotline  </h5>
                          <!-- <h5>e: info@boombycindyjoseph.com</h5>-->
                          <h5>090.793.8866</h5>
                       </div>
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
