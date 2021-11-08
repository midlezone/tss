<?php if (count($products)) { ?>
    <div id="owl-demo" class="list grid">
        <?php if ($show_widget_title) { ?>
            <div class="widget-title">
                <h3><?php echo $widget_title; ?></h3>
            </div>
        <?php } ?>

        <?php
        foreach ($products as $product) {
            ?>
            <div class="item">
                <div class="box-cont">
                    <div class="box-img">
                        <a href="<?php echo $product['link']; ?>">
                            <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's200_200/' . $product['avatar_name'] ?>">
                        </a>
                    </div>
                    <div class="box-info">
                        <h3>
                            <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a> 
                        </h3>
                        <div class="price">
                            <span>Giá:</span>  
                            <span><?php echo $product['price_text']; ?></span>
                        </div>
                        <div class="mahang">
                            <span>Mã SP: </span><?php echo $product['code']; ?>
                        </div>
                        <!--                        <div class="hangsp">
                        
                                                    Hãng: 
                                                    <span class="blue">
                        <?php
                        ?>
                                                        CRW
                                                    </span>
                                                </div>
                                                <div class="xuatxu">
                                                    <span>Xuất Xứ :</span> Anh
                                                </div>
                                            </div>-->
                    </div>
                </div>
            </div>

        <?php } ?>

        <div class='product-page'>
            <?php
            $this->widget('common.extensions.LinkPager.LinkPager', array(
                'itemCount' => $totalitem,
                'pageSize' => $limit,
                'header' => '',
                'htmlOptions' => array('class' => 'W3NPager',), // Class for ul
                'selectedPageCssClass' => 'active',
            ));
            ?>
        </div>
    </div>
<?php } ?>