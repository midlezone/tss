<?php if (count($listnews)) { ?>
    <div class="featured-photos list-news-relation">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2><a onclick="javascript:void(0)"><?php echo $widget_title ?></a></h2>
            </div>
        <?php } ?>
        <div class="cont">
            <div id="demo" >
                <div class="row">
                    <div class="span12">
                        <div id="owl-demo" class="owl-carousel owl-demo">
                            <?php foreach ($listnews as $news) { ?>
                                <div class="item ">
                                    <div class="box-img">
                                        <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>">
                                            <img src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's160_0/' . $news['image_name'] ?>" alt="<?php echo $news['news_title'] ?>">
                                        </a>
                                    </div>
                                    <div class="box-title"> 
                                        <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>"><?php echo $news['news_title']; ?></a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    $(document).ready(function () {

        //Sort random function
        function random(owlSelector) {
            owlSelector.children().sort(function () {
                return Math.round(Math.random()) - 0.5;
            }).each(function () {
                $(this).appendTo(owlSelector);
            });
        }

        $(".owl-demo").owlCarousel({
            navigation: true,
            items: 3,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3],
            autoPlay: true,
            navigationText: [
                "<i class='icon-chevron-left icon-white'></i>",
                "<i class='icon-chevron-right icon-white'></i>"
            ],
            //Call beforeInit callback, elem parameter point to $("#owl-demo")
            beforeInit: function (elem) {
                random(elem);
            }

        });

    });
</script>

