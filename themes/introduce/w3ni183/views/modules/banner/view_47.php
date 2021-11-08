<?php if ($show_widget_title) { ?>
    <div class="title">
        <h2><?php echo $widget_title ?></h2>
    </div>
<?php } ?>
<?php if (count($banners)) { ?>
    <div class="box-js">
        <div class="js">
            <div class="jcarousel-wrapper">
                <a class="jcarousel-control-next" href="#" data-jcarouselcontrol="true"></a>
                <a class="jcarousel-control-prev" href="#" data-jcarouselcontrol="true"></a>
                <div class="jcarousel" data-jcarousel="true" data-jcarouselautoscroll="true">
                    <ul style="left: -220.376328959382px; top: 0px;">
                        <?php
                        foreach ($banners as $banner) {
                            $height = $banner['banner_height'];
                            $width = $banner['banner_width'];
                            $src = $banner['banner_src'];
                            $link = $banner['banner_link'];
                            if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
                                ?>
                                <li>
                                    <a href="<?php echo $link ?>" <?php echo Banners::getTarget($banner) ?>>
                                        <img src="<?php echo $src; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script type="text/javascript">
    /*<![CDATA[*/
    var jcarousel = $('.jcarousel').jcarousel({wrap: 'circular'});
    $('.jcarousel').jcarouselAutoscroll({autostart: true, interval: 4000, target: '+=1'});
    $('.jcarousel-pagination')
            .on('jcarouselpagination:active', 'a', function () {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function () {
                $(this).removeClass('active');
            })
            .on('click', function (e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                perPage: 1,
                item: function (page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });

    var jcarousel = $('.jcarousel').jcarousel({wrap: 'circular'});
    $('.jcarousel').jcarouselAutoscroll({autostart: true, interval: 3000, target: '+=1'});
    $('.jcarousel-control-prev').on('jcarouselcontrol:active', function () {
        $(this).removeClass('inactive');
    })
            .on('jcarouselcontrol:inactive', function () {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '-=1'
            });

    $('.jcarousel-control-next')
            .on('jcarouselcontrol:active', function () {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function () {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '+=1'
            });
    /*]]>*/
</script>



