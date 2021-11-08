<div class="footer">
    <div class="container">
        <div class="row ">
            <div class="col-md-8 clearfix">
                <div class="left-footer-col-8">
                    <div class="dc-footer">
                        <?php
                        if (Yii::app()->siteinfo['footercontent']) {
                            echo Yii::app()->siteinfo['footercontent'];
                        }
                        ?>
                    </div>
                </div>
                <div class="right-footer-col-4">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                    ?>
                </div>
            </div>
            <!--end-col-md-8-->
            <div class="col-md-4" style="height: 230px;overflow: hidden"> 
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK3));
                ?>
            </div>
        </div>
        <!--end-row-->
			<div class="designby"><a href="http://tss-software.com.vn/" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

    </div>
    <!--end-container--> 
</div>

