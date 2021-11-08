
<div class="layout layout4 news-video clearfix">     	
			<h3 class="module-title "><span>Tin tức</span></h3>     
			<div class="content-m">
				<div id="k2ModuleBox159" class="k2ItemsBlock" style="padding:5px;">
					<ul>
						<?php foreach ($news as $ne) { ?>
						   <li class="even">     
							  <img src="http://www.viettel-hanoi.vn/images/new.gif" alt="New">
								<a class="moduleItemTitle" href="<?php echo Yii::app()->createUrl('news/news/detail', array('id' => $ne['news_id'], 'alias' => $ne['alias'])) ?>"><?php echo $ne['news_title'] ?></a>
							</li>
					   <?php } ?>
					</ul>
					
				</div>
			</div>
	 
</div>
