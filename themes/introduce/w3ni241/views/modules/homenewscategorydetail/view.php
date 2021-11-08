<div class="top-center-main clearfix ">
    <?php $themUrl = Yii::app()->theme->baseUrl; ?>
    <div class="menu-line clearfix">
        <?php if ($show_widget_title) { ?>
            <?php $themUrl = Yii::app()->theme->baseUrl; ?>
            <div class="title">
                <h2>    <?php echo $widget_title; ?></a>
                </h2>
            </div>
        <?php } ?>
        <div class="menu-main">
            <ul>
                <?php
                foreach ($cateinhome as $cat) {
                    ?>
                    <li><a href="<?php echo $cat['link']; ?>"><?php echo $cat['cat_name']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="icon-end">
            <p><img src="<?php echo $themUrl; ?>/css/img/i-cuoi.png" alt="#"></p> 
        </div>
    </div>
    <?php
    $first = true;
    if ($first) {
        foreach ($cateinhome as $cat) {
            if (!$first) {
                continue;
            }
            if (isset($data[$cat['cat_id']]['listnews'])) {
                $listnews = $data[$cat['cat_id']]['listnews'];
                if (count($listnews)) {
                    ?>
                    <div class="bg-top-center-main clearfix">
                        <?php
                        $first = ClaArray::getFirst($listnews);
                        $listnews = ClaArray::removeFirstElement($listnews);
                        ?>
                        <?php if ($first) { ?>
                            <div class="left-top-center-main ">
                                <div class="news-cont-left">
                                    <div class="box-img">
                                        <a href="<?php echo $first['link']; ?>">
                                            <img alt="<?php echo $first['news_title']; ?>" src="<?php echo ClaHost::getImageHost() . $first['image_path'] . 's350_350/' . $first['image_name']; ?>" alt="<?php echo $first['news_title']; ?>" />

                                        </a>
                                    </div>
                                    <div class="box-info">
                                        <div class="box-title">
                                            <h3> <a href="<?php echo $first['link']; ?>">
                                                    <?php echo $first['news_title']; ?>
                                                </a>
                                            </h3>

                                        </div>
                                        <div class="box-info-cont">
                                            <p>
                                                <?php echo $first['news_sortdesc']; ?>
                                            </p>
                                        </div>
                                        <div class="read-more">
                                            <a href="<?php echo $first['link']; ?>"><i>Xem tiếp</i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (count($listnews)) { ?>
                            <div class="right-top-center-main">
                                <?php foreach ($listnews as $news) { ?>
                                    <div class="news-cont-right clearfix">
                                        <div class="box-img">
                                            <a href="<?php echo $news['link']; ?>">
                                                <img alt="<?php echo $news['news_title']; ?>" src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's200_200/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>" />

                                            </a>
                                        </div>
                                        <div class="box-info">
                                            <div class="box-title">
                                                <h3><a href="<?php echo $news['link']; ?>">
                                                        <?php echo $news['news_title']; ?>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="read-more">
                                                <a href="<?php echo $news['link']; ?>"><i>Xem tiếp</i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php
            $first = false;
        }
    }
    ?>
</div>