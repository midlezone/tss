<div class="order">
    <h2>Thông tin đơn hàng số #<?php echo $order['order_id']; ?></h2>
    <table width="100%" cellpadding="5" cellspacing="5" style=" border-collapse: inherit;border-spacing: 5px; border: 1px solid #CCC;">
        <tbody>
            <tr>
                <td colspan="2">
                    <table width="100%" border="0" cellspacing="5" style=" border-collapse: inherit;border-spacing: 5px;">
                        <tr>
                            <td width="50%">
                                <h3><?php echo Yii::t('shoppingcart', 'billing-text') ?></h3>
                                <div><?php echo $order['billing_name'] ?></div>
                                <div><?php echo $order['billing_address'] ?></div>
                                <div><?php
                                    $province = LibProvinces::getProvinceDetail($order['billing_city']);
                                    echo $province['name'];
                                    ?></div>
                                <div><?php echo $order['billing_phone'] ?></div>
                                <div><?php echo $order['billing_email'] ?></div>
                            </td>
                            <td style="border: none;">
                                <h3><?php echo Yii::t('shoppingcart', 'shipping-text') ?></h3>
                                <div><?php echo $order['shipping_name'] ?></div>
                                <div><?php echo $order['shipping_address'] ?></div>
                                <div><?php
                                    $province = LibProvinces::getProvinceDetail($order['shipping_city']);
                                    echo $province['name'];
                                    ?></div>
                                <div><?php echo $order['shipping_phone'] ?></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                     <b><?php echo Yii::t('shoppingcart', 'order-time'); ?>: </b><?php echo date('d-m-Y H:i:s',$order['created_time']); ?>
                     <br/>
                     <b><?php echo Yii::t('shoppingcart', 'payment_method'); ?>: </b><?php echo $paymentmethod; ?>
                     <br/>
                     <b><?php echo Yii::t('shoppingcart', 'transport_method'); ?>: </b><?php echo $transportmethod['name']; ?>
                </td>
            </tr>
            <tr style="border-top: 1px solid #DDD;">
                <td colspan="2">
                    <?php
                    $this->renderPartial('_product', array(
                        'products' => $products,
                    ));
                    ?>
                </td>
            </tr>
            <tr class="sc-totalprice-row">
                <td>
                    <div class="sc-totalprice-text">
                        <span>Thành tiền:</span>
                    </div>
                    <div class="sc-totalprice-text">
                        <span>Tổng tiền thanh toán:</span>
                    </div>
                </td>
                <td width="115">
                    <div class="sc-totalprice"><?php echo number_format($order['order_total']); ?></div>
                    <div class="sc-totalprice"><?php echo number_format($order['order_total']); ?></div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <b><?php echo Yii::t('common','note'); ?></b>
                    <p class="bg-success" style="padding:0px 10px;">
                        <?php echo $order['note']; ?>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-xs-12">
        </br>
        <button class="btn btn-info pull-right" id="printorder">In hóa đơn</button>
    </div>
</div>
<script>
    jQuery('#printorder').on('click', function() {
        w = window.open();
        w.document.write($('.order').html());
        w.print();
        w.close();
    });
</script>