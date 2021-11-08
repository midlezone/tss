<?php if (count($videos)) { ?>
<div class="col_lt">


	 <div class="bottom-center-main-right">
        <div class="four1 columns testimonial-item-class testimonial-item-class-3 mb40">
		   <div class="gdl-header-wrapper navigation-on">
			  <div class="gdl-header-left-bar"></div>
			  <div class="gdl-header-left-bar"></div>
			  <h3 class="gdl-header-title">Video</h3>
			  <div class="gdl-header-divider"></div>
			  <div class="clear"></div>
		   </div>
								
		   <div class="gdl-carousel-testimonial">
			 
			  <div class="testimonial-item-wrapper" style="height: 264px;">
				<?php
				foreach ($videos as $video) {
					?>
					<div class="video-player" style="width:420px; height: 400; max-height: 370px;overflow: hidden;padding-left:15px;">				
					<iframe width="375" height="350" frameborder="0" src="<?php echo $video['video_embed']; ?>?autohide=1" >
						</iframe>
					</div>
					
				<?php } ?>
				 
			  </div>
		   </div>
		</div>
    </div>
 </div>

<?php } ?>