<?php if (count($albums)) { ?>

    <div class="default-custom-box students-projects">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2>
                    <a href="#" onclick="javascript:void(0)">
                        <span><?php echo $widget_title; ?></span>
                    </a>
                </h2>
                <div class="category-detail-btn">
                    <a href="/album">
                        <i>Xem tất cả</i>
                        <i class="category-detail-i"></i>
                    </a>
                </div>
            </div>
        <?php } ?>
        <div class="box-deail">
            <div class="demo">
                <div id="owl-demo1" class="owl-carousel">
                    <?php foreach ($albums as $album) { ?>
                        <div class="item">
                            <div class="item-img">
                                <a href="<?php echo Yii::app()->createUrl('/media/album/detail', array('id' => $album['album_id'])); ?>">
                                    <img alt="<?php echo $album['album_name'] ?>" src="<?php echo ClaHost::getImageHost() . $album['avatar_path'] . 's280_280/' . $album['avatar_name']; ?>"/>
                                </a>
                            </div>  
                            <div class="item-title">
                                <h3>
                                    <a href="<?php echo Yii::app()->createUrl('/media/album/detail', array('id' => $album['album_id'])); ?>">
                                        <?php echo $album['album_name'] ?>
                                    </a>
                                </h3>
                            </div>
                        </div>
                    <?php } ?>
                </div>   
            </div>   
        </div>  
    </div>
    <style>

    </style>

    <script>
        $(document).ready(function () {
            var owl = $("#owl-demo1");
            owl.owlCarousel({
                itemsCustom: [
                    [0, 1],
                    [480, 2],
                    [600, 3],
                    [1000, 4]
                ],
    //                navigation: true,
                autoPlay: true
            });
        });
    </script>
<?php } ?>

