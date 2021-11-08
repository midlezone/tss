<?php if (count($news)) { ?>
    <?php if ($show_widget_title) { ?>
        <div class="title clearfix">
            <div class="title_box">
                <h2><?php echo $widget_title ?></h2>
            </div>
        </div>
    <?php } ?>
    <div class="wrapper-list-news">
        <?php
        $first = ClaArray::getFirst($news);
        $news = ClaArray::removeFirstElement($news);
        ?>
        <?php if ($first) { ?>
            <div class="col-sm-6 first-news-large">
                <a href="<?php echo $first['link'] ?>">
                    <img src="<?php echo ClaHost::getImageHost() . $first['image_path'] . $first['image_name'] ?>" alt="<?php echo $first['news_title'] ?>">
                </a>
                <div class="description-news">
                    <p><a href="<?php echo $first['link'] ?>"><?php echo $first['news_title'] ?></a></p>
                </div>
            </div>
        <?php } ?>
        <?php if ($news && count($news)) { ?>
            <div class="col-sm-6">
                <div class="row">
                    <?php foreach ($news as $ne) { ?>
                        <div class="col-xs-6 item-news">
                            <a href="<?php echo $ne['link'] ?>">
                                <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's280_280/' . $ne['image_name'] ?>" alt="<?php echo $ne['news_title'] ?>">
                            </a>
                            <div class="description-news">
                                <p><?php echo $ne['news_title'] ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.wrapper-list-news .item-news').hover(function() {
            $(this).find('.description-news').show();
        }, function() {
            $(this).find('.description-news').hide();
        });
        $('.wrapper-list-news .first-news-large').hover(function() {
            $(this).find('.description-news').show();
        }, function() {
            $(this).find('.description-news').hide();
        });
        
    });
</script>

