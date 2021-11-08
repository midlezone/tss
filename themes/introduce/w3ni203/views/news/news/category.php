<?php if (count($news)) { ?>
    <div id="owl-demo" class="news-list row">
        <?php
        foreach ($news as $ne) {
            ?>
            <div class="col-sm-4">
                <div class="item ">
                    <div class="box-cont">
                        <?php if ($ne['image_path'] && $ne['image_name']) { ?>
                            <div class="box-img"> 
                                <a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's330_330/' . $ne['image_name']; ?>" alt="<?php echo $ne['news_title']; ?>" />
                                </a>
                            </div>
                        <?php } ?>
                        <div class="product-information clearfix">
                            <div class="title-products title-news-list">
                                <h3>
                                    <a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>"><?php echo $ne['news_title']; ?></a>
                                </h3>
                            </div>
                        </div>
                        <div class="gift-news">
                            <p><?php echo $ne['news_sortdesc']; ?></p>
                        </div>
                        <a href="<?php echo $ne['link']; ?>" class="view-news" title="<?php echo $ne['news_title']; ?>"><?php echo Yii::t('common', 'viewcontinue') ?></a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="product-page clearfix">
            <?php
            $this->widget('common.extensions.LinkPager.LinkPager', array(
                'itemCount' => $totalitem,
                'pageSize' => $limit,
                'header' => '',
                'htmlOptions' => array('class' => 'W3NPager',), // Class for ul
                'selectedPageCssClass' => 'active',
            ));
            ?>
        </div>
    </div>
<?php } ?>
