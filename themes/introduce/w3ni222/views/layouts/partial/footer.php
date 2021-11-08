<footer>
    <div class="bottom-footer clearfix">
        <div class="bottom-footer clearfix">
            <div class=" col-sm-4 box-footer">
                <div>
                    <?php echo Yii::app()->siteinfo['footercontent']; ?>
                </div>
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK3));
                ?>
            </div>
            <div class="col-sm-4 bantin">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                ?>
            </div>
            <div class="col-sm-4 gallery">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                ?>
            </div>
        </div>
    </div>
    <div class="footer-f clearfix">
        <div class="container">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK4));
            ?>
			        <div class="designby"><a href="http://tss-software.com.vn/" title="Thiết kế web, thiết kế web chuyên nghiệp" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

        </div>
    </div>
</footer>