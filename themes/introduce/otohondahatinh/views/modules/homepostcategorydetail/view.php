<?php if (count($cateinhome)) { ?>
    <div class="newcategoryinhome well animated fadeOutDown" data-sb="fadeInDown" data-sb-hide="fadeOutDown">
        <?php
        foreach ($cateinhome as $cat) {
            ?>
            <div class="box da"> 
                <div class="title">
                    <div class="cont-title"> 
                        <h3><?php echo $cat['cat_name']; ?></h3>
                        <div class="viewall">
                            <a href="<?php echo $cat['link']; ?>">
                                <i><?php echo Yii::t('common', 'viewall'); ?></i>
                                <div class="view"></div>
                            </a>
                        </div>
                    </div>
                </div>	
                <?php
                if (isset($data[$cat['cat_id']]['posts'])) {
                    $posts = $data[$cat['cat_id']]['posts'];
                    ?>
                    <?php if (count($posts)) { ?>
                        <div class="da-cont">
                            <div class="list grid">
                                <div id="owl-demo2" class="owl-carousel owl-theme triggerAnimation animated" data-animate="fadeInUp">
                                    <?php foreach ($posts as $post) { ?>
                                        <div class="list-item">
                                            <div class="list-content">
                                                <div class="list-content-box">
                                                    <div class="list-content-img">
                                                        <a title="<?php echo $post['title']; ?>" href="<?php echo $post['link']; ?>">
                                                            <img src="<?php echo ClaHost::getImageHost() . $post['image_path'] . 's250_250/' . $post['image_name']; ?>" alt="<?php echo $post['title']; ?>" />
                                                        </a>
                                                    </div>
                                                    <div class="list-content-body">
                                                        <span class="list-content-title">
                                                            <a title="<?php echo $post['title']; ?>" href="<?php echo $post['link']; ?>">
                                                                <?php echo $post['title']; ?>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <link href='<?php echo Yii::app()->theme->baseUrl; ?>/owl-carousel/owl.carousel.css' rel='stylesheet' type='text/css' />
                            <link href='<?php echo Yii::app()->theme->baseUrl; ?>/owl-carousel/owl.theme.css' rel='stylesheet' type='text/css' />
                            <script type="text/javascript" src='<?php echo Yii::app()->theme->baseUrl; ?>/owl-carousel/owl.carousel.min.js'></script>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $("#owl-demo2").owlCarousel({
                                        autoPlay: 4000,
                                        items: 4,
                                        itemsDesktop: [1199, 3],
                                        itemsDesktopSmall: [979, 3]
                                    });
                                });
                            </script>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        <?php } ?>  
    </div>
<?php } ?>