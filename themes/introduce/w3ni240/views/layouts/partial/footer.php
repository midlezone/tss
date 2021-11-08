<div id="footer">
    <div class="container">
        <div class="logo-ft">
            <div class="row">
                <div class="col-sm-3">
                    <div class="box-img">
                        <img src="<?php echo Yii::app()->theme->baseUrl ?>/css/img/logo-ft.png" alt="#">
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="line"></div>
                </div>
            </div>
        </div>
        <div class="top-footer">
            <div class="row">
                <div class="col-sm-6">
                    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1)); ?>
                </div>
                <div class="col-sm-6">
                    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2)); ?>
                </div>
            </div>
        </div>
        <div class="designby"><a href="http://tss-software.com.vn/" title="Thiết kế web, thiết kế web chuyên nghiệp" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

    </div>
</div>