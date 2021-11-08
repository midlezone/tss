
	<div class="layout1  layout4-content clearfix">
		<div class="title">
			<h2><a href="<?php echo $category['link'] ?>" title="<?php echo $widget_title ?>">
				  <span><?php echo $widget_title ?></span></a>
				   <a class="xemthem" href="<?php echo $category['link'] ?>" title="Trong nước">Xem Thêm</a>
			</h2>
			
		</div>
			<?php
				$first = ClaArray::getFirst($news);
				$news = ClaArray::removeFirstElement($news);
			?>
			<?php if ($first) { ?>
				<div class="col-nlc1 ">
						<div class="box-img">
							<a href="<?php echo $first['link']; ?>">
								<img class="img-zoom" alt="<?php echo $first['news_title']; ?>" src="<?php echo ClaHost::getImageHost() . $first['image_path'] . 's500_500/' . $first['image_name']; ?>" alt="<?php echo $first['news_title']; ?>" />

							</a>
						</div>		
					   <div class="box-info">
							<h2>
								 <a href="<?php echo $first['link']; ?>" title="<?php echo $first['news_title']; ?>"><?php echo $first['news_title']; ?></a>
							</h2>
							<div class="date">
								 <span class="sort-new"></span>
								 <img src="/themes/introduce/koji/css/img/icon_calender.png" alt="calender" title="calender">
								 <span><?php echo date('d-m-Y H:i:s',$first['publicdate']) ?></span>
							</div>
					   </div>
				</div>
			<?php } ?>
			<?php foreach ($news as $news) { ?>
				<div class="col-nlc2">
				   <div class="itemt-new-l">
						<div class="box-img">
								<a href="<?php echo $news['link']; ?>">
									<img class="img-zoom" alt="<?php echo $news['news_title']; ?>" src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's500_500/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>" />

								</a>
						</div>	
						 <div class="box-info">
								<h2>
									 <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>"><?php echo $news['news_title']; ?></a>
								</h2>
								<div class="date">
									 <span class="sort-new"></span>
									 <img src="/themes/introduce/koji/css/img/icon_calender.png" alt="calender" title="calender">
									 <span><?php echo date('d-m-Y H:i:s',$news['publicdate']) ?></span>
								</div>
						   </div>
					   </div>
				  </div>
			  <?php } ?>
	</div>
		