
<div class="col-rt">
     <div class="col555">           
            <div class="boxTourHomeList1">
              <div class="doc_head_3">
				 <span>
						 ĐỐI TÁC CHIẾN LƯỢC
						 </span>
				</div>
                 <?php if ($banners) { ?>
						<div id="demo1" class="marquee">
						<?php foreach ($banners as $banner) {
									?>
							<img height="90" width="120" alt="<?php echo $banner['banner_name'] ?>" 
							src="<?php echo $banner['banner_src']; ?>" alt="<?php echo $banner['banner_name']; ?>">
<?php }
								?>
							
						</div>
						<script>
							$(document).ready(function () {
								$('.marquee').marquee({
								//speed in milliseconds of the marquee
								duration: 11000,
								//gap in pixels between the tickers
								gap: 450,
								//time in milliseconds before the marquee will start animating
								delayBeforeStart: 0,
								//'left' or 'right'
								direction: 'left',
								//true or false - should the marquee be duplicated to show an effect of continues flow
								duplicated: true
							});
								
							});
							
						</script>
						
					<?php } ?>

            </div>
      </div>
</div>

