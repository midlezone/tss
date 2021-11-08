<div class="main-content main-content-bg main-content-padding clearfix">
    <div class="listnews">
        <div class="title">
            
            <h2><?php echo $category['cat_name']; ?></h2>
        </div>
        <div class="list">
            <?php
            if (count($listnews)) {
                $i = 0;
                ?>
                <?php
                foreach ($listnews as $ne) {
                    $i++;
                    if ($i % 2 == 0) {
                        ?>
                        <div class="list-item">
                            <div class="list-content">
                                <div class="list-content-box">
                                    <div class="col-sm-5 news-img">
                                        <a href="<?php echo $ne['link']; ?>">
                                            <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's500_500/' . $ne['image_name']; ?>">
                                        </a>
                                    </div>
                                    <div class="col-sm-7 cont">
                                        <div class="news-cont">
                                            <span class="list-content-title">
                                                <a href="<?php echo $ne['link']; ?>">
                                                    <?php echo $ne['news_title']; ?>
                                                </a>
                                            </span>
                                            <div class="list-content-detail">
                                                <p>
                                                    <?php
                                                    echo $ne['news_sortdesc'];
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="list-item">
                            <div class="list-content">
                                <div class="list-content-box">
                                    <div class="col-sm-7 news-img">
                                        <a href="<?php echo $ne['link']; ?>">
                                            <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's500_500/' . $ne['image_name']; ?>">
                                        </a>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="news-cont">
                                            <span class="list-content-title">
                                                <a href="<?php echo $ne['link']; ?>">
                                                    <?php echo $ne['news_title']; ?>
                                                </a>
                                            </span>
                                            <div class="list-content-detail">
                                                <p>
                                                    <?php
                                                    echo $ne['news_sortdesc'];
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
        <div class="wpager">
            <?php
            $this->widget('common.extensions.LinkPager.LinkPager', array(
                'itemCount' => $totalitem,
                'pageSize' => $limit,
                'header' => '',
                'selectedPageCssClass' => 'active',
            ));
            ?>
        </div>
    </div>
</div>