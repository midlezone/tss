<div id="footer" class="clearfix">
    <div class="top-footer">
        <div class="container">
            <div class="menu-ft">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                ?>
            </div>
        </div>
    </div>
    <div class="bottom-footer clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <?php
                    if (Yii::app()->siteinfo['footercontent']) {
                        echo Yii::app()->siteinfo['footercontent'];
                    }
                    ?>
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                    ?>
                </div>
                <div class="col-sm-3">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK3));
                    ?>
                </div>
                <div class=" col-sm-3 box-footer">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK4));
                    ?>

                </div>
                <div class="col-sm-3 facebook">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK5));
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-f clearfix">
        <div class="container">
            <div class="social-ft clearfix">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK6));
                ?>
            </div>
        </div>
    </div>
    <div class="bottom-footer1">
        <div class="box-pay">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK1));
            ?>
        </div>
        <div class="coppyright">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK2));
            ?>
        </div>
        <div class="designby"><a href="http://tss-software.com.vn/" title="Thiết kế web, thiết kế web chuyên nghiệp" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

    </div>
</div>