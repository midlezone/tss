<?php if (count($news)) { ?>
    <div class="latest-news">
        <?php if ($show_widget_title) { ?>
            <div class="title-main">
                <h3><?php echo $widget_title; ?></h3>
            </div>
        <?php } ?>
        <div class="panel-body">
            <ul class="list">
                <?php $i=0;
                foreach ($news as $ne) {
                    $i++;   ?>                    
                <li <?php if($i==1){?>class="i-active"<?php }else{?> class="i-item"<?php }?>>
                            <span class="plus-icon"><span class="plus-c active"><?php if($i==1){?>-<?php }else{?>+<?php }?></span></span>
                            <a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>">
                                <?php echo $ne['news_title']; ?><br />
                            </a>                              
                            <p class="list-content-detail" <?php if($i==1){?>style="display: block;"<?php }else{?>style="display: none;"<?php }?>>                                
                                <?php echo $ne['news_sortdesc'];?>                                
                            </p>                            
                        </li>        
                <?php } ?>
            </ul>
        </div>
    </div>
<script>
    jQuery(function(){
        $( ".plus-icon" ).click(function() {
            var parent = $(this).parent();
            if(!parent.hasClass('i-active')){
                $(".latest-news .i-active .plus-c").html("+");
                $(".latest-news .i-active .list-content-detail").slideUp("slow");
                $(".latest-news .i-active").removeClass("i-active");
                $(this).children(".plus-c").html("-");
                parent.addClass('i-active');            
                parent.children(".list-content-detail").slideDown("slow");
            }
        });
    });
</script>
<?php } ?>