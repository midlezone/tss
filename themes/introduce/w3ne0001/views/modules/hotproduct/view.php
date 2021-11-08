<?php
if (ClaSite::getLinkKey() == Yii::app()->defaultController) {
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/script.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScript("style_ph", ''
            . "var jcarousel = $('#slide-post-index').jcarousel({wrap: 'circular'}); 
                                $('#slide-post-index').jcarouselAutoscroll({autostart: false,interval: 3000,target: '+=1'});
            $('.icon-pev a').on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '-=1'
            });

        $('.icon-next a')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '+=1'
            });", CClientScript::POS_END);
    ?>
    <div id="slide-post-index">
        <ul class="post1">
            <?php
            foreach ($products as $pro) {
                $link = Yii::app()->createUrl('economy/product/detail', array('id' => $pro['id'], 'alias' => $pro['alias']));
                ?>
                <li class="post1"> 
                    <a href="<?php echo $link; ?>">
                        <div class="pimg" align="center">
                            <img src="<?php echo ClaHost::getImageHost() . $pro['avatar_path'] . 's200_200/' . $pro['avatar_name'] ?>">
                        </div>
                        <div><?php echo $pro['name']; ?></div>
                    </a>
                </li>
            <?php } ?>
        </ul>
        <div style="clear:both"></div>
        <div class="icon-next">
            <a href="#"><i class="next"></i></a>
        </div>
        <div class="icon-pev">
            <a href="#"><i class="pev"></i></a>
        </div>
    </div>
<?php } else { ?>
    <?php if (count($products)) { ?>
        <div class="left-menu-left-sp">
            <?php if ($show_widget_title) { ?>
                <div class="list-left-sp"><?php echo $widget_title; ?></div>
            <?php } ?>
            <div class="boder-box-sp">
                <div class="box-left-post-sp">
                    <ul class="post1">
                        <?php
                        foreach ($products as $pro) {
                            $link = Yii::app()->createUrl('economy/product/detail', array('id' => $pro['id'], 'alias' => $pro['alias']));
                            ?>
                            <li class="post1"> 
                                <a href="<?php echo $link; ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $pro['avatar_path'] . 's80_80/' . $pro['avatar_name'] ?>">
                                    <div><?php echo $pro['name']; ?></div>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div> <!--end boder-box-sp-->
        </div>
    <?php } ?>
<?php } ?>