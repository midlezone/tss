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
        <h4 class="linktitle">WEB ĐÃ THIẾT KẾ</h4>
        <div class="linklist row">
            <div class="jcarousel-wrapper">
                <a data-jcarouselcontrol="true" href="#" class="jcarousel-control-next"></a>
                <a data-jcarouselcontrol="true" href="#" class="jcarousel-control-prev"></a>
                <div class="jcarousel" data-jcarousel="true" data-jcarouselautoscroll="true">
                    <ul>
                        <li>
                            <div class="linkitem">
                                <div class="linkitemcontent">
                                    <a target="_blank" rel="nofollow" title="Công ty cổ phần ô tô Anycar Việt Nam" href="http://anycar.vn">
                                        <p class="linklogo">
                                            <img title="Công ty cổ phần ô tô Anycar Việt Nam" alt="Công ty cổ phần ô tô Anycar Việt Nam" src="/themes/introduce/w3nhat/img/link/anycar.png" />
                                        </p>
                                        <div class="linkname">
                                            <p><a href="http://anycar.vn" title="Công ty cổ phần ô tô Anycar Việt Nam" target="_blank" rel="nofollow">Công ty cổ phần ô tô Anycar Việt Nam</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="linkitem">
                                <div class="linkitemcontent">
                                    <a target="_blank" rel="nofollow" title="Website bán trang sức, kim cương" href="http://kimcuongngoclan.vn/">
                                        <p class="linklogo">
                                            <img title="web bán trang sức" alt="trang sức ngọc lan" src="/themes/introduce/w3nhat/img/link/kimcuongngoclan.png" />
                                        </p>
                                        <div class="linkname">   
                                            <p><a href="http://kimcuongngoclan.vn/" title="Ngọc Lan diamond" target="_blank" rel="nofollow">Kim cương Ngọc Lan - 93 Hàng Bông</a></p>
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
                                            <img title="click để xem tran solo.vn" alt="website bán hàng solo.vn" src="/themes/introduce/w3nhat/img/link/solo.png" />
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
                                    <a target="_blank" rel="nofollow" title="Game Dự đoán bóng đá" href="http://sutzo.com">
                                        <p class="linklogo">
                                            <img title="Mạng xã hội – game bóng đá" alt="Game Dự đoán bóng đá" src="/themes/introduce/w3nhat/img/link/sutzo.png" />
                                        </p>
                                        <div class="linkname">   
                                            <p><a href="http://sutzo.com" title="Game Dự đoán bóng đá" target="_blank" rel="nofollow">Game Dự đoán bóng đá</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="linkitem">
                                <div class="linkitemcontent">
                                    <a target="_blank" rel="nofollow" title="Mạng xã hội giành cho giới trẻ" href="http://ipro.soha.vn">
                                        <p class="linklogo">
                                            <img title="Mạng xã hội" alt="Mạng xã hội giành cho giới trẻ" src="/themes/introduce/w3nhat/img/link/ipro.png" />
                                        </p>
                                        <div class="linkname">   
                                            <p><a href="http://ipro.soha.vn" title="Mạng xã hội giành cho giới trẻ" target="_blank" rel="nofollow">Mang xã hội i-pro.vn</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="linkitem">
                                <div class="linkitemcontent">
                                    <a target="_blank" rel="nofollow" title="Đại lý của Hyundai thành công" href="http://hyundaimotor.com.vn">
                                        <p class="linklogo">
                                            <img title="Đại lý của Hyundai thành công" alt="Đại lý của Hyundai thành công" src="/themes/introduce/w3nhat/img/link/hyundai.png" />
                                        </p>
                                        <div class="linkname">   
                                            <p><a href="http://hyundaimotor.com.vn" title="Đại lý của Hyundai thành công" target="_blank" rel="nofollow">Đại lý của Hyundai thành công</a></p>
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