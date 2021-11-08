<?php if (count($news)) { ?>
    <div class="title">
        <h2> 
            <a href="<?php echo $category['link'] ?>" title="<?php echo $category['cat_name'] ?>"><?php echo $category['cat_name'] ?></a>
        </h2>
        <div class="line"></div>
    </div>
    <div id="demo" >
        <div class="row">
            <div class="span12">
                <div id="owl-demo" class="">
                    <?php foreach ($news as $ne) { ?>
                        <div class="col-xs-4 ">
                            <div class="box-img">
                                <a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's280_280/' . $ne['image_name'] ?>" alt="<?php echo $ne['news_title'] ?>">
                                </a>
                            </div>
                            <div class="title">
                                <h3><a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>"><?php echo $ne['news_title']; ?></a></h3>
                            </div>
                            <div class="description-service">
                                <p><?php echo $ne['news_sortdesc']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script>
//    $(document).ready(function () {
//
//        function random(owlSelector) {
//            owlSelector.children().sort(function () {
//                return Math.round(Math.random()) - 0.5;
//            }).each(function () {
//                $(this).appendTo(owlSelector);
//            });
//        }
//
//        $(".owl-demo2").owlCarousel({
//            navigation: true,
//            items: 3,
//            itemsDesktop: [1199, 3],
//            itemsDesktopSmall: [979, 3],
//            autoPlay: true,
//            navigationText: [
//                "<i class='icon-chevron-left icon-white'></i>",
//                "<i class='icon-chevron-right icon-white'></i>"
//            ],
//            //Call beforeInit callback, elem parameter point to $("#owl-demo")
//            beforeInit: function (elem) {
//                random(elem);
//            }
//
//        });
//
//    });
</script>
