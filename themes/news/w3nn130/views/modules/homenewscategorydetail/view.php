
<?php
if ($data && count($data)) {
    foreach ($data as $cid => $cat) {
        $countnews = count($cat['listnews']);
        if ($cat['listnews'] && $countnews) {
            ?>
            <div class="box_outer">
                <div class="news_box">
                    <div class="news_box_heading">
                        <div class="nb_dots">
                            <h2><a href="<?php echo Yii::app()->createAbsoluteUrl($route . 'category', array('id' => $cat['cat_id'], 'alias' => $cat['alias'])) ?>"><?php echo $cat['cat_name'] ?></a></h2>
                        </div>
                    </div> <!--End nb Heading-->

                    <div class="news_box_left">
                        <div class="recent_news_item">
                            <h4 class="recent_news_title"><a href="<?php echo Yii::app()->createUrl('/news/news/detail', array('id' => $cat['listnews'][0]['news_id'], 'alias' => $cat['listnews'][0]['alias'])); ?>"><?php echo $cat['listnews'][0]['news_title']; ?></a></h4>
                            <div class="recent_news_img" style="opacity: 1;">
                                <a href="<?php echo Yii::app()->createUrl('/news/news/detail', array('id' => $cat['listnews'][0]['news_id'], 'alias' => $cat['listnews'][0]['alias'])); ?>">
                                    <img title="" alt="" src="<?php echo $cat['listnews'][0]['avatar']; ?>">
                                    <span class="nb_slide_icon" style="left: -44px;"></span>
                                </a>
                            </div>
                            <div class="recent_news_content">
                                <p class="recent_news_excpert">
                                    <?php echo $cat['listnews'][0]['news_sortdesc']; ?>
                                    <a href="<?php echo Yii::app()->createUrl('/news/news/detail', array('id' => $cat['listnews'][0]['news_id'], 'alias' => $cat['listnews'][0]['alias'])); ?>" class="nb_recent_more"><?php echo Yii::t('news', 'news_more') ?></a> 
                                </p>
                                <div class="nb_meta">
                                    <span class="news_date"><?php echo date('d/m/Y', $cat['listnews'][0]['created_time']); ?></span>
                                </div> <!--End NB META-->
                            </div> <!--recent news Content-->
                        </div> <!--recent News Item-->
                    </div> <!--End News Box Left-->
                    <?php if ($countnews > 1) { ?>
                        <div class="news_box_right">
                            <div class="more_news_wrap">
                                <div class="left_ul">
                                    <ul class="more_news" style="<?php if ($countnews <= 4) echo 'border-right:none;' ?>">
                                        <?php
                                        for ($i = 1; $i < 4; $i++) {
                                            if (!isset($cat['listnews'][$i]) || !$cat['listnews'][$i])
                                                break;
                                            ?>
                                            <li><a title="<?php echo $cat['listnews'][$i]['news_title']; ?>" href="<?php echo Yii::app()->createUrl('/news/news/detail', array('id' => $cat['listnews'][$i]['news_id'], 'alias' => $cat['listnews'][$i]['alias'])); ?>">
                                                    <span>»</span> <?php echo $cat['listnews'][$i]['news_title']; ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div> <!--Left ul-->
                                <?php if ($countnews > 4) { ?>
                                    <div class="right_ul">
                                        <ul class="more_news">
                                            <?php
                                            for ($i = 5; $i <= 7; $i++) {
                                                if (!$cat['listnews'][$i])
                                                    break;
                                                ?>
                                                <li><a title="<?php echo $cat['listnews'][$i]['news_title']; ?>" href="<?php echo Yii::app()->createUrl('/news/news/detail', array('id' => $cat['listnews'][$i]['news_id'], 'alias' => $cat['listnews'][$i]['alias'])); ?>">
                                                        <span>»</span> <?php echo $cat['listnews'][$i]['news_title']; ?>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div> <!--more_news_wrap-->
                                <?php } ?>
                            </div>
                        </div> <!--End News Box Right-->
                    <?php } ?>
                </div> <!--News Box-->
            </div>
            <?php
        }
    }
}
?>