<div class="full-length">
		<div class="product">						
			<ul>
				 <?php foreach ($projects as $projects) { ?>
						<li>
							<div class="port-1 effect-1">
								<div class="image-box">									
									<img width="350" height="200"  src="<?php echo ClaHost::getImageHost().$projects['image_path'] . 's250_250/' . $projects['image_name'] ?>" alt="<?php echo $projects['name'] ?>">
								</div>
								<div class="text-desc">
									<h3><?php echo $projects['name'] ?></h3>
									<a href="<?php echo $projects['link']?>" class="btn">Xem Chi Tiết</a>
								</div>
							</div>
							
						</li>			
				<?php } ?>
			</ul>       
			<!-- Effect-1 End -->       
			
		</div>
</div>
