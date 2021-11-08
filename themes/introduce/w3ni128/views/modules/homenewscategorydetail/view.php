<div class="categoryinhome">
    <?php
    $i = 0;
    foreach ($cateinhome as $cat) {
        $i++;
        ?>
        <div class="center-main-center">
            <span>
                <a href="<?php echo $cat['link']; ?>">
                    <?php echo $cat['cat_name']; ?>
                </a>
            </span>
            <div class="listnews">
                <div class="list">
                    <?php
                    if (isset($data[$cat['cat_id']]['listnews'])) {
                        //
                        $listnews = $data[$cat['cat_id']]['listnews'];
                        //
                        foreach ($listnews as $news) {
                            ?>
                            <div class="list-item">
                                <div class="list-content">
                                    <div class="list-content-box">
                                        <div class="list-content-img">
                                            <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>">
                                                <img src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's150_150/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>"/>
                                            </a>
                                        </div>
                                        <div class="list-content-body">
                                            <span class="list-content-title">
                                                <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>">
                                                    <?php echo $news['news_title']; ?>
                                                </a>
                                            </span>
                                            <div class="list-content-detail">
                                                <p>
                                                    <?php
                                                    echo $news['news_sortdesc'];
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div><!--end-box-nd-->	
            </div>
        </div>
    <?php } ?>
</div>