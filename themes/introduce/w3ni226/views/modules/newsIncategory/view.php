<?php if (count($news)) { ?>
    <div id="demo" >
        <div class="row">
            <div class="span12">
                <div id="owl-demo" class="owl-carousel owl-demo">
                    <?php foreach ($news as $ne) { 
                        if ($ne['news_hot']) {
                        ?>
                        <div class="item ">
                            <div class="box-img">
                                <a href="<?php echo $ne['link'] ?>" title="<?php echo $ne['news_title'] ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's180_180/' . $ne['image_name'] ?>" alt="<?php echo $ne['news_title'] ?>">
                                </a>
                            </div>
                            <div class="title">
                                <h2>
                                    <a href="<?php echo $ne['link'] ?>" title="<?php echo $ne['news_title'] ?>"><?php echo $ne['news_title'] ?></a>
                                </h2>
                            </div>
                        </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php $themUrl = Yii::app()->theme->baseUrl; ?>
<script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script> 

<script>
    $(document).ready(function () {

        function random(owlSelector) {
            owlSelector.children().sort(function () {
                return Math.round(Math.random()) - 0.5;
            }).each(function () {
                $(this).appendTo(owlSelector);
            });
        }

        $(".owl-demo").owlCarousel({
            navigation: true,
            items: 4,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3],
            autoPlay: true,
            navigationText: [
                "<i class='icon-chevron-left icon-white'></i>",
                "<i class='icon-chevron-right icon-white'></i>"
            ],
            beforeInit: function (elem) {
                random(elem);
            }
        });
    });
</script>