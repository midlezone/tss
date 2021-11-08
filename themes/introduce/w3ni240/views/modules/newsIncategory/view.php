<?php
if (count($news)) {
    $first = ClaArray::getFirst($news);
    $listnews = ClaArray::removeFirstElement($news);
    ?>
    <div class="list-news">
        <div class="title">
            <h2><a href="<?php echo $category['link'] ?>" title="<?php echo $category['cat_name'] ?>"><?php echo $category['cat_name'] ?></a></h2>
        </div>
        <div class="news-cont clearfix">

            <div class="news-cont-left">
                <div class="box-img">
                    <a href="<?php echo $first['link']; ?>" title="<?php echo $first['news_title']; ?>">
                        <img alt="<?php echo $first['news_title']; ?>" src="<?php echo ClaHost::getImageHost() . $first['image_path'] . 's300_300/' . $first['image_name']; ?>" alt="<?php echo $first['news_title']; ?>" />
                    </a>

                </div>
                <div class="box-info">
                    <div class="box-title">
                        <h3><a href="<?php echo $first['link']; ?>" title="<?php echo $first['news_title']; ?>"><?php echo $first['news_title']; ?></a></h3>

                    </div>
                    <div class="box-info-cont">
                        <p><?php echo $first['news_sortdesc']; ?></p>
                    </div>
                </div>
            </div>
            <?php if (count($listnews)) { ?>
                <div class="news-cont-right">
                    <?php foreach ($listnews as $news) { ?>
                        <div class="customer-details clearfix">
                            <div class="box-img">
                                <a href="<?php echo $news['link']; ?>">
                                    <img alt="<?php echo $news['news_title']; ?>" src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's100_100/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>" />
                                </a>
                            </div>
                            <div class="box-info">
                                <div class="box-title">
                                    <h3><a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title'] ?>"><?php echo $news['news_title'] ?></a></h3>

                                </div>
                                <div class="box-info-cont">
                                    <p><?php echo $news['news_sortdesc'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>

<?php } ?>

