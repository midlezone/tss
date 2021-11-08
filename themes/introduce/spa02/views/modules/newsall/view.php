	
    <?php if (count($news)) { ?>
        <?php
        foreach ($news as $ne) {
            ?>
             <?php
                    echo $ne['news_desc'];
                    ?>
        <?php } ?>
       
    <?php } ?>
