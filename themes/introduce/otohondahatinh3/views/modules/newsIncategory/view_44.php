<?php if (count($news)) { ?>
    <div class="service">
        <div class="container">
            <div class="row eventbox">
                <div class="col-sm-12 eventbox-title">
                    <h2><a href="<?php echo $category['link'] ?>" title="<?php echo $category['cat_name'] ?>"><?php echo $category['cat_name'] ?></a></h2>
                    <div class="line"></div>
                </div>
                <div class="col-sm-12">
                    <div id="eventbox" class="owl-carousel owl-theme">
                        <?php foreach ($news as $ne) { ?>
                            <div class="item"> 
                                <div class="eventbox-item-img"> 
                                    <a title="<?php echo $ne['news_title'] ?>" href="<?php echo $ne['link'] ?>"> 
                                        <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's100_100/' . $ne['image_name'] ?>" alt="<?php echo $ne['news_title'] ?>">
                                    </a>
                                </div>
                                <div class="eventbox-item-body">
                                    <div class="eventbox-item-title">
                                        <h3> 
                                            <a title="<?php echo $ne['news_title'] ?>" href="<?php echo $ne['link'] ?>"><?php echo $ne['news_title'] ?></a>               
                                        </h3> 
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    $(document).ready(function () {
        var owl = $("#eventbox");
        owl.owlCarousel({
            itemsCustom: [
                [0, 1],
                [450, 2],
                [600, 3],
                [700, 4],
                [1000, 6],
            ],
            autoPlay: true,
        });
    });
</script>
