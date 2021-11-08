<?php if (count($products)) { ?>
    <?php
    echo "<pre>";
    print_r($products);
    echo "</pre>";
    die();
    ?>
    <div class="main-content main-content-bg main-content-padding clearfix">
        <div class="product-all">
            <div class="main-list">
                <div class="border-list">
                    <div class="title">

                    </div>
                </div><!--end-border-list-->
            </div><!--end-main-list-->
            <div class="cont">
                <div class="row prd-row">
    <?php foreach ($products as $product) { ?>
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
            </div>
        </div>

        <div class='box-product-page clearfix'>
            <?php
            $this->widget('common.extensions.LinkPager.LinkPager', array(
                'itemCount' => $totalitem,
                'pageSize' => $limit,
                'header' => '',
                'selectedPageCssClass' => 'active',
            ));
            ?>
        </div>
    </div>
<?php } ?>