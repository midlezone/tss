


<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/colorbox/jquery.colorbox-min.js');
?>
<div class="center-main-center">
    <?php
    foreach ($cateinhome as $cat) {
			 $listnews = $data[$cat['cat_id']]['listnews'];
        ?>
        <div class="centerContent"> 
            <div class="main-list"> 
                <span><?php echo $cat['cat_name']; ?></span> 
                <a href="<?php echo $cat['link']; ?>" class="view-all"><?php echo Yii::t('common', 'viewall'); ?> >></a>
            </div>
            <div class="product-all">
                <div class="list grid">
					  <?php foreach ($listnews as $news) { ?>
					  
                        <div class="list-item">
                            <div class="list-content">
                                <div class="list-content-box">
                                    <div class="list-content-img">
 
                                        
                                        <a href="<?php echo $news['link']; ?>">
                                                            <img alt="<?php echo $news['news_title']; ?>" src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's500_500/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>" />
                                        </a>
                                    </div>
                                    <div class="list-content-body">
                                        <span class="list-content-title">
                                            <a href="<?php echo $news['link']; ?>">
                                                <?php echo $news['news_title']; ?>
                                            </a>
                                        </span>
                                    
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div><!--end-list-gird-->
            </div>
        </div>
    <?php } ?>
</div>
<script type="text/javascript">

    function get_html_quickview(id, this_tag) {
        var wq = jQuery(this_tag).next().children('.modal-dialog');
        if (!wq.hasClass('has_quickview')) {
            jQuery.getJSON(
                    '<?php echo Yii::app()->createUrl('/economy/product/quickview'); ?>',
                    {id: id},
            function (data) {
                wq.html(data.html);
                wq.addClass('has_quickview');
            }
            );
        }
    }

</script>