<div class="cateinhome">
    <?php
    $show4 = true;
    foreach ($cateinhome as $cat) {
        if (!isset($data[$cat['cat_id']]['products']) || !count($data[$cat['cat_id']]['products']))
            continue;
        ?>
        <?php if ($show4) { ?>
            <div class="product-all">
                <div class="main-list">
                    <div class="border-list">
                        <div class="title">
                            <h2 class="page-title"><i><?php echo $cat['cat_name']; ?></i></h2>
                        </div>
                    </div><!--end-border-list-->
                </div><!--end-main-list-->
                <div class="cont">
                    <div class="row prd-row">
                        <?php foreach ($data[$cat['cat_id']]['products'] as $product) { ?>
                            <div class="col-sm-3 col-xs-12 prd-item">
                                <div class="list-content-box">
                                    <div class="list-content-img">
                                        <a href="<?php echo $product['link']; ?>">
                                            <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's450_450/' . $product['avatar_name'] ?>">
                                        </a>
                                    </div>
                                    <div class="list-content-body"> 
                                        <div class="list-content-title">
                                            <h3>
                                                <a href="<?php echo $product['link']; ?>">
                                                    <?php echo $product['name']; ?>
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div><!--end-list-gird-->
            </div>
            <?php $show4 = false; ?>
        <?php } else { ?>
            <div class="product-all row3">
                <div class="main-list">
                    <div class="border-list">
                        <div class="title">
                            <h2 class="page-title"><i><?php echo $cat['cat_name']; ?></i></h2>
                        </div>
                    </div><!--end-border-list-->
                </div><!--end-main-list-->
                <div class="cont">
                    <div class="row prd-row">
                        <?php foreach ($data[$cat['cat_id']]['products'] as $product) { ?>
                            <div class="col-sm-4 col-xs-12 prd-item">
                                <div class="list-content-box">
                                    <div class="list-content-img">
                                        <a href="<?php echo $product['link']; ?>">
                                            <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's450_450/' . $product['avatar_name'] ?>">
                                        </a>
                                    </div>
                                    <div class="list-content-body"> 
                                        <div class="list-content-title">
                                            <h3>
                                                <a href="<?php echo $product['link']; ?>">
                                                    <?php echo $product['name']; ?>
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div><!--end-list-gird-->
            </div>
            <?php $show4 = true; ?>
        <?php } ?>
    <?php } ?>
</div>