<div class="newcategoryinhome">
    <?php
    foreach ($cateinhome as $cat) {
        $first = true;
        ?>
        <div class="product">
            <div class="title">
                <h2><a href="<?php echo $cat['link']; ?>"><?php echo $cat['cat_name']; ?></a></h2>
                <div class="view-all">
                    <a href="<?php echo $cat['link']; ?>"><?php echo Yii::t('common', 'viewall'); ?></a>
                </div>
            </div><!--end-main-list-->
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
                        <?php if ($first) { ?>
                            <div class="grid">
                                <div class="list-item">
                                    <div class="list-content clearfix">
                                        <div class="list-content-box">
                                            <div class="list-content-img">
                                                <a href="<?php echo $first['link']; ?>">
                                                    <img alt="<?php echo $first['news_title']; ?>" src="<?php echo ClaHost::getImageHost() . $first['image_path'] . 's200_200/' . $first['image_name']; ?>" alt="<?php echo $first['news_title']; ?>" />

                                                </a>
                                            </div>
                                            <div class="list-content-body">
                                                <div class="product-price-all clearfix">
                                                    <div class="list-content-title">
                                                        <h3>
                                                            <a href="<?php echo $first['link']; ?>">
                                                                <?php echo $first['news_title']; ?>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>
                                                            <?php echo $first['news_sortdesc']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (count($listnews)) { ?>
                            <div class="list-news">
                                <ul>
                                    <?php foreach ($listnews as $news) { ?>
                                        <li>
                                            <a href="<?php echo $news['link']; ?>">
                                                <?php echo $news['news_title']; ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>