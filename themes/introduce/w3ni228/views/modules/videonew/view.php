<?php if (count($videos)) { ?>
    <div class="video">
        <?php foreach ($videos as $video) { ?>
            <iframe width="325" height="235" frameborder="0" src="<?php echo $video['video_embed']; ?>?autohide=1" allowfullscreen="1" allowtransparency="true">
            </iframe>
        <?php } ?>
    </div>
<?php } ?>
