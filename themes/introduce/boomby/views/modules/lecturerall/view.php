<?php if (count($lecturers)) {
    ?>
	<div id="footer-testimonies" class="clearfix">
			<h2>Những Điều Bạn Nên Biết...</h2>
		<?php foreach ($lecturers as $lecturer) { ?>
		   <div class="testimony">
			  <p class="testimony-full-width"><?php echo $lecturer['sort_description'] ?><br> 
			   <span class="author"><?php echo $lecturer['name'] ?></span></p>
			   
			  <div class="testimony-full-width2"><?php echo $lecturer['description'] ?></div> 
			 
		   </div>
		 <?php } ?>
		 
		<p style="text-align: center;">
			<a href="/blog-nc,6300" class="join fivetips-joinlink" style="z-index: 999; float: none; border-radius: 4px;
			 padding: 7px 16px;">Xem Thêm →</a></p>
	</div>

    
	
<?php } ?>
