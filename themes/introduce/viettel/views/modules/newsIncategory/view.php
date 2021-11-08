<?php if ($news) { ?>
	<?php if ($news[0]['news_category_id'] == '6279'): ?>
		<div class="industrial-product outstanding-project">
			<div class="container1">
				<?php if ($show_widget_title) { ?>				
					<h3 class="module-title1"><span><?php echo $widget_title ?></span></h3>
				<?php } ?>
				<div class="cont">
					<div id="demo">
						<div id="owl-demo1" class="owl-carousel">
							<?php
							foreach ($news as $ne) {
								?>
								<div class="item">
									<div class="box-img">
										<div class="img-cate">
											<a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>" class="hover-banner"></a>
											<a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>">

												<img  src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's450_450/' . $ne['image_name']; ?>" alt="<?php echo $ne['image_name']; ?>"/>

											</a>
										</div>
									</div>
									<div class="box-info">
										<div class="title-about">
											<h3>
												<a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>">
													<?php echo $ne['news_title']; ?>
												</a>
											</h3>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $themUrl = Yii::app()->theme->baseUrl; ?>
		<script>
			$(document).ready(function () {
				var owl = $("#owl-demo1");
				owl.owlCarousel({
					itemsCustom: [
						[0, 1],
						[200, 1],
						[400, 2],
						[600, 3],
						[8000, 3],
						[1000, 3],
						[1200, 3],
					],
					navigation: false,
					autoPlay: true,
				});
			});
		</script>
		
		 <?php else: ?>
		 
				<div class="industrial-product outstanding-project">
			<div class="container1">
				<?php if ($show_widget_title) { ?>				
					<h3 class="module-title1"><span><?php echo $widget_title ?></span></h3>
				<?php } ?>
				<div class="cont">
					<div id="demo">
						<div id="owl-demo2" class="owl-carousel">
							<?php
							foreach ($news as $ne) {
								?>
								<div class="item">
									<div class="box-img">
										<div class="img-cate">
											<a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>" class="hover-banner"></a>
											<a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>">

												<img  src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's450_450/' . $ne['image_name']; ?>" alt="<?php echo $ne['image_name']; ?>"/>

											</a>
										</div>
									</div>
									<div class="box-info">
										<div class="title-about">
											<h3>
												<a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>">
													<?php echo $ne['news_title']; ?>
												</a>
											</h3>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $themUrl = Yii::app()->theme->baseUrl; ?>
		<script>
			$(document).ready(function () {
				var owl = $("#owl-demo2");
				owl.owlCarousel({
					itemsCustom: [
						[0, 1],
						[450, 1],
						[600, 2],
						[700, 3],
						[1000, 3],
						[1200, 3],
						[1400, 3],
					],
					navigation: false,
					autoPlay: true,
				});
			});
		</script>
		 <?php endif; ?>
		 
		 
		 
    <?php
}
?>