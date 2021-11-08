<div id="footer" class="clearfix">
    <div class="bottom-footer clearfix">
        <div class="container">
            <div class="col-sm-4 box-footer">
                <div class="company">
                    <div class="title-bt"><span><?php echo Yii::app()->siteinfo['site_title']; ?></span></div>
                </div>
                <div class="welcome">
                    <?php
                    if (Yii::app()->siteinfo['footercontent']) {
                        echo Yii::app()->siteinfo['footercontent'];
                    }
                    ?>
                </div>
            </div>
            <div class="col-sm-4 menu-footer">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2)); ?>
            </div>
            <div class="col-sm-4 bantin">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK3)); ?>
            </div>
        </div>
    </div>

    <div class="footer-f clearfix">
        <div class="container">
            <div class="nano">
			<div class="designby"><a href="http://tss-software.com.vn/" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

            </div>
        </div>
    </div>
</div>
