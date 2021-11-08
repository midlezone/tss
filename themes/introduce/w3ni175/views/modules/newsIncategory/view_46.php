<?php if (count($news)) { ?>
    <div class="tooltip">
        <div class="box-title">
            <h2>
                <a href="<?php echo $category['link'] ?>" title="<?php echo $category['cat_name'] ?>"><?php echo $category['cat_name'] ?></a>
            </h2>
        </div>
        <div class="listnews">

            <?php foreach ($news as $ne) { ?>
                <div class="list-item">
                    <div class="list-content"> 
                        <div class="list-content-box">
                            <div class="list-content-img">
                                <a href="<?php echo $ne['link'] ?>" title="<?php echo $ne['news_title'] ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's100_100/' . $ne['image_name'] ?>" alt="<?php echo $ne['news_title'] ?>">
                                </a>
                            </div>
                            <div class="list-content-body">
                                <h3 class="list-content-title">
                                    <a href="<?php echo $ne['link'] ?>" title="<?php echo $ne['news_title'] ?>"><?php echo $ne['news_title'] ?></a>
                                </h3>
                                <p class="list-content-detail"><?php echo $ne['news_sortdesc'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
<?php } ?>