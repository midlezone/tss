<?php if (count($jobs)) { ?>
    <div class="box-right list-jobs">
        <div class="panel panel-default menu-vertical">
            <?php if ($show_widget_title) { ?>
                <div class="panel-heading">
                    <div class="title-main">
                        <h3><?php echo $widget_title; ?></h3>
                    </div>
                </div>
            <?php } ?>
            <div class="panel-body">
                <ul class="list-nd-box-nd">
                    <?php foreach ($jobs as $job) { ?>
                        <li>
                            <a href="<?php echo $job['link']; ?>" title="<?php echo $job['position']; ?>">
                                <?php echo $job['position']; ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
<?php } ?>