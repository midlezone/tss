
<div id="footer" class="footer">
    <div class="container">
        <div class="footer-nd">
            <?php
            if (Yii::app()->siteinfo['footercontent']) {
                echo Yii::app()->siteinfo['footercontent'];
            }            ?>
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER));
            ?>
        </div>
        <div class="share-facebook-google">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
            ?>
        </div>
        <div class="designby"><a href="http://jujube.com.vn" title="Thiết kế web, thiết kế web chuyên nghiệp" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: JUJUBE</a></div>
    </div>
</div>