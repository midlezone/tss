<div id="footer" class="footer">
    <div class="container ">
        <div class="box clearfix">
            <div class="row">
                <div class="footer-nd col-md-5 ">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER));
                    ?>
                    <?php
                    if (Yii::app()->siteinfo['footercontent']) {
                        echo Yii::app()->siteinfo['footercontent'];
                    }
                    ?>
                    <?php if (Yii::app()->siteinfo['site_logo']) { ?>
                        <div class="logo">
                            <h2> 
                                <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                                    <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" alt="<?php echo Yii::app()->siteinfo['site_title'] ?>" />
                                </a>
                            </h2>
                        </div>
                    <?php } ?>
                </div>
                <div class="footer-nd col-md-7 ">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                    ?>
                    <div class="coppyright">
                        <p>©Copyright 2015 <?php echo Yii::app()->siteinfo['default_domain']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container ">
				<div class="designby"><a href="http://tss-software.com.vn/" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

        </div>
    </div>