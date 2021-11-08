
<div class="product-order">
    <h3 class="username-title">Đơn hàng</h3>
    <div style="padding-top:0px;" id="orders-grid" class="grid-view">
        <table class="table table-bordered table-hover vertical-center">
            <thead>
                <tr>
                    <th id="orders-grid_corder_id"><a class="sort-link" href="/profile/profile/order/Orders_sort/order_id">#</a>
                    </th>
                    <th id="orders-grid_ccreated_time"><a class="sort-link" href="/profile/profile/order/Orders_sort/created_time">Thời gian tạo</a>
                    </th>
                    <th id="orders-grid_ccreated_time">Họ tên</th>
                    <th id="orders-grid_ccreated_time">Điện thoại</th>
                    <th id="orders-grid_ccreated_time">email</th>
                    <th id="orders-grid_ccreated_time">Địa chỉ</th>
                    <th id="orders-grid_corder_status"><a class="sort-link" href="/profile/profile/order/Orders_sort/order_status">Trạng thái</a>
                    </th>
                    <th id="orders-grid_corder_total"><a class="sort-link" href="/profile/profile/order/Orders_sort/order_total">order total</a>
                    </th>
                    <th class="button-column" id="orders-grid_c0">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                
                <?php 
                    foreach ($orders AS $order) {
                        
                        $status = 'Chờ xử lý';
                        $cancel = '';
                        if ($order["status"] == 1) {
                            $status = 'Chờ thanh toán';
                        }
                        if ($order["status"] == 2) {
                            $status = 'Chờ hoàn thành';
                        }
                        if ($order["status"] == 3) {
                            $status = 'Chờ xuất hàng';
                        }
                        if ($order["status"] == 4) {
                            $status = 'Chờ nhận hàng';
                        }
                        if ($order["status"] == 5) {
                            $status = 'Hủy đơn hàng';
                        }
                        if ($order["status"] == 6) {
                            $status = 'Hoàn thành';
                        }
                        if ($order["status"] == 0) {
                            $cancel = '<a class="delete" title="Hủy đơn hàng" href="/profile/profile/cancelorder/oid/'.$order["id"].'/key/'.$order["key"].'">Hủy | </a>'; 
                        }
                        echo '
                        <tr class="odd">
                            <td>#'.$order["id"].'</td>
                            <td>'.date('H:i:s d-m-y',$order["created"]).'</td>
                            <td>'.$order["shipping_name"].'</td>
                            <td>'.$order["phone"].'</td>
                            <td>'.$order["email"].'</td>
                            <td>'.$order["address"].'</td>
                            <td>'.$status.'</td>
                            <td><span class="pricetext">'.number_format($order["order_total"], 0, '', ',').'</span><span class="currencytext">đ</span>
                            </td>
                            <td style="width: 160px; text-align: center;">
                                '.$cancel.'
                                <a class="icon-file-text" style ="width:auto" title="Chi tiết" href="/economy/shoppingcart/order/id/'.$order["id"].'/key/'.$order["key"].'">Chi tiết</a>
                            </td>
                        </tr>
                        ';
                    }
                
                ?>
                
            </tbody>
        </table>
        <div class="keys" style="display:none" title="/profile/profile/order"><span>323</span><span>322</span><span>321</span><span>320</span><span>318</span><span>317</span>
        </div>
		<p class="home-desktop-view-button" style="text-align: center;"><a href="/san-pham" class="join fivetips-joinlink" style="z-index: 999; float: none; border-radius: 4px;
		  padding: 6px 14px;">Mua Hàng →</a></p>
		  
    </div>
</div>