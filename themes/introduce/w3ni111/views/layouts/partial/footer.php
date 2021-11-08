<footer id="ef-footer" style="transform: translate(0px, 0px); display: block;">
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER));
    ?>
    <div id="ef-copyrights">
        <?php
        if (Yii::app()->siteinfo['footercontent']) {
            echo Yii::app()->siteinfo['footercontent'];
        }
        ?>
		<div class="designby"><a href="http://tss-software.com.vn/" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

  
    </div>
</footer>