<?php if (count($videos)) { ?>

    <?php if ($show_widget_title) { ?>
        <div class="title">
            <h2><?php echo $widget_title ?></h2>
        </div>
        <div class="line"></div>
    <?php } ?>
    <div class="cont">
        <div class="container">
            <div id="demo">
                <div id="owl-demo" class="owl-carousel">
                    <?php
                    foreach ($videos as $video) {
                        ?>
                        <div class="item">
                            <div class="box-img">
                                <a href="<?php echo $video['video_link'] ?>" title="<?php echo $video['video_title']; ?>" target="_blank">
                                    <img src="<?php echo ClaHost::getImageHost().$video['avatar_path'] . $video['avatar_name']; ?>" alt="<?php echo $video['video_title']; ?>"/>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
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
                [1400, 4],
                [1600, 4]
            ],
            navigation: true,
            autoPlay: true,
        });
    });
</script>    

