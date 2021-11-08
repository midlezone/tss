    <div class="overleaf">
        <div class="banner-trong">
            <?php if($category['image_name']) { ?><img src="<?php echo ClaHost::getImageHost() . $category['image_path']. $category['image_name'] ?>"> <?php }?>
            </div>
        <div class="clearfix layout layout-2">
            <div id="leftCol" class="clearfix">
                <div class="panel panel-default categorybox">
                    <div>
                        <ul class="menu menu-list">
                            <?php
                            $str = '';
                            $aryPacategory = $categoryClass->getTrackCategory($category['cat_id']);
                            if ($aryPacategory && count($aryPacategory)) {
                                ?>
                                <?php foreach ($aryPacategory as $cat) { ?>
                                    <li>
                                        <a href="<?php echo $cat['link']; ?>" title="<?php echo $cat['cat_name']; ?>">
                                            <?php echo ($cat['cat_id']== $category['cat_id']) ? ('<div class="panel-heading"><h3>'.$str . $cat['cat_name'] .'</h3></div>') : $str . $cat['cat_name']; ?>
                                        </a>
                                    </li>
                                    <?php $str.='&nbsp;&nbsp;&nbsp;&nbsp;'; ?>
                                <?php } ?>
                            <?php } ?>
                            <?php
                            $subcategory = $categoryClass->getSubCategory($category['cat_id']);
                            if ($subcategory && count($subcategory)) {
                                ?>
                                <?php foreach ($subcategory as $cat) { ?>
                                    <li>
                                        <a href="<?php echo $cat['link']; ?>" title="<?php echo $cat['cat_name']; ?>">
                                            <?php echo $str . $cat['cat_name']; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                    <!--end-panel-body--> 
                </div>
                <div class="panel panel-default categorybox">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
                    ?>
                </div>
            </div>
            <div id="contentCol">
                <div id="centerCol">
                    <div class="Category_list">
                        <div class="box-option-search-main clearfix" >
                            <div class="sp-page-search" > <span><?php echo Yii::t('product', 'product_result', array('{result}' => $totalitem)); ?></div>
                            <div class="arrange" >
                                <?php
                                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3));
                                ?>
                            </div>
                            <div class="displayed" >
                                <?php
                                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2));
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="product-all">
                        <div class="box-main-one"> 
                            <?php if (count($products)) { ?>
                                <div class="list grid">
                                    <?php
                                    foreach ($products as $product) {
                                        ?>
                                        <div class="list-item get-product-detail" src="<?php echo Yii::app()->createUrl('/economy/product/getproductinfo', array('id' => $product['id'], 'alias' => $product['alias'])) ?>" target-detail=".hover-list-content .category_product_detail_div" show-loading="true">
                                            <div class="list-content">
                                                <div class="list-content-box">
                                                    <?php if (!ClaSite::isMobile()) { ?>
                                                    <div class="hover-list-content">
                                                        <div class="category_product_detail_div">
                                                        </div>
                                                    </div>
                                                    <?php }?>
                                                    <div class="list-content-img">
                                                        <?php if ($product['avatar_path'] && $product['avatar_name']) { ?>
                                                            <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                                                <img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's256_256/' . $product['avatar_name'] ?>" alt="<?php echo $product['name'] ?>">
                                                            </a>
                                                        <?php } ?>
                                                        <a href="<?php echo $product['link']; ?>" class="addcart">
                                                            <span><?php echo Yii::t('common', 'view_detail'); ?></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div><!--end-list-gird-->
                            <?php } ?>
                            <div class="box-product-page clearfix">
                                <div class="product-page" style="float:right; text-align: right; ">
                                    <?php
                                    $this->widget('common.extensions.LinkPager.LinkPager', array(
                                        'itemCount' => $totalitem,
                                        'pageSize' => $limit,
                                        'header' => '',
                                        'selectedPageCssClass' => 'active',
                                    ));
                                    ?>
                                </div><!--end-box-main-one-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>