<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/plugins/colorbox/jquery.colorbox-min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/js/plugins/colorbox/colorbox.css');
?>
<div class="chitiet-sp">
    <div class="sp-chitiet-sp">
        <div class="boder-sp-chitiet">
            <?php
            $images = $model->getImages();
            $first = reset($images);
            ?>
            <div class="sp-chinh"> 
                <a class="sp-img-main" href="<?php echo ClaHost::getImageHost() . $first['path'] . $first['name'] ?>">
                    <img src="<?php echo ClaHost::getImageHost() . $first['path'].'s330_330/'. $first['name'] ?>">
                </a>
            </div>
            <div class="sp-con">
                <ul>
                    <?php foreach ($images as $img) { ?>
                        <li><a class="sp_img_sub" href="<?php echo ClaHost::getImageHost() . $img['path'] . $img['name']; ?>">
                                <img src="<?php echo ClaHost::getImageHost() . $img['path'] . 's50_50/' . $img['name']; ?>"></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="tt-chitiet-sp">
        <p class="title-chitiet-sp">
            <a href="<?php echo $link; ?>"><?php echo $product['name'] ?></a>
        </p>
            <ul>
                <?php if ($product['price_market']) { ?>
                    <li><a>Giá TT: </a><span class="gia-cu"><strike><?php echo number_format(floatval($product['price_market'])) . 'đ'; ?></strike></span></li>
                <?php } ?>
                <?php
                $price = floatval($product['price']);
                if ($price > 0) {
                    ?>
                    <li><a>Giá bán: </a><span class="gia-moi"><?php echo number_format($price) . 'đ'; ?></span></li>
                <?php } else { ?>
                    <li><a>Giá bán: </a><span class="gia-moi">Liên hệ</span></li>
                <?php } ?>
                <?php if ($product['code']) { ?>
                    <li><a>Mã Sản Phẩm:</a><span class="ma-sp"><?php echo $product['code']; ?></span></li>
                <?php } ?>
                <?php if ($product['product_sortdesc']) { ?>
                    <li><a>Mô Tả: </a> <span class="mo-ta">
                            <?php echo $product['product_sortdesc']; ?>
                        </span>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <div style="clear:both"></div>
    </div>
</div>
<?php if ($product['product_desc']) { ?>
    <div class="title-ttsp">
        <p class="title-ttsp-title">Chi Tiết Sản Phẩm</p>
        <div class="ttsp">
            <?php
            echo $product['product_desc'];
            ?>
        </div>
    </div>
<?php } ?>
<script>
    jQuery(document).ready(function() {
        $("a.sp-img-main").colorbox({rel: 'sp-img-main'});
        $("a.sp_img_sub").colorbox({rel: 'sp_img_sub'});
        jQuery('.sp_img_sub').on('mouseover', function() {
            var href = jQuery(this).attr('href');
            var src = jQuery(this).find('img').attr('src');
            if (href) {
                var clo = jQuery(this).closest('.boder-sp-chitiet');
                clo.find('.sp-chinh a.sp-img-main').attr('href', href);
                clo.find('.sp-chinh a img').attr('src', src.replace('\/s50_50\/','\/s330_330\/'));
            }
            return false;
        });
    });
</script>