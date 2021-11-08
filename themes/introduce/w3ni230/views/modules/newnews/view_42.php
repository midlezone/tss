<div class="newsinhome">
    <div class="panel panel-default menu-vertical">
        <?php if ($show_widget_title) { ?>
            <div class="panel-heading">
                <h3><?php echo $widget_title; ?></h3>
            </div>
        <?php } ?>
        <div class="panel-body" style="display: block;">
            <div class="list-group-list">
                <ul class="list-group">
                    <marquee class="calentxt" direction="up" scrollamount="2" onmouseover="this.stop()" onmouseout="this.start()" height="350px">
                        <?php foreach ($news as $ne) { ?>
                            <li class="list-group-item clearfix">
                                <a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>">
                                    <img class="news-img" src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's100_100/' . $ne['image_name']; ?>" alt="<?php echo $ne['image_name']; ?>" />
                                    <span class="ntitle"><?php echo $ne['news_title']; ?></span>
                                </a>
                            </li>
                        <?php } ?>
                    </marquee>
                </ul>

            </div>
        </div>
    </div>
</div>