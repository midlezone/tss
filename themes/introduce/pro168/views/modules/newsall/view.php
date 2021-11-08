<div class="tt-main-tt">
	<div class="title">
                    <h2><?php echo $widget_title; ?></h2>
       </div>
    <?php if (count($news)) { ?>
        <?php
        foreach ($news as $ne) {
            $link = Yii::app()->createUrl('news/news/detail', array('id' => $ne['news_id'], 'alias' => $ne['alias']));
            $avatar = ClaHost::getImageHost() . $ne['image_path'] . 's150_150/' . $ne['image_name'];
            ?>
            <div class="post-tt-main">
				<div class="post1-tt">
                        <a href="<?php echo $link ?>">
                            <img src="<?php echo $avatar; ?>">
                        </a>
                </div>
                <a class="n-title" href="<?php echo $link; ?>">
                    <?php
                    echo $ne['news_title'];
                    ?>
                </a>
                
            </div><!--end-post-tt-main-->
        <?php } ?>
       
    <?php } ?>
</div>