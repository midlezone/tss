<div class="ndetail">
    <p class="ntitle">
        <?php echo $news['news_title']; ?>
    </p>
    <p class="ntime"><?php echo date('d/m/Y H:i', $news['created_time']) ?></p>
    <p class="nsordes">
        <?php echo $news['news_sortdesc']; ?>
    </p>
    <div class="ndes">
        <?php
        echo $news['news_desc'];
        ?>
    </div>
</div>