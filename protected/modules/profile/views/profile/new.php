
<div class="product-order">
    <h3 class="username-title">Khuyến Mãi</h3>
    <div style="padding-top:0px;" id="orders-grid" class="grid-view">
      <div class="listnews">
		   <div class="list">
			  <?php
				 foreach ($listnews as $ne) {
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
							   
							   <div class="list-content-body">
								  <span class="list-content-title">
								  <a href="<?php echo $ne['link']; ?>">
								  <?php echo $ne['news_title']; ?>
								  </a>
								  </span>
							   </div>
							
							</div>
						 </div>
					  </div>
			  
			  <?php } ?>
			  
		   </div>
		</div>
		
    </div>
</div>