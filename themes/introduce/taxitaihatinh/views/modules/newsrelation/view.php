<?php if (count($listnews)) { ?>
    <div class="news-relation">
            <?php if ($show_widget_title) { ?>
                
				<div class="title-m">
                        <h2>
                            <a href="<?php echo $category['link'] ?>" title="#"><?php echo $widget_title ?></a>
                        </h2>
                    </div>
            <?php } ?>
            <ul>
                <?php foreach ($listnews as $news) { ?>
                    <li>
                        <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>">
                            <?php echo $news['news_title']; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <!--end-panel-body--> 
    </div>
<?php } ?>