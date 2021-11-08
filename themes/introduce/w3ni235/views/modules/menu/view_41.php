<?php
if (isset($data) && count($data)) {
    ?>
    <div class="hot-product">
        <?php if ($first) { ?>
            <!--<div class="container">-->
        <?php } ?>
        <?php if ($first && $show_widget_title) { ?>
            <div class="title clearfix">
                <h2><?php echo $widget_title; ?></h2>
            </div>
            <div class="line"></div>
        <?php } ?>
        <div class="cont">
            <div id="demo">
                <div id="owl-demo2" class="owl-carousel">
                    <?php
                    foreach ($data as $menu_id => $menu) {
                        $m_link = $menu['menu_link'];
                        ?>
                        <div class="item">
                            <div class="box-img">
                                <a href="<?php echo $m_link; ?>" title="<?php echo $menu['menu_title']; ?>"> 
                                    <img alt="<?php echo $menu['menu_title']; ?>" class="menu-icon" src="<?php echo ClaHost::getImageHost() . $menu['background_path'] . '/s250_250/' . $menu['background_name']; ?>" />
                                </a>
                            </div>
                            <div class="box-info">
                                <h3>
                                    <a href="<?php echo $m_link; ?>" title="<?php echo $menu['menu_title']; ?>"> 
                                        <?php echo $menu['menu_title']; ?>
                                    </a>
                                </h3>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                var owl = $("#owl-demo2");
                owl.owlCarousel({
                    itemsCustom: [
                        [0, 2],
                        [450, 2],
                        [600, 3],
                        [700, 3],
                        [1000, 4],
                        [1200, 4],
                        [1400, 4],
                        [1600, 5]
                    ],
                    navigation: true,
                    autoPlay: true,
                });
            });
        </script>
        <?php if ($first) { ?>
            <!--</div>-->
        <?php }
        ?>
    </div>
    <?php
}
?>

