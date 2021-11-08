<?php
if (count($news)) {
    $first = ClaArray::getFirst($news);
    $news = ClaArray::removeFirstElement($news);
    ?>
    <div class="list-news">
        <div class="title">
            <?php if ($show_widget_title) { ?>
                <h2><a><?php echo $widget_title; ?></a></h2>
            <?php } ?>
        </div>
        <div class="news-cont clearfix">
            <div class="news-cont-left">
                <?php if ($first) { ?>
                    <div class="box-img">
                        <a href="<?php echo $first['link'] ?>" title="<?php echo $first['news_title'] ?>">
                            <img src="<?php echo ClaHost::getImageHost() . $first['image_path'] . 's350_350/' . $first['image_name']; ?>" alt="<?php echo $first['image_name']; ?>" />
                        </a>
                    </div>
                    <div class="box-info">
                        <div class="box-title">
                            <h3 class="list-content-title">
                                <a href="<?php echo $first['link'] ?>" title="<?php echo $first['news_title'] ?>"><?php echo $first['news_title'] ?></a>
                            </h3> 
                        </div>
                        <div class="box-info-cont">
                            <p>
                                <?php echo $first['news_sortdesc'] ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php if (count($news)) { ?>
                <div class="news-cont-right">
                    <?php foreach ($news as $ne) { ?>
                        <div class="customer-details clearfix">
                            <div class="box-img">
                                <a href="<?php echo $ne['link'] ?>" title="<?php echo $ne['news_title'] ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's150_150/' . $ne['image_name']; ?>" alt="<?php echo $ne['image_name']; ?>" />
                                </a>
                            </div>
                            <div class="box-info">
                                <div class="box-title">
                                    <h3 class="list-content-title">
                                        <a href="<?php echo $ne['link'] ?>" title="<?php echo $ne['news_title'] ?>">
                                            <?php echo $ne['news_title'] ?>
                                        </a>
                                    </h3> 
                                </div>
                                <div class="box-info-cont">
                                    <p>
                                        <?php echo $ne['news_sortdesc'] ?>
                                    </p>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>
