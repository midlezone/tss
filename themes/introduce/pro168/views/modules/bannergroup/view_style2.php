<?php if ($banners) { ?>
    <div id="demo">
		<div class="title-main">
				<div class="title">
					<h2>Đối Tác Của Chúng Tôi</h2>					 
				</div>
               
            </div>
        <div id="owl-demo3" class="owl-carousel">
            <?php foreach ($banners as $banner) {
                ?>
                <div class="item">
                    <div class="box-img">
                        <a href="#" t="" class="hover-banner"></a>
                        <a href="<?php echo $banner['banner_link'] ?>" <?php echo Banners::getTarget($banner) ?> target="_blank" title="<?php echo $banner['banner_name'] ?>"> 
                            <img alt="<?php echo $banner['banner_name'] ?>" src="<?php echo $banner['banner_src']; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>">
                        </a> 
                    </div>                             
                </div>
            <?php }
            ?>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var owl = $("#owl-demo3");
            owl.owlCarousel({
                itemsCustom: [
                    [0, 2],
                    [450, 3],
                    [600, 4],
                    [700, 5],
                    [1000, 6],
                    [1200, 7],
                    [1400, 8],
                    [1600, 9]
                ],
                navigation: true,
                autoPlay: true
            });
        });
    </script>
<?php } ?>

