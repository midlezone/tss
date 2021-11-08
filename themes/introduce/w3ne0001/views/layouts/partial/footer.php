<div class="page-wrap">
    <div id="footer">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER));
        if (Yii::app()->siteinfo['footercontent']) {
            echo Yii::app()->siteinfo['footercontent'];
        }
        ?>
    </div>
    <div class="designby"><a href="http://jujube.com.vn" title="Thiết kế web, thiết kế web chuyên nghiệp" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: JUJUBE</a></div>
</div>