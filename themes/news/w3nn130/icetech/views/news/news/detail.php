<div class="profress">
    <div class="box center alpha" style="width:800px">
        <div class="newsdetail">
            <h1 class="newstitle"><?php echo $news['news_title']; ?></h1>
            <p class="newstime"><?php echo date('d/m/Y H:i', $news['created_time']) ?></p>
            <h3 class="newssordes">
                <?php echo $news['news_sortdesc']; ?>
            </h3>
            <div class="newsdes">
                <?php
                echo $news['news_desc'];
                ?>
            </div>
        </div>
    </div>
</div>