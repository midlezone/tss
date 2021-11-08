<?php
if (count($cateinhome)) {
    foreach ($cateinhome as $cat) {
        ?>
        <div class="boxnews">
            <div class="box-title boxnews-title"> 
                <h2><a href="<?php echo $cat['link']; ?>" title="<?php echo $cat['cat_name']; ?>"><?php echo $cat['cat_name']; ?></a></h2>
            </div>
            <div class="cont-news clearfix">
                <?php if (isset($data[$cat['cat_id']]['listnews'])) { ?>
                    <div class="row">
                        <?php
                        $listnews = $data[$cat['cat_id']]['listnews'];
                        if (count($listnews) > 0) {
                            $first = ClaArray::getFirst($listnews);
                            $listnews = ClaArray::removeFirstElement($listnews);
                            ?>
                            <div class=" col-sm-5 best-news">
                                <div class="list grid">
                                    <div class="list-item">
                                        <div class="list-content">
                                            <div class="list-content-box">
                                                <div class="list-content-img">
                                                    <a href="<?php echo $first['link'] ?>" title="<?php echo $first['news_title'] ?>">
                                                        <img src="<?php echo ClaHost::getImageHost() . $first['image_path'] . 's280_280/' . $first['image_name']; ?>" alt="<?php echo $first['news_title']; ?>" />
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
                            <?php if (count($listnews) > 0) { ?>
                                <div class=" col-sm-7 extra-news">
                                    <div class="listnews">
                                        <div class="list row">
                                            <?php foreach ($listnews as $news) { ?>
                                                <div class="col-sm-6 list-item">
                                                    <div class="list-content">
                                                        <div class="list-content-box">
                                                            <div class="list-content-img">
                                                                <a href="<?php echo $news['link'] ?>" title="<?php echo $news['news_title'] ?>">
                                                                    <img src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's200_200/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>" />
                                                                </a>
                                                            </div>
                                                            <div class="list-content-body">
                                                                <span class="list-content-title">
                                                                    <a href="<?php echo $news['link'] ?>" title="<?php echo $news['news_title'] ?>">
                                                                        <?php echo $news['news_title'] ?>
                                                                    </a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="wpager">
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        }
                        ?>
                    </div>
        <?php } ?>
            </div>
        </div>
        <?php
    }
}
?>

