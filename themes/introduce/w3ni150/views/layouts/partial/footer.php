<div class="line">
    <div class="container"></div>
</div>
<div class="box-footer">
    <div class="container">
        <div id="footer" class="footer">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER));
            ?>
                <div class="row">
                    <div class="footer-nd col-sm-6">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                        ?>
                    </div>
                    <div class="footer-nd col-sm-3">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                        ?>
                    </div>
                    <div class="footer-nd col-sm-3">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK3));
                        ?>
                    </div>
                </div>
            <?php if (Yii::app()->siteinfo['footercontent']) { ?>
                <div class="coppy-footer">
                    <?php echo Yii::app()->siteinfo['footercontent']; ?>
                    <div class="designby"><a href="http://jujube.com.vn" title="Thiết kế web, thiết kế web chuyên nghiệp" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: JUJUBE</a></div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>