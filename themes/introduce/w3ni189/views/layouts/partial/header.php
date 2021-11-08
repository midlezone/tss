 <div class="block-top">
	<div class="container">
		<ul class="hidden-xs">
			<li><a href="/">Trang chủ</a></li>
			<li><a href="/san-pham/">Sản phẩm</a></li>
			<li><a href="/gioi-thieu">Giới thiệu</a></li>
			<li><a href="/tuyen-dung">Tuyển dụng</a></li>
			<li><a href="/tin-tuc-nc,6114">Tin tức</a></li>
			<li><a href="/lien-he">Liên hệ</a></li>
		</ul>
		<div class="hidden-lg hidden-md hidden-sm box-menu">
			<ul class="nav" role="tablist">
	            <li class="dropdown">
	                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                Menu<span class="caret"></span>
	                </a>
	            	<ul class="dropdown-menu">
	            	    <li><a href="/">Trang chủ</a></li>
						<li><a href="/danh-sach-san-pham/" class="active">Sản phẩm</a></li>
						<li><a href="/gioi-thieu">Giới thiệu</a></li>
						<li><a href="/tuyen-dung">Tuyển dụng</a></li>
						<li><a href="/tin-tuc-nc,6114">Tin tức</a></li>
						<li><a href="/lien-he">Liên hệ</a></li>
	                </ul>
	            </li>
	        </ul>
	    </div>
		  </div>
</div>
<div class="header">

	
    <div class="bg-top-logo">
        <div class="container clearfix">
            <div class="box-logo">
                <div class="logo clearfix">
                    <h1>
                        <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                            <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                        </a>
                        <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                    </h1>
                </div>
            </div>

            <div class="header-r clearfix">
				<div class="timkiem">
				   <div class="box-hotline"><img src="/themes/introduce/w3ni189/css/img/icon_hotline.png" alt=""> <span>0977 611 599 </span></div>
				</div>
				
            </div>
        </div>
    </div>
    <div class="bg-menu">
        <div class="container clearfix">
            <div id='cssmenu'>
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN));
                ?>
            </div>
        </div>
    </div>
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT));
    ?>
</div>
