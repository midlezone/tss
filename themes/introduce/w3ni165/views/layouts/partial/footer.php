<div id="footer">
    <div class="row">
        <div class="col-sm-6">
            <div class="adess">
                <?php
                if (Yii::app()->siteinfo['footercontent']) {
                    echo Yii::app()->siteinfo['footercontent'];
                }
                ?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="menu-footer">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                ?>
            </div>
        </div>
        <div class="col-sm-3">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
            ?>
        </div>
        <div class="col-sm-12">
            <div class="coppyright">
				<div class="designby"><a href="http://tss-software.com.vn/" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

            </div>
        </div>
    </div>
</div>
