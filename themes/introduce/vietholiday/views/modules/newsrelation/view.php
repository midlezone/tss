<?php if (count($listnews)) { ?>
    <div class="news-relation">
            <?php if ($show_widget_title) { ?>          
				<div class="gdl-header-wrapper project">
					  <div class="gdl-header-left-bar">
					  </div>
					  <div class="gdl-header-left-bar"></div>
					  <h3 class="gdl-header-title"><?php echo $widget_title ?></h3>
					  <div class="gdl-header-divider"></div>
					  <div class="clear"></div>
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