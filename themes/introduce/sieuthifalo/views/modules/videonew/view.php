<?php if (count($videos)) { ?>
    <div class="panel panel-default categorybox">
        <?php if ($show_widget_title) { ?>
        <div class="panel-heading">
            <h3><?php echo $widget_title; ?></h3>
        </div>
        <?php } ?>
        <div class="panel-body">
            <div class="video"> 
                <?php
                foreach ($videos as $video) {
                    ?>
                    <iframe width="100%" height="100%" frameborder="0" src="<?php echo $video['video_embed']; ?>?autohide=1" allowfullscreen="1" allowtransparency="true">
                    </iframe>
                <?php } ?>
            </div>
        </div>
    </div>
    
<?php } ?>