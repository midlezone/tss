<?php
foreach ($cateinhome as $cat) {
    ?>
    <div class="cate-in-home">
        <div class="title-news">
            <div class="news">

                <div class="panel-title">
                    <h2><a href="<?php echo $cat['link'] ?>" title="<?php echo $cat['cat_name'] ?>">
                            <span>
                                <?php echo $cat['cat_name'] ?>
                            </span>
                        </a></h2>
                </div>

            </div> 
        </div>
        <?php
        if (isset($data[$cat['cat_id']]['listnews'])) {
            $listnews = $data[$cat['cat_id']]['listnews'];
            if (count($listnews)) {
                ?>
                <div class="cont-news clearfix">
                    <div class="best-news">
                        <div class="list grid">
                            <?php
                            $first = ClaArray::getFirst($listnews);
                            $listnews = ClaArray::removeFirstElement($listnews);
                            ?>
                            <div class="list-item">
                                <div class="list-content">
                                    <div class="list-content-box">
                                        <div class="list-content-img">
                                            <a href="<?php echo $first['link'] ?>">
                                                <img src="<?php echo ClaHost::getImageHost() . $first['image_path'] . 's250_250/' . $first['image_name']; ?>" alt="<?php echo $first['news_title']; ?>" />
                                            </a>
                                        </div>
                                        <div class="list-content-body">
                                            <span class="list-content-title">
                                                <a href="<?php echo $first['link'] ?>">
                                                    <?php echo $first['news_title']; ?>
                                                </a>
                                            </span> 
                                            <div class="list-content-detail">
                                                <p><?php echo $first['news_sortdesc'] ?>
                                                </p>
                                            </div>
                                            <div class="list-content-viewdetail">
                                                <a href="<?php echo $first['link'] ?>" class="more-tintuc">Xem Tiếp...</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
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
                                                        <div class="list-content-detail">
                                                            <p><?php echo $news['news_sortdesc'] ?></p>
                                                        </div>
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

