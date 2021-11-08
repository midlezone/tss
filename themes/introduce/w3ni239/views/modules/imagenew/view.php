<?php if (count($images)) { ?>
    <div class="row gallery">
        <div class="col-xs-12">
            <div class="box-album">
                <?php if ($show_widget_title) { ?>
                <div class="title"><h3><a href="https://instagram.com/skinlaundry/" title="#" target="_blank"><i><?php echo $widget_title ?></i></a></h3>
                        <div class="description">SHOW OFF YOUR SKIN #JUSTLAUNDERED</div>
                    </div>
                <?php } ?>
                <div class="cont">
                    <ul class="clearfix">
                        <?php foreach ($images as $image) { ?>
                            <li>
                                <a>
                                    <img u="image"  alt="<?php echo $image['name'] ?>" src="<?php echo ClaHost::getImageHost() . $image['path'] . 's200_200/' . $image['name']; ?>"/>
                                </a>
                            <li>
                            <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
