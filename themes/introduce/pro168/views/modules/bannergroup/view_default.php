
<div class="banner_home">
	 <ul>
		<?php
		foreach ($banners as $banner) {
			if ($banner['banner_type'] == Banners::BANNER_TYPE_FLASH)
				continue;
			$height = $banner['banner_height'];
			$width = $banner['banner_width'];
			?>
			<li>
				<a href="<?php echo $banner['banner_link'] ?>" <?php echo Banners::getTarget($banner) ?> title="<?php echo $banner['banner_name']; ?>">
					<img alt="<?php echo $banner['banner_name']; ?>" src="<?php echo $banner['banner_src']; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
					
				</a>
			</li>
		<?php } ?>
     </ul>
   
 </div>
