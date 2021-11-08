<div class="newcategoryinhome">
    <?php
    foreach ($cateinhome as $cat) {
        ?>
        <div class="center-main-center"> 
            <div class="title-main">
                <a href="<?php echo $cat['link']; ?>"><h3><?php echo $cat['cat_name']; ?></h3></a>
            </div><!--end-main-list-->
            <?php
            if (isset($data[$cat['cat_id']]['listnews'])) {
                $listnews = $data[$cat['cat_id']]['listnews'];
                if (count($listnews)) {
                    ?>
                    <div class="nd-news">
                        <?php
                        $first = ClaArray::getFirst($listnews);
                        $listnews = ClaArray::removeFirstElement($listnews);
                        ?>
                        <?php if ($first) { ?>
                            <div class="news-hot-title">
                                <a href="<?php echo $first['link']; ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $first['image_path'] . 's400_400/' . $first['image_name']; ?>" alt="<?php echo $first['news_title']; ?>" />
                                    <p>
                                        <?php echo $first['news_title']; ?>
                                    </p>
                                </a>
                            </div>
                        <?php } ?>
                        <?php if (count($listnews)) { ?>
                            <div class="box-list-news-title">
                                <div class="list">
                                    <?php foreach ($listnews as $news) { ?>
                                        <div class="list-item">
                                            <div class="list-content">
                                                <div class="list-content-box">
                                                    <div class="list-content-img">
                                                        <a href="<?php echo $news['link']; ?>">
                                                            <img src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's150_150/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>" />
                                                        </a>
                                                    </div>
                                                    <div class="list-content-body">
                                                        <span class="list-content-title">
                                                            <a href="<?php echo $news['link']; ?>">
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
</div>