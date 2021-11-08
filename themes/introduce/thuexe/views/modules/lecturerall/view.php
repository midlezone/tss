<?php if (count($lecturers)) {
    ?>
	
    <div class="bottom-center-main-right">
		<div class="gdl-header-wrapper navigation-on">
			  <div class="gdl-header-left-bar"></div>
			  <div class="gdl-header-left-bar"></div>
			  <h3 class="gdl-header-title">Khách hàng nói về CED</h3>
			  <div class="gdl-header-divider"></div>
			  <div class="clear"></div>
		 </div>
        <div class="four1 columns testimonial-item-class testimonial-item-class-3 mb40">
		   <div class="gdl-carousel-testimonial">
			 
			  <div class="testimonial-item-wrapper" style="height: 264px;">
			  	<div id="owl-demo2" class="owl-carousel">
				
			    <?php foreach ($lecturers as $lecturer) { ?>
						<div class="item_testimonial">
							<div class="testimonial_content"><?php echo $lecturer['description'] ?></div>
								<div class="testimonial-footer">
								<div class="avatar-testimonial">
								<img src="<?php echo ClaHost::getImageHost() . $lecturer['avatar_path'] . 's350_350/' . $lecturer['avatar_name']; ?>" alt="peter-packer" title="peter-packer" width="100" height="100"></div>
								<div class="title-regency">
									<h6> <a href="#" class="tp_primary_color" ><?php echo $lecturer['name'] ?></a> </h6>
									<div class="regency"><?php echo $lecturer['job_title'] ?></div>
								</div>
							</div>
						</div>
				<?php } ?>
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
							navigation: true,
							autoPlay: true,
						});
					});
				</script>   
								
		   </div>
		</div>
    </div>
	
<?php } ?>
