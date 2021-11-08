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
                    <h2><span>Hình thức thanh toán</span></h2>
                </div>
               <div class="content-ctf">
					<ul>
							<li>
								<a href="/chinh-sach-doi-tra-pde,1026" title="Chính sách đổi trả hàng">Chính sách đổi trả hàng</a>
							</li>

							<li>
								<a href="/phuong-thuc-van-chuyen-pde,1025" title="Chính sách vận chuyển">Chính sách vận chuyển</a>
							</li>

							<li>
								<a href="/huong-dan-thanh-toan-pde,1028" title="Hình thức thanh toán">Hình thức thanh toán</a>
							</li>

							<li>
								<a href="/huong-dan-dat-hang-pde,1024" title="Hướng dẫn đặt hàng">Hướng dẫn đặt hàng</a>
							</li>

					</ul>
				</div>
					<div class="payment-ctf">
							<ul>
								<li><a href="https://www.mastercard.us/en-us.html" target="_blank"> </a></li>
								<li><a href="https://www.mastercard.us/en-us.html" target="_blank"> </a></li>
								<li><a href="https://usa.visa.com/" target="_blank"> </a></li>
								<li><a href="https://usa.visa.com/" target="_blank"> </a></li>
							</ul>
					</div>
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
