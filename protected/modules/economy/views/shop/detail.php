<div class="product-category"> 
    <div class="infor-shop clearfix">
        <div class="shop-image">
            <a href="javascript:void(0)">
                <img src="<?php echo ClaHost::getImageHost(), $shop['image_path'], 's200_200/', $shop['image_name']; ?>" />
            </a>
        </div>
        <div class="shop-description">
            <h1>
                <?php echo $shop['name']; ?>
                <?php if ($liked == 0) { ?>
                    <a class="btn-like-shop" href="javascript:void(0)">
                        <img style="width: 33px;margin: -10px 0 0 15px;" src="<?php echo Yii::app()->theme->baseUrl, '/css/img/icon-like1.png' ?>" />
                    </a>
                <?php } else if(Yii::app()->user->id && $liked) { ?>
                    <a class="btn-like-shop btn-unlike-shop" href="javascript:void(0)">
                        <img style="width: 33px;margin: -10px 0 0 15px;" src="<?php echo Yii::app()->theme->baseUrl, '/css/img/icon-like2.png' ?>" />
                    </a>
                <?php } ?>
                <span class="count_like"><?php echo $count_like ?></span>
            </h1>
            <div class="description">
                <?php echo $shop['description']; ?>
            </div>
        </div>
        <div class="shop-contact">
            <div class="btn-shop">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                    <?php echo Yii::t('shop', 'shop_contactinfo') ?>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel"><?php echo Yii::t('shop', 'shop_contactinfo') ?></h4>
                            </div>
                            <div class="modal-body">
                                <?php
                                $this->renderPartial('partial/popupcontact', array('shop' => $shop));
                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-shop">
                <a href="#"><?php echo Yii::t('shop', 'sales_policy') ?></a>
            </div>
            <div class="time-contact">
                <span><?php echo Yii::t('shop', 'time_open'), ' : ', $shop['time_open'], 'h - ', $shop['time_close'], 'h' ?> </span>
                <span><?php echo Yii::t('shop', 'day_work'), ' : ', Shop::getDayText($shop['day_open']), ' - ', Shop::getDayText($shop['day_close']) ?> </span>
            </div>
        </div>
    </div>
    <div class="category-result">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-6 col-sm-6">
                        <span><?php echo Yii::t('product', 'product_result', array('{result}' => $totalitem)); ?></span>
                    </div>
                    <div class="col-xs-6 col-sm-3 pull-right">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
                        ?>
                    </div>
                    <div class="col-xs-6 col-sm-3 pull-right">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (count($products)) { ?>
        <div class="list grid">
            <?php
            foreach ($products as $product) {
                ?>
                <div class="col-sm-4 box-product">
                    <div class="box-img">
                        <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name'] ?>">
                            <img src="<?php echo ClaHost::getImageHost(), $product['avatar_path'] . 's330_330/', $product['avatar_name'] ?>">
                        </a>
                    </div>
                    <div class="info">
                        <h1><?php echo $product['name']; ?></h1>
                        <p><span><?php echo $product['price_text'] ?></span></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class='product-page'>
            <?php
            $this->widget('common.extensions.LinkPager.LinkPager', array(
                'itemCount' => $totalitem,
                'pageSize' => $limit,
                'header' => '',
                'selectedPageCssClass' => 'active',
            ));
            ?>
        </div>
    <?php } else { ?>
        <p class="text-info">
            <?php Yii::t('product', 'product_no_result'); ?>
        </p>
    <?php } ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.btn-like-shop').click(function () {
            var status = '';
            if($(this).hasClass('btn-unlike-shop')) {
                status = 'unlike';
            } else {
                status = 'like';
            }
            var user_id = '<?php echo Yii::app()->user->id; ?>';
            if(user_id == '') {
                if(confirm('Bạn cần đăng nhập để thích!')) {
                    location.href = '<?php echo Yii::app()->createUrl('login/login/login') ?>';
                } else {
                    return false;
                }
            }
            $.getJSON(
                    "<?php echo $this->createUrl('likeshop'); ?>",
                    {id:<?php echo $shop['id'] ?>, status: status},
            function (data) {
                if (data.code == 200) {
                    if(data.status == 'like') {
                        $('.btn-like-shop').addClass('btn-unlike-shop');
                        $('.btn-like-shop img').attr('src', data.srcimg);
                        $('.count_like').text(data.count_like)
                        alert('Đã thích');
                    } else if (data.status == 'unlike') {
                        $('.btn-like-shop').removeClass('btn-unlike-shop');
                        $('.btn-like-shop img').attr('src', data.srcimg);
                        $('.count_like').text(data.count_like)
                        alert('Đã bỏ thích');
                    }
                }
            }
            );
        });
    });
</script>

