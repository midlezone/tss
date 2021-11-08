<footer id="footer">
    <div class="container">
        <div class="footer">
            <div class="footer-cont">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK5));
                ?>
                <div class="row border-footer">
                    <div class="col-md-4">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER));
                        ?>
                        <?php
                        if (Yii::app()->siteinfo['footercontent']) {
                            echo Yii::app()->siteinfo['footercontent'];
                        }
                        ?>
                    </div>

                    <div class="col-md-4">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                        ?>
                    </div>
                    <div class="col-md-4">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK3));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-coppyright clearfix">
        <div class="container">
            <div class="coppyright">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK4));
                ?>
            </div>
            <div>
                <div class="designby"><a href="http://jujube.com.vn" title="Thiết kế web, thiết kế web chuyên nghiệp" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: JUJUBE</a></div>
            </div>
        </div>
    </div>
</footer>