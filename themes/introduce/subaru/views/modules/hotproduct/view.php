<?php if (count($products)) { ?>
    <div class="container">
        <?php if ($show_widget_title) { ?>
           
			<div class="title-m">
                <h2>
					<a href="" title="<?php echo $widget_title; ?></">
					   <?php echo $widget_title; ?></a>
				</h2>
            </div>
			
        <?php } ?>
        <div class="cont">
            <div id="demo">
                <div id="owl-demo" class="owl-carousel">
                    <?php
                    foreach ($products as $product) {
                        ?>

                        <div class="item">
                            <div class="box-cont">
                                <div class="box-img">
                                    <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"> 
                                        <img alt="<?php echo $product['name'] ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's500_500/' . $product['avatar_name'] ?>"> 
                                    </a> 
                                </div>
                                <div class="box-info">
                                    <h3>
                                        <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a> 
                                    </h3>
                                    <div class="price">
                                        <span>Giá:</span>  
                                        <span><?php echo $product['price_text']; ?></span>
                                    </div>
									<div class="view-detail view-detail-item-sc">
                                                <a href="<?php echo $product['link'] ?>">Xem ngay</a>
                                      </div>
                                   
<!--                                    <div class="hangsp">

                                        Hãng: 
                                        <span class="blue">
                                            <?php
                                            ?>
                                            CRW
                                        </span>
                                    </div>
                                    <div class="xuatxu">
                                        <span>Xuất Xứ :</span> Anh
                                    </div>-->
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
            var owl = $("#owl-demo");
            owl.owlCarousel({
                itemsCustom: [
                    [0, 1],
                    [450, 1],
                    [600, 2],
                    [700, 3],
                    [1000, 4],
                    [1200, 4],
                    [1400, 5],
                    [1600, 6]
                ],
                navigation: true,
                autoPlay: true,
            });
        });
    </script>
</div>

