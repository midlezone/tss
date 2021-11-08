<div id="footer" class="clearfix">
    <div class="bottom-footer clearfix">
        <div class="container">
            <div class="col-sm-3 box-footer">
                <?php
                if (Yii::app()->siteinfo['footercontent']) {
                    echo Yii::app()->siteinfo['footercontent'];
                }
                ?>
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK4));
                ?>
            </div>
            <div class="col-sm-3 bantin">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                ?>
            </div>
            <div class="col-sm-3 facebook">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                ?>
				<div class="callus"><i class="i_phone"><span style="display:none;">.</span></i><a href="tel:0935777726" onclick="goog_report_conversion('tel:0935777726')"><span class="hotline_text">HOTLINE :</span> 0935.7777.26 </a></div>
            </div>
			 <div class="col-sm-3">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK5));
                ?>
            </div>
        </div>

    </div>
    <div class="footer-f clearfix">
        <div class="container">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK3));
            ?>
         <div class="designby"><a href="http://tss-software.com.vn/" title="Thiết kế web, thiết kế web chuyên nghiệp" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

        </div>

    </div>
	<script type="text/javascript">
    jQuery(document).ready(function() {
        $("body").append("<a class=\"scrollup\" href=\"#\" id=\"scrollup\"></a>");
        $(document).on('scroll', function() {
            if ($(this).scrollTop() > 1) {
                $('#scrollup').fadeIn('slow');
            } else {
                $('#scrollup').fadeOut();
            }
        });
        //
        $('#scrollup').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    });
</script>
</div>