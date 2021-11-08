<?php if (count($data)) { ?>
    <div class="clearfix">
        <div class="col-xs-12 fix lv">
            <?php if ($show_widget_title) { ?>
                <div class="title">
                    <div class="cont-title">
                        <h3><?php echo $widget_title; ?></h3>
                    </div>
                </div>
            <?php } ?>
            <div class="list">
                <?php foreach ($data as $category) { ?>
                    <div class="list-item well animated fadeOutDown" data-sb="fadeInDown" data-sb-hide="fadeOutDown">
                        <div class="list-content">
                            <div class="list-content-box">
                                <?php if ($category['image_path'] && $category['image_name']) { ?>
                                    <div class="list-content-img">
                                        <a href="<?php echo $category['link']; ?>">
                                            <img src="<?php echo ClaHost::getImageHost() . $category['image_path'] . 's150_150/' . $category['image_name']; ?>" alt="<?php echo $category['cat_name']; ?>">
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="list-content-body">
                                    <span class="list-content-title">
                                        <a href="<?php echo $category['link']; ?>">
                                            <h3><?php echo $category['cat_name']; ?></h3>
                                        </a>
                                    </span> 
                                    <?php if ($category['cat_description']) { ?>
                                        <div class="list-content-detail">
                                            <p>
                                                <?php echo $category['cat_description']; ?>
                                            </p>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>