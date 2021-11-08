<?php if (isset($data) && count($data)) { ?>
    <div id="" class="fullwidth_slider_solution everslider fullwidth-slider field-training">
        <div class="title">
            <div class="title-cont">
                <?php if ($show_widget_title) { ?>
                    <h2>
                        <?php echo $widget_title ?>
                    </h2>
                <?php } ?>
            </div>
        </div>
        <ul class="es-slides">
            <?php foreach ($data as $menu_id => $menu) { ?>
                <li>
                    <div class="panel panel-default page-in">
                        <div class="panel-heading">
                            <div class="box-images">
                                <a href="<?php echo $menu['menu_link'] ?>" <?php echo $menu['target']; ?> title="<?php echo $menu['menu_title'] ?>">
                                    <img alt="<?php echo $menu['menu_title'] ?>" src="<?php echo ClaHost::getImageHost() . $menu['icon_path'] . $menu['icon_name'] ?>" />
                                </a>
                            </div>
                            <a href="<?php echo $menu['menu_link'] ?>" title="<?php echo $menu['menu_title'] ?>" ><?php echo $menu['menu_title'] ?></a></div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function () {
        /* Fullwidth slider */
        $('.fullwidth_slider_solution').everslider({
            mode: 'carousel',
            moveSlides: 1,
            slideEasing: 'easeInOutCubic',
            slideDuration: 1000,
            navigation: true,
            keyboard: true,
            nextNav: '<span class="alt-arrow">Next</span>',
            prevNav: '<span class="alt-arrow">Next</span>',
            ticker: true,
            tickerAutoStart: false,
            tickerHover: true,
            tickerTimeout: 5000
        });

        /* Fullwidth slider with "fade" effect */

    });
</script>