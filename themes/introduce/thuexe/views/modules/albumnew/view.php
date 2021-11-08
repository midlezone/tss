
<div class="panel panel-default menu-vertical">
     <div class="gdl-header-wrapper project">
      <div class="gdl-header-left-bar">
      </div>
      <div class="gdl-header-left-bar"></div>
      <h3 class="gdl-header-title">Thuê Mua Bán</h3>
      <div class="gdl-header-divider"></div>
      <div class="clear"></div>
	</div>
   
    <div class="panel-body">
        <div class="list-group-list">
					
                    <?php foreach ($albums as $album) { ?>
					<div class="full-length">
						<div class="product">						
							<ul>
								<li>
									<div class="port-4 effect-1">
										<div class="image-box">
											 <img src="<?php echo ClaHost::getImageHost() . $album['avatar_path'] . 's500_500/' . $album['avatar_name']; ?>" alt="<?php echo $album['avatar_name']; ?>" />
										</div>
										<div class="text-desc">
											<h3><?php echo $album['album_name']; ?></h3>
											<a href="<?php echo $album['link']; ?>" class="btn">Xem Chi Tiết</a>
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