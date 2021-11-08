<div id="footer">
    <div class=" footer  clearfix">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
        ?>
        <div class="bottom-footer clearfix">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
            ?>
        </div>
        <div class="box-footer-bottom clearfix">

            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK3));
            ?>

             <div class="designby"><a href="http://tss-software.com.vn/" title="Thiết kế web, thiết kế web chuyên nghiệp" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

        </div>
    </div>
</div>
