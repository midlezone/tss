
<div id="footer" class="footer">
    <div class="container">
        <div class="footer-nd">
            <?php
            if (Yii::app()->siteinfo['footercontent']) {
                echo Yii::app()->siteinfo['footercontent'];
            }
            ?>
        </div>
		<div class="designby"><a href="http://tss-software.com.vn/" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

    </div>
</div>