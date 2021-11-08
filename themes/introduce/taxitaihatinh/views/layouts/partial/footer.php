<div id="footer" class="footer">
    <div class="container clearfix">
        
        <div class="row">
            <div class="col-ad-ft col-md-4 col-sm-4 col-xs-12">
			    <div class="title-ad-ft">
                    <h2><span>liên hệ</span></h2>
                </div>
                <?php
                if (Yii::app()->siteinfo['footercontent']) {
                    echo Yii::app()->siteinfo['footercontent'];
                }
                ?>
            </div>
			<div class="col-ad-ft col-md-4 col-sm-4 col-xs-12">
				 <div class="title-ad-ft">
                    <h2><span>Bản Đồ</span></h2>
                </div>
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK3));
                ?>
            </div>
            <div class="col-ad-ft col-md-4 col-sm-4 col-xs-12">
			    <div class="title-ad-ft">
                    <h2><span>FACEBOOK</span></h2>
                </div>
				 <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                ?>
               
            </div>
        </div>
		<div class="footer-bottom clearfix">
        <div class="container">
            <div class="footer-bottom-content clearfix">
                <div class="coppyright">Copyright © 2017 All Rights Reserved</div>
                <div class="nano"><a href="http://tss-software.com.vn/" title="Thiết kế web, thiết kế web chuyên nghiệp" target="_blank">Thiết kế web: TSS-SOFTWARE</a>
                </div>
            </div>
        </div>
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
