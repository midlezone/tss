<div id="footer" class="clearfix">
    <div class="bottom-footer clearfix">
        <div class="container">
            <div class=" col-sm-4 box-footer">
                <div class="title-bt">
                    <span><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                </div>
                <div class="welcome">
                    <?php
                    if (Yii::app()->siteinfo['footercontent']) {
                        echo Yii::app()->siteinfo['footercontent'];
                    }
                    ?>
                </div>
            </div>
            <div class="col-sm-4 bantin">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                ?>
            </div>
            <div class="col-sm-4 facebook">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                ?>
            </div>
        </div>
    </div>
    <div class="footer-f clearfix">
        <div class="container">
          	<div class="designby"><a href="http://tss-software.com.vn/" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

        </div>
    </div>
</div>
