<div class="newsdetail">
    <h1 class="newstitle"><?php echo $news['news_title']; ?></h1>
    <?php if ($news['publicdate']) { ?>
        <p class="newstime"><?php echo date('d/m/Y H:i', $news['publicdate']); ?></p>
    <?php } ?>
    <div class="newsdes">
        <?php
        echo ClaWeb::replaceWebText($news['news_desc']);
        ?>
    </div>
</div>