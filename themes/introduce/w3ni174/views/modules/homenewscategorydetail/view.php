<?php if ($show_widget_title) { ?>
    <div class="title">
        <h2>
            <a onclick="javascript:void(0)">
                <?php echo $widget_title ?>
            </a>
        </h2>
    </div>
<?php } ?>
<div class="cont clearfix">
    <div class="duo example">
        <div class="duo__cell examle__demo">
            <ul class="grid grid--fluid-5-col js-masonry" data-masonry-options="{ &quot;itemSelector&quot;: &quot;.grid-item&quot;, &quot;columnWidth&quot;: &quot;.grid-sizer&quot;, &quot;percentPosition&quot;: true }">
                <div class="grid-sizer">
                </div>
                <?php foreach ($cateinhome as $cat) { ?>
                    <li class="grid-item">
                        <a href="<?php echo $cat['link'] ?>" title="<?php echo $cat['cat_name'] ?>"><?php echo $cat['cat_name'] ?></a>
                        <ul class="clearfix">
                            <?php
                            if (isset($data[$cat['cat_id']]['listnews'])) {
                                $listnews = $data[$cat['cat_id']]['listnews'];
                                if (count($listnews)) {
                                    foreach ($listnews as $news) {
                                        ?>
                                        <li>
                                            <a href="<?php echo $news['link'] ?>" title="<?php echo $news['news_title'] ?>">
                                                <?php echo $news['news_title'] ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
