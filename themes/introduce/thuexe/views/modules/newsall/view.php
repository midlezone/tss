<div class="eight columns blog-item-class blog-item-class-2 mb40">
   <div class="gdl-header-wrapper ">
      <div class="gdl-header-left-bar">
      </div>
      <div class="gdl-header-left-bar"></div>
      <h3 class="gdl-header-title">Tin tức mới nhất</h3>
      <div class="gdl-header-divider"></div>
      <div class="clear"></div>
   </div>
   <div class="blog-item-holder">
      <div class="row">

	   <?php foreach ($news as $ne) { ?>

			<?php if($ne['news_category_id'] != "5047" ): ?>
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
						  <div class="blog-date"><a href="<?php echo Yii::app()->createUrl('news/news/detail', array('id' => $ne['news_id'], 'alias' => $ne['alias'])) ?>">31.08.2016</a></div>
						  <div class="clear"></div>
					   </div>
					   <div class="blog-content">
						  <?php echo $ne['news_sortdesc'] ?>... 
						  <div class="clear"></div>
						  <a class="blog-continue-reading" href="<?php echo Yii::app()->createUrl('news/news/detail', array('id' => $ne['news_id'], 'alias' => $ne['alias'])) ?>"> Read More → </a>
					   </div>
					</div>
				 </div>
			<?php endif; ?>
	   <?php } ?>
         
         <div class="clear"></div>
      </div>
   </div>
   <div class="clear"></div>
</div>