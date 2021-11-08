<?php if (isset($data) && count($data)) { ?>
    <div class="home-destination">
        <div class="container">
		   <div class="title-m">
                
            </div>
            <div class="row">
                <?php foreach ($data as $cat) { ?>
				<div class="col-sm-2 col-xs-4">
					  <a href="<?php echo $cat['link'] ?>">
						<img class="img-zoom" src="<?php echo ClaHost::getImageHost() . $cat['image_path'] . 's500_500/' . $cat['image_name'] ?>">
						<span class="d_title"><?php echo $cat['cat_name']; ?></span>
					  </a>
				</div>
                    
                <?php } ?>
            </div>
        </div>
    </div>
<?php
}