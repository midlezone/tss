<?php
foreach ($cateinhome as $cat) {
    ?>
    <div class="row">
        <div class="box-title">
            <div class="title"> 
                <a href="<?php echo $cat['link'] ?>" title="<?php echo $cat['cat_name'] ?>"><?php echo $cat['cat_name']; ?></a> 
            </div>
        </div>
        <?php
        if (isset($data[$cat['cat_id']]['listnews'])) {
            $listnews = $data[$cat['cat_id']]['listnews'];
            foreach ($listnews as $news) {
                ?>
                <div class="col-xs-12 col-sm-6 ">
                    <div class="box-all-nd">
                        <div class="box-nd">
                            <div class="nd-nd clearfix">
                                <div class="img-box-nd">
                                    <div class="img-box"> 
                                        <a href="<?php echo $news['link'] ?>" title="<?php echo $news['news_title'] ?>"> 
                                            <img alt="<?php echo $news['news_title']; ?>" src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's180_180/' . $news['image_name']; ?>" />
                                        </a> 
                                    </div>
                                </div>
                                <div class="header-panel">
                                    <h3> 
                                        <a href="<?php echo $news['link'] ?>" title="<?php echo $news['news_title'] ?>">
                                            <?php echo $news['news_title'] ?>
                                        </a> 
                                    </h3>
                                </div>
                                <p class="news_sort_desc"><?php echo $news['news_sortdesc'] ?></p>
                                <div class="action-buttom">
                                    <a href="<?php echo $news['link'] ?>" title="Xem chi tiết">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                        <!--end-box-nd--> 
                    </div>
                </div>
            <?php }
        } ?>
    </div>
<?php } ?>
