<div class="header">
    <div class="bg-box-top">
        <div class="box-top ">
            <div class="container clearfix">
                <div class="logo">
                    <h1>
                        <a href="/" title="Kia Nghệ An">
							 <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                            <span class="hide-text">Kia Nghệ An</span>
                        </a>
                    </h1>
                </div>
                <div class="header-r">
                    <div class="right-bg-top">                       
                        <div class="box-phone clearfix">
							<p><img alt="" src="http://kianghean.com.vn/data/media/1007/images/top1.png" style="height: 0px;"></p>

                            <?php
                            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_LEFT));
                            ?>
                        </div><!--end-phone--> 
                    </div>
                    <div class="box-right clearfix">
                        
						<p><img alt="" src="http://kianghean.com.vn/data/media/1007/images/kianghean.png" style="width: 390px; height: 60px;"></p>
                    </div>
                </div>
            </div>      
            <div class="box-menu">
                <div class="container">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
                    ?>
                </div>
                <!--end-container--> 
            </div><!--end-box-menu--> 
        </div><!--end-container-->                                                                                                                        
    </div>    <!--end-box-top-->
    <!--end-bg-box-top-->
	<div id="holderCMS">
		<div class="banner-top">
			<?php
			$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
			?>
		</div>
	</div>
</div>