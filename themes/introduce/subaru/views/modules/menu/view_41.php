<?php
if (isset($data) && count($data)) {
    ?>
    <?php if ($first) { ?>
        <div class="container">
        <?php } ?>
        <?php if ($first && $show_widget_title) { ?>
           <div class="title-m">
                <h2>
					<a href="" title="<?php echo $widget_title; ?></">
					   <?php echo $widget_title; ?></a>
				</h2>
            </div>
        <?php } ?>
        <div class="cont">
            <div id="demo">
                <div id="owl-demo1" class="owl-carousel">
                    <?php
                    foreach ($data as $menu_id => $menu) {
                        
                        $m_link = $menu['menu_link'];
                        ?>

                        <div class="item">
                            <div class="title-item">
                                <h3>
                                    <a href="<?php echo $m_link; ?>" title="<?php echo $menu['menu_title']; ?>"> 
                                        <?php echo $menu['menu_title']; ?>
                                    </a>
                                </h3>
                            </div>
                            <div class="cont-item">
                                <div class="box-imgdv">
                                    <a href="<?php echo $m_link; ?>" title="<?php echo $menu['menu_title']; ?>"> 
                                        <img alt="<?php echo $menu['menu_title']; ?>" class="menu-icon" src="<?php echo ClaHost::getImageHost() . $menu['icon_path'] . $menu['icon_name']; ?>" />
                                    </a>
                                </div>
                                <div class="box-info">
                                    <h4>
                                        <?php echo $menu['description']; ?>
                                    </h4>
                                </div>
                                <div class="view">
                                    <a href="<?php echo $m_link; ?>" title="<?php echo $menu['menu_title']; ?>"> 
                                        Xem tất cả
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
        <?php if ($first) { ?>
        </div>
        <script>
            $(document).ready(function () {
                var owl = $("#owl-demo1");
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
        <?php
    }
}
?>

