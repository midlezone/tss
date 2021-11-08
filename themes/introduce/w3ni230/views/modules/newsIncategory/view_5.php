<?php if (count($news)) { ?>
    <div class="post">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2>
                    <?php echo $widget_title; ?>
                </h2>
            </div>
        <?php } ?>
        <div class="panel-heading" style="
             -moz-border-bottom-colors: none;
             -moz-border-left-colors: none;
             -moz-border-right-colors: none;
             -moz-border-top-colors: none;
             background-color: transparent;
             border-color: -moz-use-text-color -moz-use-text-color #cb2322;
             border-image: none;
             border-style: none none solid;
             border-width: medium medium 2px;
             margin-bottom: 10px;
             ">
            <h3>Tin mới</h3>
        </div>
        <div class="cont row">
            <div id="owl-demo" class="owl-carousel">
                <?php foreach ($news as $ne) { ?>
                    <!--<div class="item">-->
                    <div class="box-all-nd">
                        <!--                        <div class="header-panel">
                                                    <a title="<?php echo $ne['news_title']; ?>" href="<?php echo $ne['link']; ?>" class="head-title">
                                                        <h3><?php echo $ne['news_title']; ?></h3>
                                                    </a>
                                                </div>-->
                        <div class="box-nd">
                            <div class="nd-nd">	
                                <div class="img-box-nd">
                                    <div class="img-box">
                                        <a title="<?php echo $ne['news_title']; ?>" href="<?php echo $ne['link']; ?>">
                                            <img  src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's300_300/' . $ne['image_name']; ?>" alt="<?php echo $ne['image_name']; ?>"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="title-box-ng">
                                    <a class="font-tahoma" title="<?php echo $ne['news_title']; ?>" href="<?php echo $ne['link']; ?>">
                                        <?php echo $ne['news_title']; ?>
                                    </a>
                                </div>
                                <p>
                                    <?php
                                    echo $ne['news_sortdesc'];
                                    ?>
                                </p>	
                            </div>	
                        </div><!--end-box-nd-->	
                    </div>
                    <!--</div>-->                
                <?php } ?>
            </div>
        </div>
    </div>
    <?php $themUrl = Yii::app()->theme->baseUrl; ?>
    <script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script> 
    <script>
        $(document).ready(function () {
            var owl = $("#owl-demo");
            owl.owlCarousel({
                itemsCustom: [
                    [0, 1],
                    [450, 1],
                    [600, 2],
                    [1000, 3],
                    [1200, 3],
                    [1400, 3],
                    [1600, 3]
                ],
                navigation: false,
                autoPlay: true
            });
        });
    </script>   
<?php } ?>