<?php if (count($products)) { ?>
    <div class="product-relative">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2><?php echo $widget_title; ?></h2>
            </div>
        <?php } ?>
        <div id="owl-slider" class="owl-carousel owl-theme" style="padding: 0 45px;">
            <?php
            foreach ($products as $product) {
                ?>
                <div class="list-item">
                    <div class="list-content clearfix">
                        <div class="list-content-box" style="text-align: center;">
                            <a href="<?php echo $product['link']; ?>">
                                <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's400_400/' . $product['avatar_name'] ?>">
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="customNavigation">
            <a class="prev"><i class="icon-angle-left" style="font-size: 72px;color: #00b194;"></i></a>
            <a class="next"><i class="icon-angle-right" style="font-size: 72px;color: #00b194;"></i></a>
        </div>
    <?php } ?>
    <script>
        $(document).ready(function () {
            var owl = $("#owl-slider");
            owl.owlCarousel({
                itemsCustom: [
                    [0, 1],
                    [450, 1],
                    [600, 3],
                    [1000, 5],
                ],
                navigation: 0,
                autoPlay: true,
            });
            $(".next").click(function () {
                owl.trigger('owl.next');
            })
            $(".prev").click(function () {
                owl.trigger('owl.prev');
            })
        });


    </script>  
</div>

