<div class="detail-top">
    <div id="demo">
        <div class="container">
            <div id="sync1" class="owl-carousel">

                <!--ITEM 1 DỰ TOÁN CHI PHÍ-->
                <div class="item">
                    <div>
                        <div style="margin: 10px; overflow: hidden;">
                            <div class="row">
                                <div class="col-xs-5" style="padding-top:80px; text-align: right">
                                    <div class="carname modernHBold "><?php echo $car['name'] ?></div>
                                    <div class="slogan modernHEcoLight ">ĐÁNH THỨC MỌI GIÁC QUAN</div>
                                    <div class="summary"><?php echo $car['sortdesc']; ?></div>
                                    <div class="item-productprice">
                                        <a href="#" class="btn btn-detail-product">
                                            Dự toán chi phí
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-7" style="padding-top:80px">
                                    <img class="htccar img-responsive" src="<?php echo ClaHost::getImageHost(), $car['avatar_path'], 's700_0/', $car['avatar_name']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END ITEM 1 DỰ TOÁN CHI PHÍ-->

                <!--ITEM 2 CẢM NHẬN 360-->
                <div class="item">
                    <div>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $("img.advancedPanorama").panorama({views_number: 36, views_columns: 20});
                            });
                        </script>
                        <style>
                            #page{
                                margin-top:50px;
                                width: 810px;
                                margin-left: auto;
                                margin-right: auto;
                            }
                        </style>	
                        <div style="margin: 10px; overflow: hidden; ">
                            <div class="bs-example bs-example-tabs xoay360" data-example-id="togglable-tabs">
                                <ul id="myTabs" class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#ngoai-that" id="ngoai-that-360-tab" role="tab" data-toggle="tab" aria-controls="ngoai-that-360" aria-expanded="true"><?php echo Yii::t('car', 'interior'); ?></a></li>
                                    <li role="presentation"><a href="#noi-that" role="tab" id="noi-that-360-tab" data-toggle="tab" aria-controls="noi-that-360"><?php echo Yii::t('car', 'exterior'); ?></a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="ngoai-that-360" aria-labelledby="ngoai-that-360-tab">
                                        <div id="page">
                                            <img src="rm1200.high/rm1200_115.png" class="panorama" width="640" height="289"  />	
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="noi-that-360" aria-labelledby="noi-that-360-tab">
                                        <div id="page">
                                            <img src="rm1200.high/rm1200_30.png" class="panorama" width="640" height="289" />	
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END ITEM 2 CẢM NHẬN 360-->

                <!--ITEM 3 HÌNH ẢNH-->
                <div class="item">
                    <div>
                        <div style="margin: 10px; overflow: hidden; ">
                            <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                                <ul id="myTabs" class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tong-quan" role="tab" id="tong-quan-tab" data-toggle="tab" aria-controls="tong-quan" aria-expanded="true"><?php echo Yii::t('car', 'overview') ?></a></li>
                                    <li role="presentation" class=""><a href="#noi-that" id="noi-that-tab" role="tab" data-toggle="tab" aria-controls="noi-that" aria-expanded="false"><?php echo Yii::t('car', 'interior') ?></a></li>
                                    <li role="presentation" class=""><a href="#ngoai-that" id="ngoai-that-tab" role="tab" data-toggle="tab" aria-controls="ngoai-that" aria-expanded="false"><?php echo Yii::t('car', 'exterior') ?></a></li>
                                    <li role="presentation" class=""><a href="#an-toan-van-hanh" id="an-toan-van-hanh-tab" role="tab" data-toggle="tab" aria-controls="an-toan-van-hanh" aria-expanded="false"><?php echo Yii::t('car', 'car_image_safety') ?></a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <?php $images = $model->getImages();
                                    if (count($images)) { ?>
                                        <div role="tabpanel" class="tab-pane fade active in" id="tong-quan" aria-labelledby="tong-quan-tab">
                                            <div class="row">
                                                <?php foreach ($images as $image) {
                                                    if($image['type'] == 1) { ?>
                                                    <div class="col-xs-6 col-sm-3">
                                                        <div class="box-img">
                                                            <a href="#" title="#">
                                                                <img src="<?php echo Images::getAbsoluteLink($image); ?>" alt="#" title="#">
                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php } } ?>
                                            </div>
                                        </div>
                                    
                                    <div role="tabpanel" class="tab-pane fade" id="noi-that" aria-labelledby="noi-that-tab">
                                        <div class="row">
                                                <?php foreach ($images as $image) {
                                                    if($image['type'] == 2) { ?>
                                                    <div class="col-xs-6 col-sm-3">
                                                        <div class="box-img">
                                                            <a href="#" title="#">
                                                                <img src="<?php echo Images::getAbsoluteLink($image); ?>" alt="#" title="#">
                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php } } ?>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="ngoai-that" aria-labelledby="ngoai-that-tab">
                                        <div class="row">
                                            <?php foreach ($images as $image) {
                                                    if($image['type'] == 3) { ?>
                                                    <div class="col-xs-6 col-sm-3">
                                                        <div class="box-img">
                                                            <a href="#" title="#">
                                                                <img src="<?php echo Images::getAbsoluteLink($image); ?>" alt="#" title="#">
                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php } } ?>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="an-toan-van-hanh" aria-labelledby="an-toan-van-hanh-tab">
                                            <div class="row">
                                            <?php foreach ($images as $image) {
                                                    if($image['type'] == 4) { ?>
                                                    <div class="col-xs-6 col-sm-3">
                                                        <div class="box-img">
                                                            <a href="#" title="#">
                                                                <img src="<?php echo Images::getAbsoluteLink($image); ?>" alt="#" title="#">
                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php } } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END ITEM 3 HÌNH ẢNH-->

                <!--ITEM 4 THÔNG SỐ XE-->
                <div class="item">
                    <div>
                        <div style="margin: 10px; overflow: hidden;  ">
                            <div id="divSpecification" class="item item-slide active" style="">
                                <div class="row" style="margin:0 0 70px 0; max-width:11140px; ">
                                    <div class="col-lg-12">
                                        <div class="specification">
                                            <p><style type="text/css">
                                                .auto-style1
                                                {
                                                    height: 24px;
                                                }
                                            </style></p>
                                            <div class="spec_table" style="border-top:1px solid #ccc;">
                                                <?php echo $model->description ?>
                                            </div>
                                            <p>&nbsp;</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END ITEM 4 THÔNG SỐ XE-->

                <!--ITEM 5 VIDEO-->
                <div class="item">
                    <div>
                        <div style="margin: 10px; overflow: ">
                            <div class="video-detail"><img src="css/img/video.jpg" alt="#"></div>
                        </div>
                    </div>
                </div>
                <!--END ITEM 5 VIDEO-->

                <!--ITEM 6 DANH GIA XE-->
                <div class="item">
                    <div>
                        <div style="margin: 10px; overflow: hidden;  ">
                            <div class="judge">
                                <ul>
                                    <li>
                                        <div class="registered-action">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm-dg1">
                                                <div class="box-info">
                                                    <div class="box-title">
                                                        <h4>Hyundai Tucson 2010: Không nên bỏ qua khi tìm xe có mức giá 950 triệu</h4>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="registered-action">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm-dg2">
                                                <div class="box-info">
                                                    <div class="box-title">
                                                        <h4>Hyundai Tucson 2010: Không nên bỏ qua khi tìm xe có mức giá 950 triệu</h4>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="registered-action">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm-dg3">


                                                <div class="box-info">
                                                    <div class="box-title">
                                                        <h4>Hyundai Tucson 2010: Không nên bỏ qua khi tìm xe có mức giá 950 triệu</h4>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END ITEM 6 DANH GIA XE-->
            </div>
            <div id="sync2" class="owl-carousel">
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl ?>/css/img/dutinh.png"><br><span>Dự toán chi phí</span></div>
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl ?>/css/img/360.png"><br><span>Cảm nhận 360</span></div>
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl ?>/css/img/affix-gallery.png"><br><span>Hình ảnh</span></div>
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl ?>/css/img/affix-spec.png"><br><span>Thông số xe</span></div>
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl ?>/css/img/affix-video.png"><br><span>Phim 30s</span></div>
                <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl ?>/css/img/affix-review.png"><br><span>Đánh giá xe</span></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        var sync1 = $("#sync1");
        var sync2 = $("#sync2");

        sync1.owlCarousel({
            singleItem: true,
            slideSpeed: 1000,
            navigation: true,
            pagination: false,
            afterAction: syncPosition,
            responsiveRefreshRate: 200,
        });

        sync2.owlCarousel({
            items: 15,
            itemsDesktop: [1199, 10],
            itemsDesktopSmall: [979, 10],
            itemsTablet: [768, 8],
            itemsMobile: [479, 4],
            pagination: false,
            responsiveRefreshRate: 100,
            afterInit: function (el) {
                el.find(".owl-item").eq(0).addClass("synced");
            }
        });

        function syncPosition(el) {
            var current = this.currentItem;
            $("#sync2")
                    .find(".owl-item")
                    .removeClass("synced")
                    .eq(current)
                    .addClass("synced")
            if ($("#sync2").data("owlCarousel") !== undefined) {
                center(current)
            }

        }

        $("#sync2").on("click", ".owl-item", function (e) {
            e.preventDefault();
            var number = $(this).data("owlItem");
            sync1.trigger("owl.goTo", number);
        });

        function center(number) {
            var sync2visible = sync2.data("owlCarousel").owl.visibleItems;

            var num = number;
            var found = false;
            for (var i in sync2visible) {
                if (num === sync2visible[i]) {
                    var found = true;
                }
            }

            if (found === false) {
                if (num > sync2visible[sync2visible.length - 1]) {
                    sync2.trigger("owl.goTo", num - sync2visible.length + 2)
                } else {
                    if (num - 1 === -1) {
                        num = 0;
                    }
                    sync2.trigger("owl.goTo", num);
                }
            } else if (num === sync2visible[sync2visible.length - 1]) {
                sync2.trigger("owl.goTo", sync2visible[1])
            } else if (num === sync2visible[0]) {
                sync2.trigger("owl.goTo", num - 1)
            }
        }

    });
</script>