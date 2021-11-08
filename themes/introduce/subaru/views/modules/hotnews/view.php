<?php if (count($hotnews)) { ?>
    <div class="container">
        <?php if ($show_widget_title) { ?>
            <div class="title clearfix">
                <h2><?php echo $widget_title; ?></h2>
                <div class="line"></div>
            </div>
        <?php } ?>
        <div class="cont">
            <div id="demo">
                <div id="owl-demo" class="owl-carousel">

                    <?php foreach ($hotnews as $news) { ?>

                        <div class="item">
                            <div class="box-cont">
                                <div class="box-img">

                                    <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>">
                                        <img src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's250_250/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>" />
                                    </a>



                                </div>
                                <div class="box-info">
                                    <h3>
                                        <a href="<?php echo $news['link'] ?>" title="<?php echo $news['news_title']; ?>">
                                            <?php echo $news['news_title']; ?>
                                        </a>
                                    </h3>
                                    <div class="news-sort-desc">
                                        <?php echo $news['news_sortdesc']; ?>
                                    </div>

                                </div>
                            </div>
                        </div>


                    <?php } ?>

                </div>
            </div>
        </div>
    <?php } ?>
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
                    [1400, 5],
                    [1600, 6]
                ],
                navigation: true,
                autoPlay: true,
            });
        });
    </script>
</div>
<?php $themUrl = Yii::app()->theme->baseUrl; ?>

