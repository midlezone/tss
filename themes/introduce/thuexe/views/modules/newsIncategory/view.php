<div class="panel panel-default menu-vertical">
     <div class="gdl-header-wrapper project">
      <div class="gdl-header-left-bar">
      </div>
      <div class="gdl-header-left-bar"></div>
      <h3 class="gdl-header-title">Dịch Vụ</h3>
      <div class="gdl-header-divider"></div>
      <div class="clear"></div>
	</div>
   
    <div class="panel-body">
        <div class="list-group-list">
                    <?php foreach ($news as $ne) { ?>
					<div class="full-length">
						<div class="product">						
							<ul>
								<li>
									<div class="port-4 effect-1">
										<div class="image-box">
											 <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's500_500/' . $ne['image_name']; ?>" alt="<?php echo $ne['image_name']; ?>" />
										</div>
										<div class="text-desc">
											<h3><?php echo $ne['news_title']; ?></h3>
											<a href="<?php echo $ne['link']; ?>" class="btn">Xem Chi Tiết</a>
										</div>
									</div>
									
								</li>	
							</ul>
							<!-- Effect-4 End -->       
							
						</div>
					</div>
					
                    <?php } ?>
        </div>
    </div>
</div>