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
<?php if (count($news)) { ?>
    <div class="event">
        <div class="container">
            <div class="row news-box">
                <div class="col-sm-12 news-box-title eventbox-title">
                    <h2>
                        <a href="<?php echo $category['link'] ?>" title="<?php echo $category['cat_name'] ?>"><?php echo $category['cat_name'] ?></a>
                    </h2>
                    <div class="line"></div>
                </div>
                <div id="news-box-list-item" class="col-sm-12 owl-carousel owl-theme " style="opacity: 1; display: block;">
                    <?php foreach ($news as $ne) { ?>
                        <div class="item">
                            <div class="list-content-img">
                                <a href="<?php echo $ne['link'] ?>" title="<?php echo $ne['news_title'] ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's250_250/' . $ne['image_name'] ?>" alt="<?php echo $ne['news_title'] ?>">
                                </a>
                            </div>
                            <div class="list-content-body">
                                <h3 class="list-content-title">
                                    <a href="<?php echo $ne['link'] ?>" title="<?php echo $ne['news_title'] ?>"><?php echo $ne['news_title'] ?></a>
                                </h3> 
                                <div class="list-content-detail">

                                    <!--<p><?php // echo $ne['news_sortdesc'] ?></p>-->
                                    <p><?php echo cut_string($ne['news_sortdesc'], 165) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-sm-12 news-box-end ">
                    <?php $themUrl = Yii::app()->theme->baseUrl; ?>
                    <img src="<?php echo $themUrl ?>/css/img/bg_end.png" alt="end">
                </div>
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