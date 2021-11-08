<?php
$claCategory = new ClaCategory(array('create' => true, 'type' => ClaCategory::CATEGORY_NEWS));
$claCategory->application = false;
foreach ($cateinhome as $cat) {
    $sub_category = $claCategory->getSubCategory($cat['cat_id']);
    ?>
    <div class="list-news clearfix">
        <div class="title">
            <ul class="menu-tab">
                <li>
                    <h2>
                        <a href="<?php echo $cat['link']; ?>" title="<?php echo $cat['cat_name'] ?>"><?php echo $cat['cat_name']; ?></a>
                    </h2>
                </li>
                <?php
                if (count($sub_category)) {
                    foreach ($sub_category as $subcat) {
                        if($subcat['cat_id'] == 1288) { 
                            $subcat['link'] = Yii::app()->createUrl('media/album/all');
                        }
                        ?>
                        <li><a href="<?php echo $subcat['link'] ?>" title="<?php echo $subcat['cat_name'] ?>"><?php echo $subcat['cat_name'] ?></a></li>
        <?php }
    } ?>
            </ul>
        </div>
        <div class="clear"></div>
        <?php
        if (isset($data[$cat['cat_id']]['listnews'])) {
            $listnews = $data[$cat['cat_id']]['listnews'];
            if (count($listnews)) {
                ?>
                <div class="news-cont">
                    <?php
                    $first = ClaArray::getFirst($listnews);
                    $listnews = ClaArray::removeFirstElement($listnews);
                    ?>
            <?php if ($first) { ?>
                        <div class="news-cont-left">
                            <div class="box-img">
                                <a href="<?php echo $first['link']; ?>" title="<?php echo $first['news_title']; ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $first['image_path'] . 's250_250/' . $first['image_name']; ?>" alt="<?php echo $first['news_title']; ?>" />
                                </a>
                            </div>
                            <div class="box-info">
                                <div class="box-title">
                                    <h3><a href="<?php echo $first['link']; ?>" title="<?php echo $first['news_title']; ?>"><?php echo $first['news_title']; ?></a></h3>
                                </div>
                                <div class="box-info-cont">
                                    <p><?php echo $first['news_sortdesc'] ?></p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if (count($listnews)) { ?>
                        <div class="cont">
                <?php foreach ($listnews as $news) { ?>
                                <div class="customer-details">
                                    <div class="box-img">
                                        <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>">
                                            <img src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's100_100/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>" />
                                        </a>
                                    </div>
                                    <div class="box-info">
                                        <div class="box-title">
                                            <h3><a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>"><?php echo $news['news_title']; ?></a></h3>

                                        </div>
                                        <div class="box-info-cont">
                                            <p><?php echo $news['news_sortdesc']; ?></p>
                                        </div>
                                    </div>
                                </div>
                        <?php } ?>
                        </div>
                <?php } ?>
                </div>
                <?php
            }
        }
        ?>
    </div>
<?php } ?>
