    <?php
    foreach ($cateinhome as $cat) {
        ?>
            <h4><?php echo $cat['cat_name']; ?></h4>
            <?php
            if (isset($data[$cat['cat_id']]['listnews'])) {
                $listnews = $data[$cat['cat_id']]['listnews'];
                if (count($listnews)) {
                    ?>
                    <div class="nd-news clearfix">
                        <?php
                        $first = ClaArray::getFirst($listnews);
                        $listnews = ClaArray::removeFirstElement($listnews);
                        ?>
                        <?php if (count($listnews)) { ?>
                            <div class="product-cont">
                                <div class="grid">
                                    <?php foreach ($listnews as $news) { ?>
                                        <div class="list-item">
                                            <div class="list-content clearfix">
                                                <div class="list-content-box">
                                                    <?php if ($news['image_path'] && $news['image_name']) { ?>
                                                        <div class="list-content-img">
                                                            <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>">
                                                                <img src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's250_250/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>" />
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="list-content-body">
                                                        <div class="product-price-all clearfix">
                                                            <div class="list-content-title">
                                                                <a href="<?php echo $news['link'] ?>" title="<?php echo $news['news_title']; ?>">
                                                                    <?php echo $news['news_title']; ?>
                                                                </a>
                                                            </div>
                                                           <!-- <div class="product-description">
                                                                <?php// echo $news['news_sortdesc']; ?>
                                                            </div>
                                                            -->
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
                <?php } ?>
            <?php } ?>
        </div>
    <?php } ?>