<?php foreach ($cateinhome as $cat) { ?>
    <div class="center-main-center">
        <div class="box_news_header radi3">
            <h3><?php echo $cat['cat_name']; ?></h3>
            <div class="view-all"> <a title="Xem tất cả" href="<?php echo $cat['link'] ?>">Xem tất cả</a>
            </div>
        </div>
        <?php
        if (isset($data[$cat['cat_id']]['listnews'])) {

            $listnews = $data[$cat['cat_id']]['listnews'];
            $news = array_shift($listnews);
            ?>
            <div class="list">
                <?php if ($news) { ?>
                    <div class="list-item">
                        <div class="list-content">
                            <div class="list-content-box">
                                <div class="list-content-img">
                                    <a href="<?php echo $news['link']; ?>">
                                        <img src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's200_200/' . $news['image_name']; ?>">
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
            <?php if (count($listnews)) { ?>
                <div class="list-group-list">
                    <ul class="list-group">
                        <?php foreach ($listnews as $news){ ?>
                        <li class="list-group-item">
                            <a href="<?php echo $news['link'];?>"><?php echo $news['news_title']; ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
<?php } ?>