  <?php if (count($news)) { 
    $first = ClaArray::getFirst($news);
    $news = ClaArray::removeFirstElement($news);
    ?>
	<div class="home-new-it">
	   <div class="tt"><img src="/themes/introduce/otohondahatinh/css/img/tin-tuc-su-kien.png" alt="" title=""></div>
	   <?php if($first) { ?>
			   <div class="top-sk">
				  <a href="<?php echo $first['link'] ?>" title="<?php echo $first['news_title'] ?>">
					<img src="<?php echo ClaHost::getImageHost() . $first['image_path'] . 's350_350/' . $first['image_name']; ?>" alt="<?php echo $first['image_name']; ?>" />
				  <span class="des">
				  <span><?php echo $first['news_title'] ?></span>
				  </span>
				  </a>
			   </div>
		<?php } ?>
       <?php if(count($news)) { ?>
	   <div class="bot-sk">
	    <?php foreach ($news as $ne) { ?>
			  <div class="bot-sk-it">
				 <div>
					<a class="img" href="<?php echo $ne['link'] ?>" title="<?php echo $ne['news_title'] ?>">
						<img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's150_150/' . $ne['image_name']; ?>" alt="<?php echo $ne['image_name']; ?>" />
					</a>
				 </div>
				 <div>
					<a class="name" href="<?php echo $ne['link'] ?>">
						<?php echo $ne['news_title'] ?></a>
					<div class="time"><?php echo date('d/m/Y',$ne['publicdate']) ?></div>
					<a class="btn-botmore" href="<?php echo $ne['link'] ?>" title="">Xem chi tiết</a>
				 </div>
			  </div>
		  <?php } ?>
		  <a class="see-more" href="/tin-tuc-nc,6051" title="">Xem tất cả &gt;&gt;</a>
	   </div>
	<?php } ?>
</div>
<?php } ?>