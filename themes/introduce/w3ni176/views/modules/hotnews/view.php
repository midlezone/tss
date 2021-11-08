<?php if (count($hotnews)) { ?>
    <div class="featured">
        <div class="panel panel-default ">
            <?php if ($show_widget_title) { ?>
                <div class="title clearfix">
                    <h2><?php echo $widget_title; ?></h2>
                </div>
            <?php } ?>
            <div class="panel-body">
                <div class="list list-small">
                    <?php foreach ($hotnews as $news) { ?>
                        <div class="list-item ">
                            <div class="list-content clearfix">
                                <div class="list-content-box">
                                    <div class="list-content-img">

                                        <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>">
                                            <img src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's250_250/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>" />
                                        </a>

                                    </div>
                                    <div class="list-content-body">
                                        <div class="list-content-title"> 
                                            <h3 >
                                                <a href="<?php echo $news['link'] ?>" title="<?php echo $news['news_title']; ?>">
                                                    <?php echo $news['news_title']; ?>
                                                </a>
                                            </h3>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>