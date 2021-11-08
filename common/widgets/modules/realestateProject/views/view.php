<?php if (isset($projects) && count($projects)) { ?>
   
	 <div class="newcategoryinhome well animated fadeOutDown" data-sb="fadeInDown" data-sb-hide="fadeOutDown">
            <div class="box da">					
						<div class="title clearfix">
							<h2>Dự án nổi bật</h2>
							<div class="line"></div>
						</div>
                        <div class="da-cont">
                            <div class="list grid">
                                <div id="owl-demo" class="owl-carousel owl-theme triggerAnimation animated" data-animate="fadeInUp">
                                    <?php foreach ($projects as $project) {	?>
                                        <div class="list-item">
                                            <div class="list-content1">
                                                <div class="list-content-box">
                                                    <div class="list-content-img">                                                      
														 <a href="<?php echo $project['link'] ?>">
															<img src="<?php echo ClaHost::getImageHost() . $project['image_path'] . 's250_250/' . $project['image_name'] ?>" alt="<?php echo $project['name'] ?>">
														</a>														
                                                    </div>
                                                    <div class="list-content-body">
                                                        <span class="list-content-title">
                                                            <a title="" href="<?php echo $project['link']?>">
                                                               <?php echo $project['name'] ?>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <link href='<?php echo Yii::app()->theme->baseUrl; ?>/owl-carousel/owl.carousel.css' rel='stylesheet' type='text/css' />
                            <link href='<?php echo Yii::app()->theme->baseUrl; ?>/owl-carousel/owl.theme.css' rel='stylesheet' type='text/css' />
                            <script type="text/javascript" src='<?php echo Yii::app()->theme->baseUrl; ?>/owl-carousel/owl.carousel.min.js'></script>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $("#owl-demo").owlCarousel({
                                        autoPlay: 4000,
                                        items: 4,
                                        itemsDesktop: [1199, 3],
                                        itemsDesktopSmall: [979, 3]
                                    });
                                });
                            </script>
                        </div>
                 
            </div>      
    </div>
	
<?php } ?>

