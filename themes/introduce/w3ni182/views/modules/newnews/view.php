<?php if (count($news)) { 
    $first = ClaArray::getFirst($news);
    $news = ClaArray::removeFirstElement($news);
    ?>
    <div class="cont-news clearfix">
        <div class="row">
            <?php if($first) { ?>
            <div class="col-sm-6 best-news">
                <div class="list grid">
                    <div class="list-item">
                        <div class="list-content">
                            <div class="list-content-box">
                                <div class="list-content-img">
                                    <a href="<?php echo $first['link'] ?>" title="<?php echo $first['news_title'] ?>">
                                        <img src="<?php echo ClaHost::getImageHost() . $first['image_path'] . 's350_350/' . $first['image_name']; ?>" alt="<?php echo $first['image_name']; ?>" />
                                    </a>
                                </div>
                                <div class="list-content-body">
                                    <h3 class="list-content-title">
                                        <a href="<?php echo $first['link'] ?>" title="<?php echo $first['news_title'] ?>"><?php echo $first['news_title'] ?></a>
                                    </h3> 
                                    <div class="list-content-detail">
                                        <p><?php echo $first['news_sortdesc'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php if(count($news)) { ?>
            <div class=" col-sm-6 extra-news">
                <div class="listnews">
                    <div class="list">
                        <?php foreach ($news as $ne) { ?>
                        <div class="col-sm-6 list-item">
                            <div class="list-content">
                                <div class="list-content-box">
                                    <div class="list-content-img">
                                        <a href="<?php echo $ne['link'] ?>" title="<?php echo $ne['news_title'] ?>">
                                            <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's150_150/' . $ne['image_name']; ?>" alt="<?php echo $ne['image_name']; ?>" />
                                        </a>
                                    </div>
                                    <div class="list-content-body">
                                        <h3 class="list-content-title">
                                            <a href="<?php echo $ne['link'] ?>" title="<?php echo $ne['news_title'] ?>">
                                                <?php echo $ne['news_title'] ?>
                                            </a>
                                        </h3>
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
    </div>
<?php } ?>
