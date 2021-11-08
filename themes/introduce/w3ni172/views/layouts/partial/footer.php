<div id="footer" class="footer">
    <div class="container">
        <div class="box clearfix">
            <div class="row">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                ?>
                <div class="footer-nd col-sm-3">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                    ?>
                </div>

                <div class="coppy-footer col-sm-5">
                    <?php
                    if (Yii::app()->siteinfo['footercontent']) {
                        echo Yii::app()->siteinfo['footercontent'];
                    }
                    ?>
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK3));
                    ?>
					<div class="designby"><a href="http://tss-software.com.vn/" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

                </div>
            </div>

        </div>
    </div>
</div>


