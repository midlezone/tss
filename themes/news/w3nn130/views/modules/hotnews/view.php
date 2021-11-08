<script type="text/javascript">
    jQuery(document).ready(function($) {
        // main slider
        $('.slider').cycle({
            fx: 'fade',
            speed: 300,
            timeout: 5000,
            pause: 1,
            cleartype: true,
            cleartypeNoBg: true,
            pager: 'ul.slider_nav',
            after: feature_after,
            before: onbefore,
            pagerAnchorBuilder: function(idx, slide) {
                return 'ul.slider_nav li:eq(' + (idx) + ')';
            }
        });
        $('ul.slider_nav li').hover(function() {
            $('.slider').cycle('pause');
        }, function() {
            $('.slider').cycle('resume');
        });


        function feature_after() {
            $('.slider_items .slider_caption').stop().animate({opacity: 1, bottom: 0}, {queue: false, duration: 300});
            $('.feature_video_icon, .feature_slide_icon, .feature_article_icon').stop().animate({top: 0}, {queue: true, duration: 300});
        }

        function onbefore() {
            $('.slider_items .slider_caption').stop().animate({opacity: 1, bottom: '-120px'}, {queue: false, duration: 300});
            $('.feature_video_icon, .feature_slide_icon, .feature_article_icon').animate({top: '-40px'}, {queue: true, duration: 300});
        }

        //slider nav
        jQuery('.slider_nav li:not(.activeSlide) a').click(
                function() {
                    jQuery('.slider_nav li a').css('opacity', 0.7);
                    jQuery(this).css('opacity', 1);
                }
        );


        jQuery('.slider_nav li:not(.activeSlide) a').hover(
                function() {
                    jQuery(this).stop(true, true).animate({opacity: 1}, 300);
                }, function() {
            jQuery(this).stop(true, true).animate({opacity: 0.7}, 300);
        }
        );

    });
</script>

<?php
if ($hotnews && count($hotnews)) {
    ?>

    <div id="feature_outer" class="box_outer">
        <div class="Feature_news">
            <div class="slider_wrap">
                <div class="slider_items">
                    <div class="slider" style="position: relative;">

                        <?php
                        foreach ($hotnews as $news) {
                            $detailurl = Yii::app()->createUrl('/news/news/detail', array('id' => $news['news_id'], 'alias' => $news['alias']));
                            ?>
                            <div class="slider_item" style="position: absolute; top: 0px; left: 0px; z-index: 7; opacity: 0; display: none; width: 615px; height: 340px;">
                                <div style="position:relative; overflow:hidden;">
                                    <a href="<?php echo $detailurl; ?>">
                                        <img alt="<?php echo $news['news_title'] ?>" src="<?php echo $news['avatar'] ?>">		
                                        <span class="feature_article_icon" style="top: 0px;"></span>
                                    </a>
                                    <div class="slider_caption" style="opacity: 1; bottom: 0px;">
                                        <h2><a href="<?php echo $detailurl; ?>"><?php echo $news['news_title'] ?></a></h2>
                                        <p>
                                            <?php echo $news['news_sortdesc']; ?>
                                        </p>
                                    </div> <!--End Slider Caption-->
                                </div>
                            </div> <!--Slider Item-->
                        <?php } ?>
                    </div> <!--Slider-->
                </div> <!--Slider Items-->
                <ul class="slider_nav">
                    <?php
                    foreach ($hotnews as $news) {
                        $detailurl = Yii::app()->createUrl('/news/news/detail', array('id' => $news['news_id'], 'alias' => $news['alias']))
                        ?>
                        <li class="">
                            <a href="<?php echo $detailurl; ?>" style="opacity: 0.7;">
                                <img title="<?php echo $news['news_title'] ?>" alt="<?php echo $news['news_title'] ?>" src="<?php echo $news['avatar'] ?>">
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <div class="clear"></div>
            </div> <!--Slider_wrap-->
        </div> <!--End Feature news-->
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // main slider
            $('.slider').cycle({
                fx: 'fade',
                speed: 300,
                timeout: 5000,
                pause: 1,
                cleartype: true,
                cleartypeNoBg: true,
                pager: 'ul.slider_nav',
                after: feature_after,
                before: onbefore,
                pagerAnchorBuilder: function(idx, slide) {
                    return 'ul.slider_nav li:eq(' + (idx) + ')';
                }
            });
            $('ul.slider_nav li').hover(function() {
                $('.slider').cycle('pause');
            }, function() {
                $('.slider').cycle('resume');
            });


            function feature_after() {
                $('.slider_items .slider_caption').stop().animate({opacity: 1, bottom: 0}, {queue: false, duration: 300});
                $('.feature_video_icon, .feature_slide_icon, .feature_article_icon').stop().animate({top: 0}, {queue: true, duration: 300});
            }

            function onbefore() {
                $('.slider_items .slider_caption').stop().animate({opacity: 1, bottom: '-120px'}, {queue: false, duration: 300});
                $('.feature_video_icon, .feature_slide_icon, .feature_article_icon').animate({top: '-40px'}, {queue: true, duration: 300});
            }

            //slider nav
            jQuery('.slider_nav li:not(.activeSlide) a').click(
                    function() {
                        jQuery('.slider_nav li a').css('opacity', 0.7);
                        jQuery(this).css('opacity', 1);
                    }
            );


            jQuery('.slider_nav li:not(.activeSlide) a').hover(
                    function() {
                        jQuery(this).stop(true, true).animate({opacity: 1}, 300);
                    }, function() {
                jQuery(this).stop(true, true).animate({opacity: 0.7}, 300);
            }
            );

        });
    </script>
<?php } ?>