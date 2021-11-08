<?php if ($show_widget_title) { ?>
    <div class="title">
        <h2>
            <a href="javascript:void(0)"><?php echo $widget_title ?></a>
        </h2>
    </div>
<?php } ?>
<?php if (isset($cars) && count($cars)) { ?>
    <div class="cont">
        <div id="demo">
            <div id="owl-demo" class="owl-carousel">
                <?php foreach ($cars as $car) { ?>
                    <div class="item">
                        <div class="box-img">
                            <a href="<?php echo $car['link'] ?>" title="<?php echo $car['name'] ?>">
                                <img src="<?php echo ClaHost::getImageHost(), $car['avatar_path'], 's200_200/', $car['avatar_name']; ?>" alt="<?php echo $car['name'] ?>" >
                            </a>
                        </div>
                        <div class="box-more">
                            <div class="title-products">
                                <h4><a href="<?php echo $car['link'] ?>" title="<?php echo $car['name'] ?>"><?php echo $car['name'] ?></a></h4>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php $themUrl = Yii::app()->theme->baseUrl; ?>
    <script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.js"></script> 
    <script>
        $(document).ready(function () {

            var owl = $("#owl-demo");

            owl.owlCarousel({
                itemsCustom: [
                    [0, 1],
                    [450, 1],
                    [600, 2],
                    [700, 3],
                    [1000, 4],
                    [1200, 4],
                    [1400, 4],
                    [1600, 4]
                ],
                navigation: true,
                autoPlay: true,
                navigationText: [
                    "<i class='icon-chevron-left icon-white'></i>",
                    "<i class='icon-chevron-right icon-white'></i>"
                ],
            });



        });
    </script>
<?php } ?>