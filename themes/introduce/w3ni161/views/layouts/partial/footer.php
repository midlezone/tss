<div id="footer" class="footer">
    <div class="container clearfix">
        <div class="row">
            <div class="col-sm-4 col-md-4 information_footer">
                <?php
                if (Yii::app()->siteinfo['footercontent']) {
                    echo Yii::app()->siteinfo['footercontent'];
                }
                ?>
            </div>
            <div class="col-sm-5 col-md-4">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                ?>
            </div>
            <div class="facebook col-sm-3 col-md-4">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK3));
                ?>
            </div>
        </div>
        <div class=" clearfix">
            <div class="ab">
            </div>
							<div class="designby"><a href="http://tss-software.com.vn/" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

        </div>
    </div>
</div>