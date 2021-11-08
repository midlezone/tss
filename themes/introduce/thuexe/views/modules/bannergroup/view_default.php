<?php if ($banners && count($banners)) { ?>
    <div class="doi-tac well animated fadeOutDown"  data-sb="fadeInDown" data-sb-hide="fadeOutDown">
        <div class="container">
            <?php if ($show_widget_title) { ?>
                <div class="title-categories">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 style="color: #fe7e00"><?php echo $widget_title ?></h2>
                        </div>
                        <div class="line"></div>
                    </div>
                </div>
            <?php } ?>
            <div class="grid_12">
                <div id="fullwidth_slider" class="everslider fullwidth-slider">
                    <ul class="es-slides">
                        <?php foreach ($banners as $banner) { ?>
                            <li> 
                                <a href="" target="_blank" title="eurovision"> 
                                    <img <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> src="<?php echo $banner['banner_src']; ?>" alt="<?php echo $banner['banner_name'] ?>">
                                </a>
                                <div class="nd-banner">
                                    <p class="name"><?php echo nl2br($banner['banner_description']) ?></p>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
<?php } ?>
<?php $themUrl = Yii::app()->theme->baseUrl; ?>
<script type="text/javascript" src="<?= $themUrl ?>/js/jquery.everslider.min.js"></script> 
<script type="text/javascript">
    $(document).ready(function () {
        /* Fullwidth slider */
        $('#fullwidth_slider').everslider({
            mode: 'carousel',
            moveSlides: 1,
            slideEasing: 'easeInOutCubic',
            slideDuration: 1000,
            navigation: true,
            keyboard: true,
            nextNav: '<span class="alt-arrow">Next</span>',
            prevNav: '<span class="alt-arrow">Next</span>',
            ticker: true,
            tickerAutoStart: true,
            tickerHover: true,
            tickerTimeout: 5000
        });

        /* Fullwidth slider with "fade" effect */

    });
</script>


