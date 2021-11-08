<div class="pro-search"> 
    <div class="search-result">
        <p class="textreport"><?php echo Yii::t('common', 'search_result', array('{results}' => $totalitem, '{keyword}' => '<span class="bold">' . $keyword . '</span>')); ?></p>
    </div>
	
    <?php if (count($data)) { ?>
	<?php echo "<pre/>"; print_r($data); die; ?>
	<div class="product-category"> 
       <div class="listnews">
		   <div class="list">
		     <?php
				foreach ($data as $ne) {
             ?>
				   <div class="list-item">
					 <div class="list-content">
						<div class="list-content-box">
						   <?php if ($ne['image_path'] && $ne['image_name']) { ?>
						   <div class="list-content-img">
							  <a href="<?php echo $ne['link']; ?>">
							  <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's500_500/' . $ne['image_name']; ?>">
							  </a>
						   </div>
						   <?php } ?>
						   <?php if($ne['news_category_id'] == '6300' || $ne['news_category_id'] == '6302' || $ne['news_category_id'] == '6301'
							  || $ne['news_category_id'] == '6290' || $ne['news_category_id'] == '6481'): ?>
						   <div class="list-content-body">
							  <span class="list-content-title">
							  <a href="<?php echo $ne['link']; ?>">
							  <?php echo $ne['news_title']; ?>
							  </a>
							  </span>
						   </div>
						   <?php else: ?>
						   <div class="list-content-body">
							  <span class="list-content-title">
							  <a href="<?php echo $ne['link']; ?>">
							  <?php echo $ne['news_title']; ?>
							  </a>
							  </span>
							  <div class="list-content-detail">
								 <p>
									<?php
									   echo $ne['news_sortdesc'];
									   ?>
									<?php if($ne['site_id'] == "931"): ?>
									<a href="<?php echo $ne['link']; ?>">Chi Tiết</a>
									<?php endif; ?>
								 </p>
							  </div>
						   </div>
						   <?php endif; ?>
						</div>
					 </div>
				  </div>
			   
			<?php } ?>
			</div>
		</div>
	</div>
        <div class="wpager">
            <?php
            $this->widget('common.extensions.LinkPager.LinkPager', array(
                'itemCount' => $totalitem,
                'pageSize' => $limit,
                'header' => '',
                'selectedPageCssClass' => 'active',
            ));
            ?>
        </div>
    <?php } ?>
</div>