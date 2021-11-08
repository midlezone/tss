<?php if (count($listnews)) { ?>
    <div class="row">
        <div class="service news-lq">
            <div class="panel panel-default categorybox">
                <div class="panel-heading">
                    <h3>Bài viết liên quan</h3>
                </div>
                <div class="panel-body">
                    <ul class="menu menu-list">
                        <?php foreach ($listnews as $news) { ?>
                            <li>
                                <i class="icon-tt2"></i>
                                <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>">
                                    <?php echo $news['news_title']; ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <!--end-panel-body--> 
            </div>
        </div>
    </div>
<?php } ?>