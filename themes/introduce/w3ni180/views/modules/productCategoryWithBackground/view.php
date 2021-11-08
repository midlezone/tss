
<?php
foreach ($cateinhome as $cat) {
    if (!isset($data[$cat['cat_id']]['products']) || !count($data[$cat['cat_id']]['products'])) {
        continue;
    }
    ?>
    <div class="clearfix" style="margin-bottom: 41px;">
        <div class="title clearfix">
            <div class="title_box">
                <h2><a href="<?php echo $cat['link'] ?>" title="<?php echo $cat['cat_name'] ?>"><?php echo $cat['cat_name']; ?></a></h2>
            </div>
        </div>
        <div class="container">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
                <?php
                if (isset($data[$cat['cat_id']]['children_category']) && count($data[$cat['cat_id']]['children_category'])) {
                    foreach ($data[$cat['cat_id']]['children_category'] as $child_cat) {
                        ?>
                        <li>
                            <a href="<?php echo $child_cat['link'] ?>"><?php echo $child_cat['cat_name'] ?></a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
        <div class="list-product">
            <?php foreach ($data[$cat['cat_id']]['products'] as $product) { ?>
                <div class="col-xs-3 item_product">
                    <div class="wrap-image-product">
                        <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>">
                            <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's280_280/' . $product['avatar_name'] ?>">
                        </a>
                    </div>
                    <div class="list-content-body">
                        <div class="product-price-all clearfix">
                            <span class="list-content-title">
                                <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a>
                            </span>
                            <?php if ($product['price'] && $product['price'] > 0) { ?>
                                <div class="product-price">
                                    <?php echo $product['price_text']; ?>
                                </div>
                            <?php } ?>
                            <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                <div class="product-price-market">
                                    <?php echo $product['price_market_text']; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
