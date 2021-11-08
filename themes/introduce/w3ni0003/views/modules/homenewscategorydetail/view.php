<?php foreach ($cateinhome as $cat) { ?>
    <div class="center-main-center">
        <span><?php echo $cat['cat_name']; ?></span>
        <a href="<?php echo $cat['link'] ?>" class="next-tintuc">Xem tất Cả</a>
        <?php
        if (isset($data[$cat['cat_id']]['listnews'])) {
            ?>
            <div class="list">
                <?php foreach ($data[$cat['cat_id']]['listnews'] as $news) { ?>
                    <div class="list-item">
                        <div class="list-content">
                            <div class="list-content-box">
                                <div class="list-content-img">
                                    <a href="<?php echo $news['link']; ?>">
                                        <img src="<?php echo ClaHost::getImageHost().$news['image_path'].'s200_200/'.$news['image_name']; ?>">
                                    </a>
                                </div>
                                <div class="list-content-body">
                                    <span class="list-content-title">
                                        <a href="<?php echo $news['link']; ?>">
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
            </div>
        <?php } ?>
    </div>
<?php } ?>