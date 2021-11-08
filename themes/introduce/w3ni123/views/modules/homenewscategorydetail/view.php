<div class="post row">

    <?php
    $i = 0;
    foreach ($cateinhome as $cat) {
        $i++;
        ?>
        <div class="col-xs-4 <?php echo ($i % 3 != 0) ? 'color' . ($i % 3) : ''; ?>">
            <div class="box-all-nd">
                <div class="box-nd">
                    <?php
                    if (isset($data[$cat['cat_id']]['listnews'])) {

                        $listnews = $data[$cat['cat_id']]['listnews'];
                        $news = array_shift($listnews);
                        if ($news) {
                            ?>
                            <div class="nd-nd clearfix">	
                                <div class="img-box-nd">
                                    <div class="img-box">
                                        <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>">
                                            <img src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's280_280/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="title-box-ng">
                                    <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>" class="font-tahoma">
            <?php echo $news['news_title']; ?>
                                    </a>
                                </div>
                                <p>
                                    <?php
                                    echo $news['news_sortdesc'];
                                    ?>
                                </p>	
                            </div>	
                        <?php } ?>
    <?php } ?>
                </div><!--end-box-nd-->	
            </div>
        </div>
<?php } ?>
</div>