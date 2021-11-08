<?php if (count($products)) { ?>	
	<div class="full-length">
    <div class="container1">
        <ul>
		<?php foreach ($products as $product) { ?>
		
		
        	<li>
            	<div class="port-1 effect-1">
                	<div class="image-box">
                    	<img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's500_500/' . $product['avatar_name'] ?>" alt="<?php echo $product['name'] ?>">

                    </div>
                    <div class="text-desc">
                    	<h3><?php echo $product['name']; ?></h3>
                    	<a href="#" class="btn">Learn more</a>
                    </div>
                </div>
            </li>
        <?php } ?>
        </ul>
		  </div>
    </div>
<?php } ?>
