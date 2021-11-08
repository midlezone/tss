<?php if (count($hotnews)) { ?>
    <?php if ($show_widget_title) { ?>
        <div class="product">
            <div class="title">
                <h2>
                    <a href="/tin-tuc-nc,421">
                        <?php echo $widget_title; ?>
                    </a>
                </h2>
                <div class="view-all">
                    <a href="/tin-tuc-nc,421">Xem tất cả</a>
                </div>
            </div>
        <?php } ?>
        <div class="product-cont">
            <div class="grid">
                <?php foreach ($hotnews as $news) { ?>
                    <div class="list-item">
                        <div class="list-content clearfix">
                            <div class="list-content-box">
                                <?php if ($news['image_path'] && $news['image_name']) { ?>
                                    <div class="list-content-img">
                                        <h3>
                                            <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>">
                                                <img src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's250_250/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>" />
                                            </a>
                                        </h3>
                                    </div>
                                <?php } ?>
                                <div class="list-content-body">
                                    <div class="product-price-all clearfix">
                                        <div class="list-content-title">
                                            <a href="<?php echo $news['link'] ?>" title="<?php echo $news['news_title']; ?>">
                                                <?php echo $news['news_title']; ?>
                                            </a>
                                        </div>
                                        <div class="product-description">
                                            <?php echo $news['news_sortdesc']; ?>
                                        </div>
                                        <div class="ProductActionAdd"> 
                                            <a href="<?php echo $news['link'] ?>" title="<?php echo $news['news_title']; ?>" class="a-btn-2">
                                                <span class="a-btn-2-text">Xem chi tiết</span> 
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    <?php if ($show_widget_title) { ?>
    </div>
<?php } ?>