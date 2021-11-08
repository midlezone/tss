
<?php $i =  0; ?>
<?php
foreach ($cateinhome as $cat) {
	$i++;
    ?>
    <div class="cate-in-home index_<?php echo $i ?>">
        <div class="title-news">
            <div class="news">

                
				<div class="panel-heading">
					<h2 class="panel-title"> <?php echo $cat['cat_name'] ?>
					</h2>
				</div>

            </div> 
        </div>
        <?php
        if (isset($data[$cat['cat_id']]['listnews'])) {
            $listnews = $data[$cat['cat_id']]['listnews'];
            if (count($listnews)) {
                ?>
                <div class="cont-news clearfix">
					
                    <?php if (count($listnews)) { ?>
                        <div class="extra-news">
                            <div class="listnews">
                                <div class="list">

                                    <?php foreach ($listnews as $news) { ?>
                                        <div class="list-item">
                                            <div class="list-content">
                                                <div class="list-content-box">
                                                    <div class="list-content-img">
                                                        <a href="<?php echo $news['link'] ?>">
                                                            <img src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's100_100/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>" />
                                                        </a>
                                                    </div>
                                                    <div class="list-content-body">
                                                        <span class="list-content-title">
                                                            <a href="<?php echo $news['link'] ?>">
                                                                <?php echo $news['news_title'] ?>
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
                </div>
				

                <?php
            }
        }
        ?>
    </div>
    <?php
}
?>

