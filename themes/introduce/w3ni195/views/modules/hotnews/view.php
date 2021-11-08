<?php if (count($hotnews)) { ?>
    <div class="featured">
        <div class="panel categorybox">
            <?php if ($show_widget_title) { ?>
                <div class="panel-heading">
                    <h2>
                        <span>
                            <?php echo $widget_title; ?>
                        </span>
                    </h2>
                </div>
            <?php } ?>
            <div class="panel-body">
                <div class="list list-small">
                    <div class="list-item  ">
                        <?php
                        $i = 0;
                        foreach ($hotnews as $ne) {
                            ?>
                            <div class="list-content clearfix">
                                <div class="list-content-box">
                                    <div class="list-content-img"> 
                                        <a href="<?php echo $ne['link'] ?>" title="<?php echo $ne['news_title'] ?>">
                                            <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's150_150/' . $ne['image_name'] ?>" alt="<?php echo $ne['news_title'] ?>">
                                        </a>
                                    </div>
                                    <div class="list-content-body"> 
                                        <div class="list-content-title"> 
                                            <h3>
                                                <a href="<?php echo $ne['link']; ?>" class="clearfix">
                                                    <?php echo $ne['news_title']; ?>
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>