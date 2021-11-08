<?php if (count($listnews)) { ?>
    <div class="product relative-news">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2><a onclick="javascript:void(0)"><?php echo $widget_title ?></a></h2>
            </div>
        <?php } ?>
        <div class="product-cont">
            <div class="list grid">
                <?php foreach ($listnews as $news) { ?>
                    <div class="list-item">
                        <div class="list-content clearfix">
                            <div class="list-content-box">
                                <div class="list-content-img">
                                    <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>">
                                        <img src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's200_200/' . $news['image_name'] ?>" alt="<?php echo $news['news_title'] ?>">
                                    </a>
                                </div>
                                <div class="list-content-body">
                                    <div class="product-price-all clearfix">
                                        <div class="list-content-title">
                                            <h3> 
                                                <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>"><?php echo $news['news_title']; ?></a>
                                            </h3>
                                        </div>
                                        <div class="product-description">
                                            <p>
                                                <?php echo $news['news_sortdesc']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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

