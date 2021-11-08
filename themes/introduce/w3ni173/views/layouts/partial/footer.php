<div id="footer" class="footer">
    <div class="container clearfix">
        <div class="row">
            <div class="col-sm-5 foot-l">
                <div class="adess">
                    <?php
                    if (Yii::app()->siteinfo['footercontent']) {
                        echo Yii::app()->siteinfo['footercontent'];
                    }
                    ?>
                </div>
            </div>
            <div class="col-sm-3 foot-c">
                <div class="menu-footer">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                    ?>
                </div>
            </div>
            <div class="facebook col-sm-4 ">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                ?>
            </div>
        </div>
        <div class=" footer-footer clearfix">
            <div class="ab">
                <div class="dc">Copyright 2015 © vitg.com</div>
            </div>
			<div class="designby"><a href="http://tss-software.com.vn/" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

        </div>
    </div>
</div>
