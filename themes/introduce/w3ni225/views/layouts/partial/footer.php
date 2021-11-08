<div id="footer">
    <div class="box-facebook clearfix">
        <div class="container">
            <div class="col-xs-6">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                ?>    
            </div>
            <div class="col-xs-6">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK5));
                ?> 
            </div>
            
        </div>
    </div>
    <div class="site-map">
        <div class="container">
            <div class="row">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                ?>
            </div>
        </div>
    </div>
    <div class="bottom-footer clearfix">
        <div class="container">
            <div class=" col-sm-8 col-md-9">

                <div class="logo clearfix">
                    <h1 class="clearfix"> 
                        <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                            <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                        </a>
                        <br>
                        <span><?php echo Yii::app()->siteinfo['site_title']; ?></span> 
                    </h1>
                </div>
                <div class="address">
                    <?php
                    if (Yii::app()->siteinfo['footercontent']) {
                        echo Yii::app()->siteinfo['footercontent'];
                    }
                    ?>
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK6));
                ?>
				 <div class="designby"><a href="http://tss-software.com.vn/" title="Thiết kế web, thiết kế web chuyên nghiệp" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>
    			       
            </div>
        </div>
    </div>
</div>





