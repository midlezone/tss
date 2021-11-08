<?php if (count($images)) { ?>
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
                <div id="owl-demo" class="owl-carousel">
                    <?php foreach ($images as $image) { ?>
                        <div class="item">
                            <div class="item-img">
                                <a href="<?php echo Yii::app()->createUrl('/media/album/detail', array('id' => $image['album_id'])); ?>">
                                    <img alt="<?php echo $image['name'] ?>" src="<?php echo ClaHost::getImageHost() . $image['path'] . 's250_250/' . $image['name']; ?>"/>
                                </a>
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
            var owl = $("#owl-demo");
            owl.owlCarousel({
                itemsCustom: [
                    [0, 2],
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
