<div class="footer">
    <div class="container">
        <div class="row ">
            <div class="col-md-8 clearfix">
                <div class="col-sm-7 left-footer-col-8">
                    <div class="dc-footer">
                        <?php
                        if (Yii::app()->siteinfo['footercontent']) {
                            echo Yii::app()->siteinfo['footercontent'];
                        }
                        ?>
                    </div>
                </div>
                <div class="col-sm-5 right-footer-col-4">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                    ?>
                </div>
            </div>
            <!--end-col-md-8-->
            
          
        </div>
        <!--end-row-->
		<div class="designby"><a href="http://tss-software.com.vn/" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

    </div>
    <!--end-container--> 
</div>

<div class="coccoc-alo-phone coccoc-alo-green coccoc-alo-show" id="coccoc-alo-phoneIcon">
	<a href="tel:0912305889" data-original-title="Liên hệ với chúng tôi">
		<div class="coccoc-alo-ph-circle"></div><div class="coccoc-alo-ph-circle-fill">
		</div>
		<div class="coccoc-alo-ph-img-circle"></div><span class="phone_text">0912.305.889</span>
	</a>
</div>
