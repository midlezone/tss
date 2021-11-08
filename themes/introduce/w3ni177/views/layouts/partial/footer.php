<div id="footer" class="footer">
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

            </div>
            <div class="coppy-footer">
                <?php
                if (Yii::app()->siteinfo['footercontent']) {
                    echo Yii::app()->siteinfo['footercontent'];
                }
                ?>
					<div class="designby"><a href="http://tss-software.com.vn/" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

            </div>
        </div>
</div>


