<?php if (count($lecturers)) {
    ?>
    <div class="box">
        <?php if ($show_widget_title) { ?>

            <div class="title">
                <h2>đội ngũ bác sĩ</h2>
            </div>
            <div class="box-cont">
            <?php } ?>
            <div id="demo">
                <div class="span12">
                    <div id="owl-demo" class="owl-carousel">
                        <?php foreach ($lecturers as $lecturer) { ?>
                            <div class="item">
                                <div class="box-img">
                                    <a href="javascript::void(0);">
                                        <img src="<?php echo ClaHost::getImageHost() . $lecturer['avatar_path'] . 's250_250/' . $lecturer['avatar_name']; ?>" />
                                    </a>
                                </div>
                                <div class="title-library">
                                    <h3>  <a href="javascript::void(0);"><?php echo $lecturer['name'] ?></a></h3>
                                    <div class="more"><?php echo $lecturer['job_title'] ?></div>
                                    <div class="more1"><?php echo $lecturer['sort_description'] ?></div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php if ($show_widget_title) { ?>
            </div>
            <?php
            $themUrl = Yii::app()->theme->baseUrl;
            ?>
            <script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script> 
            <script>
                $(document).ready(function () {
                    $("#owl-demo").owlCarousel({
                        autoPlay: 3000,
                        items: 1,
                        itemsDesktop: [1199, 3],
                        itemsDesktopSmall: [979, 3],
                        autoPlay: true,
                    });

                });
            </script>

        <?php } ?>
    </div>
<?php } ?>
