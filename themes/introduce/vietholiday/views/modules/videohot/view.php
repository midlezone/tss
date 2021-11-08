<?php if (count($videos)) { ?>
    
	
	<div class="col-rt">


		 <script>
				jQuery(function(){ // on DOM load
					//syntax $(selector).youtubegallery()
					$('#youtubelist').youtubegallery()
				})

			</script>
				 <div class="bottom-center-main-right">
					<div class="four1 testimonial-item-class testimonial-item-class-3 mb40">
					   <div class="gdl-header-wrapper navigation-on">
						  <div class="gdl-header-left-bar"></div>
						  <div class="gdl-header-left-bar"></div>
						  <h3 class="gdl-header-title">Video</h3>
						  <div class="gdl-header-divider"></div>
						  <div class="clear"></div>
					   </div>
											
					   <div class="gdl-carousel-testimonial">
						 
						  <div class="testimonial-item-wrapper" style="height: 264px;">
							<div class="video-player" style="width:495px; height: 400; max-height: 370px;overflow: hidden;padding-left:15px;padding-top:15px">
								
									<ul id="youtubelist">
										<?php foreach ($videos as $video) { ?>
											<li><a href="<?php echo $video['video_embed']; ?>?autohide=1"></a></li>
										<?php } ?>
									</ul>
								
							</div>
							<a class="blog-continue-reading1" href="/video"> View All → </a>

						  </div>
					   </div>
					</div>
				</div>
 </div>
<?php } ?>