<div id="footer" class="footer">
    <div class="container">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER));
        if (Yii::app()->siteinfo['footercontent']) {
            echo Yii::app()->siteinfo['footercontent'];
        }
        ?>
		<div class="designby"><a href="http://tss-software.com.vn/" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

    </div>
</div>