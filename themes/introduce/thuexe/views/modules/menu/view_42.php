<?php
if (isset($data) && count($data)) {
    ?>
    <?php if ($first) { ?>

    <?php } ?>
    <?php if ($first && $show_widget_title) { ?>
		<h3 class="title-style1"><?php echo $widget_title; ?><span class="title-block"></span></h3>
    <?php } ?>
    <div class="cont">
        <div class="row">
            <?php
            foreach ($data as $menu_id => $menu) {
                $m_link = $menu['menu_link'];
                ?>
                <div class="col-sm-6">
                    <div class="box-strategy-product">
						<div class="full-length">
							<div class="product">						
								<ul>
									<li>
										<div class="port-4 effect-1">
											<div class="image-box">
												<img  src="<?php echo ClaHost::getImageHost() . $menu['background_path'] . $menu['background_name']; ?>" alt="" />

											</div>
											<div class="text-desc">
												<h3> <?php echo $menu['menu_title']; ?></h3>
												<a href="<?php echo $m_link; ?>" class="btn">Xem Chi Tiết</a>
											</div>
										</div>
										
									</li>	
								</ul>
								<!-- Effect-4 End -->       
								
							</div>
						</div>
						
                                 
                    </div>
                </div>
            <?php } ?>
        </div>

        <?php if ($first) { ?>
        </div>
        <?php
    }
}
?>

