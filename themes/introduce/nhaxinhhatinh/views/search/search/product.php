<div class="product-search"> 
    <div class="search-result">
        <p class="textreport"><?php echo Yii::t('common', 'search_result', array('{results}' => $totalitem, '{keyword}' => '<span class="bold">' . $keyword . '</span>')); ?></p>
    </div>
    <?php if (count($data)) { ?>
        <div class="list grid">
            <?php
            foreach ($data as $pro) {
                $price = number_format(floatval($pro['price']));
                $price_market = number_format(floatval($pro['price_market']));
                ?>
                <div class="item">
                    <div class="box-cont">
                        <div class="box-img">
                            <a href="<?php echo $pro['link']; ?>">
                                <img alt="<?php echo $pro['name']; ?>" src="<?php echo ClaHost::getImageHost() . $pro['avatar_path'] . 's200_200/' . $pro['avatar_name'] ?>">
                            </a>
                        </div>
                        <div class="box-info">
                            <h3>
                                <a href="<?php echo $pro['link'] ?>" title="<?php echo $pro['name'] ?>"><?php echo $pro['name'] ?></a> 
                            </h3>
                            <div class="price">
                                <span>Giá:</span>  
                                <span><?php echo $pro['price_text']; ?></span>
                            </div>
                            <div class="mahang">
                                <span>Mã SP: </span><?php echo $pro['code']; ?>
                            </div>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="wpager">
            <?php
            $this->widget('common.extensions.LinkPager.LinkPager', array(
                'itemCount' => $totalitem,
                'pageSize' => $limit,
                'header' => '',
                'selectedPageCssClass' => 'active',
            ));
            ?>
        </div>
    <?php } ?>