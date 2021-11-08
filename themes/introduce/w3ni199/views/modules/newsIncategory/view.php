<?php if (count($news)) { ?>
    <div class="news">
        <div class="title">
            <h2><a href="<?php echo $category['link'] ?>" title="<?php echo $category['cat_name'] ?>"><?php echo $category['cat_name'] ?></a></h2>
        </div>
        <div class="cont">
            <ul>
                <?php foreach ($news as $ne) { ?>
                <li><a href="<?php echo $ne['link'] ?>" title="<?php echo $ne['news_title'] ?>"><?php echo $ne['news_title'] ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php } ?>
