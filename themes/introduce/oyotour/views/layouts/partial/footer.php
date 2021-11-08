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
                <div class="col">
                    <aside class="widget">
						<h5 class="widget_title"><b>CÔNG TY TNHH TMDV OYO VIỆT NAM</b></h5>
						<div class="widget_custom_posts">
							<ul>
									<li><span class="fa fa-map-marker"></span>Trụ Sở Chính: Ngõ 50 - Hà Huy Tập - TP Hà Tĩnh</li>
									<li><span class="fa  fa-phone"></span>Điện thoại/fax: 093.135.2577</li>
									<li><span class="fa  fa-phone"></span>Hotline: 093.135.2577</li>
									<li><span class="fa fa-envelope"></span>Email: info@oyotours.vn</li></ul>
						</div>
					</aside>
                </div>
                <div class="col col_3_of_12">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK3));
                    ?>
                </div>
                <div class="col col_3_of_12">
						   <div class="need">
							  <div class="title-bt">
								 <span>
								 Tour Trong Nước</span>
							  </div>
							  <div class="cont">
								 <ul>
									<div class="need">
									   <li class="">
										  <a href="/chau-au-pc,10030" title="Tour Châu Âu">Tour Miền Bắc</a>
									   </li>
									   <li class="">
										  <a href="/chau-a-pc,10032" title="Tour Châu Á">Tour Miền Trung</a>
									   </li>
									   <li class="">
										  <a href="/chau-uc-pc,10034" title="Tour Châu Úc">Tour Miền Nam</a>
									   </li>
									 
									</div>
								 </ul>
							  </div>
						   </div>

                </div>
				<div class="col col_3_of_12">
						   <div class="need">
							  <div class="title-bt">
								 <span>
								 Thông Tin Du Lịch</span>
							  </div>
							  <div class="cont">
								 <ul>
									<div class="need">
									   <li class="">
										  <a href="/chau-au-pc,10030" title="Tour Châu Âu">Thông Tin Du Lịch</a>
									   </li>
									   <li class="">
										  <a href="/chau-a-pc,10032" title="Tour Châu Á">Hướng Dẫn Thủ Tục Visa</a>
									   </li>
									   <li class="">
										  <a href="/chau-uc-pc,10034" title="Tour Châu Úc">Tin Tức Về OYOTOUR </a>
									   </li>
									   <li class="">
										  <a href="/chau-uc-pc,10034" title="Tour Châu Úc">Video</a>
									   </li>
									   <li class="">
										  <a href="/chau-uc-pc,10034" title="Tour Châu Úc">Thư Viện Ảnh</a>
									   </li>
									</div>
								 </ul>
							  </div>
						   </div>

                </div>
            </div>
        </div>
    </div>

    <div class="bottom-footer1">
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