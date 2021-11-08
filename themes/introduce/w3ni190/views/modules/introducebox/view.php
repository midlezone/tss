<div class="welcome">
    <div class="row">
        <div class="text-welcome col-sm-6">
            <div class="title-text-welcome">
                <?php if ($data['title']) { ?>
                    <div class="title-text-text-wc">
                        <h2><i class="title-img-text"></i><?php echo $data['title']; ?></h2>
                    </div>
                </div>
            <?php } ?>
            <p>
                <?php echo $data['sortdesc']; ?>
            </p>
        </div>
        <?php $hasImage = ($data['image_path'] && $data['image_name']) ? true : false; ?>
        <?php if ($hasImage) { ?>
            <div class="img-welcome col-sm-6">
                <img src="<?php echo ClaHost::getImageHost() . $data['image_path'] . 's500_0/' . $data['image_name']; ?>" title="<?php echo $data['title']; ?>" />
            </div>
        <?php } ?>
    </div>
</div>