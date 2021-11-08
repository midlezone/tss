<div class="newcategoryinhome">
    <?php
    foreach ($cateinhome as $cat) {
        ?>
	<?php if ($cat['cat_name'] != 'Tin tức') { ?>
		
	
        <div class="center-main-center"> 
			
            <div class="title-rpoduct-home">
            <h3><a href="<?php echo $cat['link']; ?>" title="<?php echo $cat['cat_name']; ?>"><?php echo $cat['cat_name']; ?></a></h3>
            </div>
           
            <?php
            if (isset($data[$cat['cat_id']]['listnews'])) {
                $listnews = $data[$cat['cat_id']]['listnews'];

                if (count($listnews)) {
                    ?>

                    <div class="nd-news clearfix">
                                          
                        <?php if (count($listnews)) { ?>

                            <div class="box-list-news-title">
                                <div class="list">
                                    <?php foreach ($listnews as $news) { ?>
		
                                            <div class="list-item">
                                                <div class="list-content">
                                                    <div class="list-content-box">
                                                        <div class="list-content-img">
                                                            <a href="<?php echo $news['link']; ?>" >
                                                                <img alt="<?php echo $news['news_title']; ?>" src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's500_500/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>" />
                                                            </a>
                                                        </div>
                                                        <div class="list-content-body">
                                                            <span class="list-content-title">
                                                                <a href="<?php echo $news['link']; ?>" style="color: #000;">
                                                                    <?php echo $news['news_title']; ?>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>
		
	<?php } ?>
			
    <?php } ?>
</div>