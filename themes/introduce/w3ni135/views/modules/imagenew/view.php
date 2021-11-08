<?php if (count($images)) { ?>
    <div class="panel panel-default mod-imagenew">
        <?php if ($show_widget_title) { ?>            
            <div class="title-main">
                <h3><?php echo $widget_title; ?></h3>
            </div>
        <?php } ?>
        <div class="mod-imagenew-content">
            <ul>
                <?php
                $i=0;
                foreach ($images as $image) { 
                $i++;    ?>
                <li class="img-box <?php echo ($i%3 == 0)?'img-last':'';?> ">
                    <img width="70" src="<?php echo ClaHost::getImageHost() . $image['path'] . 's80_80/' . $image['name']; ?>" />
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php } ?>