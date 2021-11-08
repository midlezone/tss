<?php
$check = false;
if ($yahoos && count($yahoos)) {
    ?>
    <div class="left-menu-left-sp">
        <?php if ($show_widget_title) { ?>
            <p class="list-left-sp"><?php echo $widget_title; ?></p>
        <?php } ?>
        <div class="boder-box-sp">
            <div class="box-left-post-sp">
                <ul class="post1">
                    <?php
                    foreach ($yahoos as $ya) {
                        ?>
                        <li class="post1"> 
                            <a class="tu-van-sp" href="ymsgr:sendIM?<?php echo $ya; ?>">
                                <img  border="0" src="http://opi.yahoo.com/online?u=<?php echo $ya; ?>&m=g&t=2">
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div> <!--end boder-box-sp-->
    </div>
<?php } ?>