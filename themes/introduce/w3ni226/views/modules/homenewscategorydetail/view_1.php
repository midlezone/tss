<div class="categories">
    <div class="panel panel-default categorybox">
        <?php if ($show_widget_title) { ?>
            <div class="panel-heading">
                <h2><?php echo $widget_title ?></h2>
            </div>
        <?php } ?>
        <div class="panel-body">
            <ul class="menu menu-list">
                <?php foreach ($cateinhome as $cat) { ?>
                    <li class="submenu "> 
                        <a href="<?php echo $cat['link'] ?>" title="<?php echo $cat['cat_name'] ?>"><?php echo $cat['cat_name'] ?></a>
                        <ul class="menu ">
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