<div class="product-detail">
    <?php
    $images = $model->getImages();
    $slides = array();
    $i = 0;
    foreach ($images as $img) {
        $src = ClaHost::getImageHost() . $img['path'] . '/' . $img['name'];
        if ($src) {
            $slides[$i]['image'] = $src;
            $slides[$i]['mobile_image'] = $src;
            $slides[$i]['description'] = '';
            $slides[$i]['position'] = ($i % 2 == 0) ? 'bottom-right' : 'top-left';
        }
        $i++;
    }
    ?>
    <div class="ef-post-inner">
        <h2 class=""><?php echo $product['name']; ?></h2>
        <?php
        echo $product['product_desc'];
        ?>
    </div>
    <?php if (count($slides)) { ?>
        <script>
            var slider_options = {
                auto: true,
                cover: true,
                caption_easing: "easeOutCirc",
                transition_speed: 2000,
                slide_interval: 6000,
                css_engine: true,
                reverse: false,
                slides: <?php echo json_encode($slides); ?>
            };
        </script>
    <?php } ?>
</div>