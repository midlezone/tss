<div class="newsdetail">
   
    <div class="newsdes">
        <?php
        echo $news['news_desc'];
        ?>
    </div>
    <?php 
        $this->renderPartial('partial/tags', array(
            'data_tags' => $news['meta_keywords'],
            'search_type' => ClaSite::SITE_TYPE_NEWS
        ));
    ?>
</div>