

<div class="w3n-order container">
	<h2 class="product-category">ĐĂNG KÝ THÀNH CÔNG</h2>
  
		<div class="infor_oder">
		
			<p>Chào <strong><span class="yel"><?php echo $order['billing_name'] ?>,</span></strong></p>
			<p>Quý khách vừa đặt thành công sản phẩm của <a href=""><?php echo $_SERVER['HTTP_HOST']; ?></a>, mã đơn hàng của quý khách là:<strong><span class="yel"> <?php echo $order['order_id']; ?></span></strong>.
			</p>
			<?php if ($paymentmethod == 'Chuyển Khoản Ngân Hàng'):?> 
				<p>Đơn hàng đang chờ xác nhận thanh toán. Vui lòng thực hiện chuyển khoản với thông tin chi tiết bên dưới:</p>
					<div class="box-bankinfo">
					  <h4>thông tin chuyển khoản</h4>
					  <div class="bank-info">

						  <div class="bank-group-left">
							  <div class="bank-col-1">
								  <img src="https://checkout.scdn.vn/images/ecom/checkout/bank-list/vietcombank-sucess.jpg" alt="logo ngân hàng">
								</div>
							   <div class="bank-col-midle">
								  <span class="bank-name">NGÂN HÀNG VIETCOMBANK</span>
								  <span class="bank-branch">Chi nhánh: Thanh Xuân - Hà Nội</span>
							  </div>
						  </div>
						  <div class="bank-col-2">
							  <span class="bank-acc-name">Tên tài khoản nhận: <strong>Lê Vân Anh</strong></span>
							  <span class="bank-acc-number">Số tài khoản nhận: <strong>0711000274835</strong></span>
							  <span class="bank-money">Số tiền thanh toán: <strong><?php echo HtmlFormat::money_format($order['order_total']) ?></strong></span>
							  <span class="bank-note">Ghi chú: Thanh toán cho đơn hàng <?php echo $order['order_id']; ?></span>
						  </div>
					  </div>	  
					  
				</div>   
				<p>Sau khi shop xác nhận có hàng, sản phẩm sẽ được giao hàng đến địa chỉ của quý khách tại 	<b><?php echo $order['billing_address'] ?></b> trong 1 - 2 ngày.</p>
				<p>Mọi thông tin về đơn hàng sẽ được gửi tới email của quý khách, vui lòng kiểm tra email để biết thêm chi tiết.</p>
				<p>Đối với đơn hàng trên 1 triệu miễn phí ship toàn quốc còn lại là phí ship 30k VNĐ</p>
			<?php else: ?>
				<p>Sau khi shop xác nhận có hàng, sản phẩm sẽ được giao hàng đến địa chỉ của quý khách tại 	<b><?php echo $order['billing_address'] ?></b> trong 1 - 2 ngày.</p>
				<p>Mọi thông tin về đơn hàng sẽ được gửi tới email của quý khách, vui lòng kiểm tra email để biết thêm chi tiết.</p>
				<p>Đối với đơn hàng trên 1 triệu miễn phí ship toàn quốc còn lại là phí ship 30k VNĐ</p>
			<?php endif; ?>
			
		</div>
		<div class="infor_oder">
			<p><b><?php echo Yii::t('shoppingcart', 'order-time'); ?>: </b><?php echo date('d-m-Y H:i:s', $order['created_time']); ?></p>
			<p><b>Số Điện Thoại:<b> </b><?php echo $order['billing_phone'] ?></p>
			<p><b><?php echo Yii::t('shoppingcart', 'payment_method'); ?>: </b><?php echo $paymentmethod; ?></p>
		</div>
		<tbody>
            <tr style="border-top: 1px solid #DDD;">
                <td colspan="2">
                    <?php
                    $this->renderPartial('_product', array(
                        'products' => $products,
						'update' => false,
                    ));
                    ?>
                </td>
            </tr>
            <tr class="sc-totalprice-row">
                <td align="right">
                    <div class="sc-totalprice-text">
                        <span>Thành tiền:</span>
                    </div>
                    <div class="sc-totalprice-text">
                        <span>Tổng tiền thanh toán:</span>
                    </div>
                </td>
                <td width="110" align="right">
                    <div class="sc-totalprice"><?php echo Product::getPriceText(array('price' => $order['order_total'])); ?></div>
                    <div class="sc-totalprice"><?php echo Product::getPriceText(array('price' => $order['order_total'])); ?></div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <b><?php echo Yii::t('common', 'note'); ?></b>
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
			<button class="btn btn-info pull-right" id="printorder"><?php echo Yii::t('shoppingcart', 'order_print'); ?></button>
		</div>
	</div>
</div>

