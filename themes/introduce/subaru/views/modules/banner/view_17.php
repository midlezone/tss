<?php if (count($banners)) { ?>

<!--    <div class="social-bottom">
        <a href="skype:domphucth?chat" rel="nofollow">
            <i class="icon-social skype-cl">.</i> </a> 
        <a href="ymsgr:domphucth" rel="nofollow"> 
            <i class="icon-social yahoo-cl">.</i> </a> 
        <a href="https://www.facebook.com/dinhgiacenter" target="_blank">
            <i class="icon-social facebook-cl">.</i> </a> 
        <a href="https://www.youtube.com/channel/UCdDiYEVk7X63TzBxxosG-bg/feed" target="_blank"> <i class="icon-social youtube-cl">.</i> </a> 
        <a href="https://plus.google.com/u/0/101077587301495156633/posts" target="_blank"> <i class="icon-social gplus-cl">.</i> </a>
    </div>-->

    <div class="social-bottom">
        <?php
        foreach ($banners as $banner) {
            $height = $banner['banner_height'];
            $width = $banner['banner_width'];
            $src = $banner['banner_src'];
            $link = $banner['banner_link'];
            if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
                ?>
                <a href="<?php echo $link ?>" title="<?php echo $banner['banner_name']; ?>" target="_blank">
                    <i class="icon-social"> <img src="<?php echo $src; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                    </i> 
                </a>
                <?php
            }
        }
        ?>
    </div>

    <script>
        $('document').ready(function () {
            $('#myModal').modal('show');
        });
    </script>
<?php } ?>
