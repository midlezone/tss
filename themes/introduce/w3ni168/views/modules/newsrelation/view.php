<?php if (count($listnews)) { ?>
<div class="service">
    <div class="panel panel-default categorybox">
        <?php if ($show_widget_title) { ?>
        <div class="panel-heading">
            <h3><?php echo $widget_title; ?></h3>
        </div>
        <?php } ?>
        <div class="panel-body">
            <div class="list list-small">
                <?php foreach ($listnews as $news) { ?>
                <div class="list-item">
                    <div class="list-content">
                        <div class="list-content-box">
                            <?php if ($news['image_path'] && $news['image_name']) { ?>
                            <div class="list-content-img">
                                <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's100_100/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>" />
                                </a>
                            </div>
                            <?php } ?>
                            <div class="list-content-body">
                                <span class="list-content-title">
                                    <a href="<?php echo $news['link'] ?>" title="<?php echo $news['news_title']; ?>">
                                        <?php echo $news['news_title']; ?>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!--end-panel-body--> 
    </div>
</div>
<?php } ?>