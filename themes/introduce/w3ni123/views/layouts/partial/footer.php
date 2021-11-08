
<div class="container">
    <div id="footer" class="footer">
        <div class="box-js row">
            <div class="js col-sm-9">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER));
                ?>
            </div>
            <div class="col-sm-3">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                ?>
            </div>
        </div>
        <?php
        if (Yii::app()->siteinfo['footercontent']) {
            echo Yii::app()->siteinfo['footercontent'];
        }
        ?>
			<div class="designby"><a href="http://tss-software.com.vn/" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

    </div>
</div>