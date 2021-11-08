<div class="footer" id="footer">
    <div class="row">
        <div class="col-sm-5 foot-l">
            <?php
            if (Yii::app()->siteinfo['footercontent']) {
                echo Yii::app()->siteinfo['footercontent'];
            }
            ?>
        </div>
        <div class="col-sm-3 foot-c">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
            ?>
        </div>  
        <div class="facebook col-sm-4">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
            ?>
        </div>
    </div>
	<div class="designby"><a href="http://tss-software.com.vn/" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

</div>