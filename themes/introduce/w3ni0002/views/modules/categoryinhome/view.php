<div class="lcat" style="overflow: hidden;">
    <?php
    if (count($data)) {
        foreach ($data as $cat) {
            ?>
            <div class="post">
                <div class="box-top">
                    <i class="icon-post"></i>
                    <a href="<?php echo $cat['link']; ?>">
                        <?php echo $cat['cat_name']; ?>
                    </a>
                </div>
                <div class="box" align="center">
                    <span class="box-img">
                        <a href="<?php echo $cat['link']; ?>">
                            <?php if ($cat['image_path'] && $cat['image_name']) { ?>
                                <img src="<?php echo ClaHost::getImageHost() . $cat['image_path'] . 's220_220/' . $cat['image_name'] ?>" />
                            <?php } ?>
                        </a>
                    </span>
                    <p class="box-description">
                        <?php echo $cat['cat_description']; ?>
                    </p>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>