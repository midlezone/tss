<?php if ($news) { ?>
    <div class="industrial-product outstanding-project1">
        <div class="container">
            <?php if ($show_widget_title) { ?>
                <div class="title">
                    <h2>
                        <a href="#" title="#"><?php echo $widget_title; ?></a>
                    </h2>
                </div>
            <?php } ?>
            <div class="cont">
                <div id="demo">
                    <div id="owl-demo1" class="owl-carousel">
                        <?php
                        foreach ($news as $ne) {
                            ?>
                            <div class="item">
                                <div class="box-img">
                                    <div class="img-cate">
                                        <a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>" class="hover-banner"></a>
                                        <a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>">

                                            <img  src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's450_450/' . $ne['image_name']; ?>" alt="<?php echo $ne['image_name']; ?>"/>

                                        </a>
                                    </div>
                                </div>
								 <div class="box-info">
                                    <div class="title-about">
                                        <h3>
                                            <a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>">
                                                <?php echo $ne['news_title']; ?>
                                            </a>
                                        </h3>
                                    </div>
                                </div>
								<div class="des-post">
                                    <p class="des-post-exp1">
										<?php echo substr($ne['news_sortdesc'], 0, 240); ?> ...
									</p>
                                </div>
                              
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $themUrl = Yii::app()->theme->baseUrl; ?>
    <script>
        $(document).ready(function () {
            var owl = $("#owl-demo1");
            owl.owlCarousel({
                itemsCustom: [
                    [0, 1],
                    [450, 1],
                    [600, 2],
                    [700, 3],
                    [1000, 3],
                    [1200, 3],
                    [1400, 3],
                ],
                navigation: false,
                autoPlay: false,
            });
        });
    </script>   
    <?php
}
?>