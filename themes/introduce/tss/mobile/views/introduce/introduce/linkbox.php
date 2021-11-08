<!--Link box-->
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jcarousel/script.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScript("style_linkbox", ''
        . "var jcarousel = $('.jcarousel').jcarousel({wrap: 'circular'}); 
                                $('.jcarousel').jcarouselAutoscroll({autostart: true,interval:4000,target: '+=1'});
            $('.jcarousel-control-prev').on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '+=1'
            });", CClientScript::POS_END);
?>
<div id="linkbox">
    <div class="wrap">
        <h4 class="linktitle">WEBSITE JUJUBE ĐÃ THIẾT KẾ</h4>
        <div class="linklist row">
            <div class="jcarousel-wrapper">
                <a data-jcarouselcontrol="true" href="#" class="jcarousel-control-next"></a>
                <a data-jcarouselcontrol="true" href="#" class="jcarousel-control-prev"></a>
                <div class="jcarousel" data-jcarousel="true" data-jcarouselautoscroll="true">
                    <ul>
                        <li>
                            <div class="linkitem">
                                <div class="linkitemcontent">
                                    <a target="_blank" rel="nofollow" title="Công ty TNHH Alivina" href="http://duhocalivina.edu.vn">
                                        <p class="linklogo">
                                            <img title="Công ty TNHH Alivina" alt="Công ty TNHH Alivina" src="http://jujube.com.vn/mediacenter/media/images/products/1/1/s700_0/758_1423211075_43954d47a43ddd4d.jpg" />
                                        </p>
                                        <div class="linkname">
                                            <p><a href="http://duhocalivina.edu.vn" title="Công ty TNHH Alivina" target="_blank" rel="nofollow">Công ty TNHH Alivina</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="linkitem">
                                <div class="linkitemcontent">
                                    <a target="_blank" rel="nofollow" title="Showroom Gạch Nhập khẩu Nam Long" href="http://gachnhapkhaunamlong.com/">
                                        <p class="linklogo">
                                            <img title="Showroom Gạch Nhập khẩu Nam Long" alt="Showroom Gạch Nhập khẩu Nam Long" src="http://jujube.com.vn/mediacenter/media/images/products/1/1/s700_0/894_1440140178_66955d6cb92aeae9.png" />
                                        </p>
                                        <div class="linkname">   
                                            <p><a href="http://gachnhapkhaunamlong.com/" title="Showroom Gạch Nhập khẩu Nam Long" target="_blank" rel="nofollow">Showroom Gạch Nhập khẩu Nam Long</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="linkitem">
                                <div class="linkitemcontent">
                                    <a target="_blank" rel="nofollow" title="Viện Đào tạo kế toán thực tế Đức Minh" href="http://ketoanducminh.com">
                                        <p class="linklogo">
                                            <img title="Viện Đào tạo kế toán thực tế Đức Minh" alt="Viện Đào tạo kế toán thực tế Đức Minh" src="/themes/introduce/w3nhat/img/link/ducminh.png" />
                                        </p>
                                        <div class="linkname">   
                                            <p><a href="http://ketoanducminh.com" title="Viện Đào tạo kế toán thực tế Đức Minh" target="_blank" rel="nofollow">Viện Đào tạo kế toán thực tế Đức Minh</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="linkitem">
                                <div class="linkitemcontent">
                                    <a target="_blank" rel="nofollow" title="Bán thẻ cào trực tuyến" href="http://solo.vn">
                                        <p class="linklogo">
                                            <img title="click để xem trang solo.vn" alt="website bán hàng solo.vn" src="/themes/introduce/w3nhat/img/link/solo.png" />
                                        </p>
                                        <div class="linkname">   
                                            <p><a href="http://solo.vn" title="website bán hàng" target="_blank" rel="nofollow">Bán thẻ cào trực tuyến</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="linkitem">
                                <div class="linkitemcontent">
                                    <a target="_blank" rel="nofollow" title="Chợ mua bán ô tô" href="http://choxe247.com">
                                        <p class="linklogo">
                                            <img title="Chợ mua bán ô tô" alt="Chợ mua bán ô tô" src="/themes/introduce/w3nhat/img/link/choxe247.png" />
                                        </p>
                                        <div class="linkname">   
                                            <p><a href="http://choxe247.com" title="Chợ mua bán ô tô" target="_blank" rel="nofollow">Sàn mua bán ô tô</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="linkitem">
                                <div class="linkitemcontent">
                                    <a target="_blank" rel="nofollow" title="Mạng nội bộ doanh nghiệp" href="http://loveoffice.vn">
                                        <p class="linklogo">
                                            <img title="văn phòng điện tử" alt="hệ quản trị nội bộ doanh nghiệp" src="/themes/introduce/w3nhat/img/link/love-office.png" />
                                        </p>
                                        <div class="linkname">   
                                            <p><a href="http://loveoffice.vn" title="Văn phòng ảo online" target="_blank" rel="nofollow">Mạng nội bộ doanh nghiệp</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="linkitem">
                                <div class="linkitemcontent">
                                    <a target="_blank" rel="nofollow" title="Hàng xách tay" href="http://hangxachtaychuan.vn">
                                        <p class="linklogo">
                                            <img title="Hàng chính hãng giá tốt" alt="Hàng xách tay" src="/themes/introduce/w3nhat/img/link/hangxachtay.png" />
                                        </p>
                                        <div class="linkname">   
                                            <p><a href="http://hangxachtaychuan.vn" title="Hàng chính hãng giá tốt" target="_blank" rel="nofollow">Hàng xách tay chuẩn</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="linkitem">
                                <div class="linkitemcontent">
                                    <a target="_blank" rel="nofollow" title="Web dạy học nấu ăn" href="http://dayhocnauan.vn/">
                                        <p class="linklogo">
                                            <img title="Web dạy học nấu ăn" alt="Web dạy học nấu ăn" src="/themes/introduce/w3nhat/img/link/dayhocnauan.png" />
                                        </p>
                                        <div class="linkname">   
                                            <p><a href="http://dayhocnauan.vn" title="Web dạy học nấu ăn" target="_blank" rel="nofollow">Web dạy học nấu ăn</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="linkitem">
                                <div class="linkitemcontent">
                                    <p class="linklogo"><a title="Mạng xã hội địa điểm" target="_blank" rel="nofollow" href="http://chiasediadiem.net/"><img title="Mạng xã hội" src="/themes/introduce/w3nhat/img/link/chiasediadiem.png" alt="Mạng xã hội địa điểm"> </a></p>

                                    <div class="linkname">
                                        <p><a title="Mạng xã hội dành cho giới trẻ" target="_blank" rel="nofollow" href="http://chiasediadiem.net/">Mang xã hội địa điểm</a></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="linkitem">
                                <div class="linkitemcontent">
                                    <a target="_blank" rel="nofollow" title="RIOFOODHALL.COM" href="http://riofoodhall.com">
                                        <p class="linklogo">
                                            <img title="RIOFOODHALL.COM" alt="RIOFOODHALL.COM" src="/themes/introduce/w3nhat/img/link/riofoodhall.png" />
                                        </p>
                                        <div class="linkname">   
                                            <p><a href="http://riofoodhall.com" title="RIOFOODHALL.COM" target="_blank" rel="nofollow">RIOFOODHALL.COM</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Link Box-->