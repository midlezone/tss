
<div id="footer" class="footer">
    <div class="container">
        <div class="clearfix">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER));
            if (Yii::app()->siteinfo['footercontent']) {
                echo Yii::app()->siteinfo['footercontent'];
            }
            ?>
        </div>
		<div class="designby"><a href="http://tss-software.com.vn/" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

    </div>
</div>