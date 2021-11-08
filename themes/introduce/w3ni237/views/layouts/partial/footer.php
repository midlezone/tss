<div id="footer">
    <div class="top-footer">
        <div class="container">
            <div>
                <div class="menu-footer">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                    ?>
                </div>
                <div class="partner">
                    <div class="connected">
                        <h3>stay connected</h3>
                    </div>
                    <div class="social-partner clearfix">
                        <ul>
                            <li><a href="#"><i class="icon-fb"></i></a></li>
                            <li><a href="#"><i class="icon-tw"></i></a></li>
                            <li><a href="#"><i class="icon-gg"></i></a></li>
                            <li><a href="#"><i class="icon-rss"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-footer clearfix">
        <div class="container">
            <div class="ab">
                <div class="dc">Copyright 2015 © <?php echo Yii::app()->siteinfo['default_domain']; ?></div>
            </div>
			  <div class="designby"><a href="http://tss-software.com.vn/" title="Thiết kế web, thiết kế web chuyên nghiệp" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

        </div>
    </div>
</div>
