<div class="ndetail">
    <div class="ntitle">
        <?php echo $news['news_title']; ?>
    </div>
    <div class="ntime"><?php echo date('d/m/Y H:i', $news['created_time']) ?></div>
    <div class="nsordes">
        <?php echo $news['news_sortdesc']; ?>
    </div>
    <div class="ndes">
        <?php
        echo $news['news_desc'];
        ?>
    </div>
</div>