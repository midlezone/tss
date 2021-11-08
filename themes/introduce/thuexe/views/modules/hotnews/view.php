<?php if ($hotnews) { ?>
    <div class="industrial-product outstanding-project">
        <div class="container1">
          
			<div class="gdl-header-wrapper ">
			  <div class="gdl-header-left-bar">
			  </div>
			  <div class="gdl-header-left-bar"></div>
			  <h3 class="gdl-header-title">Tin tức mới nhất</h3>
			  <div class="gdl-header-divider"></div>
			  <div class="clear"></div>
		   </div>
			
            <div class="cont">
                <div id="demo">
                    <div id="owl-demo" class="owl-carousel">
                        <?php
                        foreach ($hotnews as $ne) {
                            ?>
							<div class="four columns gdl-blog-widget">
							<div class="blog-content-wrapper">
							   <div class="blog-media-wrapper gdl-image">
								  <a href="<?php echo Yii::app()->createUrl('news/news/detail', array('id' => $ne['news_id'], 'alias' => $ne['alias'])) ?>">
								  <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's250_250/' . $ne['image_name'] ?>" alt="" style="opacity: 1;"></a>
							   </div>
							   <h2 class="blog-title">
								  <a href="<?php echo Yii::app()->createUrl('news/news/detail', array('id' => $ne['news_id'], 'alias' => $ne['alias'])) ?>"><?php echo $ne['news_title'] ?></a>
							   </h2>
							   <div class="blog-info-wrapper">
								  <div class="blog-date"><a href="<?php echo Yii::app()->createUrl('news/news/detail', array('id' => $ne['news_id'], 'alias' => $ne['alias'])) ?>"><?php echo date('Y-m-d H:i:s',$ne['publicdate']) ?></a></div>
								  <div class="clear"></div>
							   </div>
							   <div class="blog-content">
								  <?php echo $ne['news_sortdesc'] ?>... 
								  <div class="clear"></div>
								  <a class="blog-continue-reading" href="<?php echo Yii::app()->createUrl('news/news/detail', array('id' => $ne['news_id'], 'alias' => $ne['alias'])) ?>"> Read More → </a>
							   </div>
							</div>
						 </div>
                           
                        <?php } ?>
                    </div>
                </div>
				<a class="blog-continue-reading1" href="<?php echo Yii::app()->createUrl('/tin-tuc-nc,5034'); ?>"> View All → </a>
            </div>
        </div>
    </div>
    <?php $themUrl = Yii::app()->theme->baseUrl; ?>
    <script>
        $(document).ready(function () {
            var owl = $("#owl-demo");
            owl.owlCarousel({
                itemsCustom: [
                    [0, 1],
                    [450, 1],
                    [600, 2],
                    [700, 3],
                    [1000, 3],
                    [1200, 3],
                    [1400, 3],
                ],
                navigation: true,
                autoPlay: false,
            });
        });
    </script>   
    <?php
}
?>