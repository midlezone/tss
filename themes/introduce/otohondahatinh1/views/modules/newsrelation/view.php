<?php

function cut_string($str, $length) {
    $strCut = mb_substr($str, 0, $length, 'utf-8');

    //add ... if str > $length 
    if (mb_strlen($str, 'utf-8') > $length) {
        $strCut = mb_substr($strCut, 0, mb_strrpos($strCut, " ", 0, 'utf-8'), 'utf-8');
        $strCut = htmlspecialchars($strCut);
        $strCut .= "...";
    }

    return $strCut;
}
?>
<?php if (count($listnews)) { ?>
    <div class="event trong">
        <div class="row news-box">
    <?php if ($show_widget_title) { ?>
                <div class="col-sm-12 news-box-title eventbox-title title_relation">
                    <h2>
                        <a onclick="javascript:void(0)"><?php echo $widget_title ?></a>
                    </h2>
                    <div class="line"></div>
                </div>
                <?php } ?>
            <div id="news-box-list-item" class="col-sm-12 owl-carousel owl-theme lienquan">
    <?php foreach ($listnews as $news) { ?>
                    <div class="item">
                        <div class="list-content-img">
                            <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>">
                                <img src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's250_250/' . $news['image_name'] ?>" alt="<?php echo $news['news_title'] ?>">
                            </a>
                        </div>
                        <div class="list-content-body">
                            <h3 class="list-content-title" title="<?php echo $news['news_title']; ?>">
                                <a href="<?php echo $news['link']; ?>"><?php echo $news['news_title']; ?></a>
                            </h3> 
                            <div class="list-content-detail">
                                <p><?php echo cut_string($news['news_sortdesc'],110); ?></p>
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
        var owl2 = $("#news-box-list-item");
        owl2.owlCarousel({
            items: 4, //10 items above 1000px browser width
            itemsDesktop: [1000, 3], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 2], // betweem 900px and 601px
            itemsTablet: [600, 2], //2 items between 600 and 0
            itemsMobile: 1, // itemsMobile disabled - inherit from itemsTablet option
            autoPlay: true,
        });

    });
</script>