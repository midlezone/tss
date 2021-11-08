<?php 
    $certificatesFirst = $certificatesLast = $this->profileinfo['serverName']."/mediacenter//media/files/1145/avatar/184_1538068377_7655bad0f99c61af.png";
    if (!empty($this->profileinfo['front_identity_card'])) {
        $certificatesFirst =  $this->profileinfo['serverName']."/".$this->profileinfo['front_identity_card'];
    }
    
    if (!empty($this->profileinfo['back_identity_card'])) {
        $certificatesLast =  $this->profileinfo['serverName']."/".$this->profileinfo['back_identity_card'];
    }
    $display = 'disabled';
    $censorship = 1;
    if (empty($this->profileinfo['censorship'])) {
        $display = '';
        $censorship = 0;
    }
?>

<script>
var censorship = <?php echo $censorship;?>;
var zocoin = <?php echo $this->profileinfo['zocoin'];?>;
var bankNumber = '<?php echo $this->profileinfo['bank_id'];?>';
var bankName = '<?php echo $this->profileinfo['bank_name'];?>';
var bankBranch = '<?php echo $this->profileinfo['bank_branch'];?>';

</script>

<div class="ttl-box-profile" id="right-profile-message-wrapper">
    <p>Lịch sử rút tiền</p>
</div>
<div class="cont-user-account payment">
    <div class="user-inf">
        <div id="listPayment">
            <table class="table table-bordered">
                <thead>
                    <tr style="background: #e5101d;color: #fff;">
                        <th>STT</th>
                        <th>Số tài khoản</th>
                        <th>Ngận hàng</th>
                        <th>Chi nhánh</th>                       
                        <th>Trạng thái</th>
                        <th >Ngày tạo</th>
                         <th>Số tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $n = 1;
                        $total = 0;
                        foreach($payments AS $payment) {
                            $status = 'Đang chờ xác nhận';
                            if ($payment["status"] == 1) {
                                 $status = 'Đã xác nhận';
                            }
                            if ($payment["status"] == 2) {
                                 $status = 'Yêu cầu không được xác nhận';
                            }
                            echo '
                            <tr>
                                <td>'.$n.'</td>
                                <td>'.$payment["bank_number"].'</td>
                                <td>'.$payment["bank_name"].'</td>
                                <td>'.$payment["bank_branch"].'</td>                                
                                <td>'.$status.'</td>
                                <td>'.$payment["created_at"].'</td>
                                <td>'.number_format($payment["money"],0,",",".").'</td>
                            </tr>';
                            $n ++;
                            $total = $total + $payment["money"];
                        }
                        echo "<tr><td colspan='6'><b>Tổng tiền</b></td><td><b>".number_format($total,0,",",".")." VNĐ</b></td></tr>"
                        
                    
                    ?>
                </tbody>
            </table>
            <div class="row-inf">
                <div class="row-left">
                    <div class="error error-supmit" style="color: #f00;margin-bottom: 10px; display: block;"></div>
                    <button class="bt-save" onclick="showFormPayment()">Rút tiền</button>
                </div>
            </div>
        </div>
        <div id="creatPayment" style="display: none;">
             <div class="row-inf">
                <label>Thông tin tài khoản</label>
               
                <div class="row-right">
                      <?php
                    if (!empty($this->profileinfo['bank_id']) || !empty($this->profileinfo['bank_name']) || !empty($this->profileinfo['bank_branch'])) {
                        echo '<input style="margin-bottom: 6px;" type="text" value="'.$this->profileinfo['bank_id'].'" disabled/><br/>
                        <input style="margin-bottom: 6px;" type="text"  value="'.$this->profileinfo['bank_name'].'" disabled/><br/>
                        <input type="text" value="'.$this->profileinfo['bank_branch'].'" disabled/><br/>';
                    } else {
                        echo "<label>Bạn chưa có tài khoản ngân hàng</label>";
                    }
                
                ?>
                </div>
            </div>
            <div class="row-inf">
                <label>Nhập số tiền:</label>
                <div class="row-right">
                    <input type="number" id="numberMony" value="" placeholder="" />
                     <?php if($this->profileinfo['censorship'] == 0) {
                        echo '<span class="notebank"><b>Chú ý: </b>Thông tin bạn chưa được xác thực nên không thể thực hiện rút tiền.</span>';
                    }?>
                    <span class="notebank"><b>Chú ý: </b> Tỷ giá quy đổi: 1 zocoin = 1000 VNĐ</span>
                </div>
                
            </div>
            <div class="row-inf">
                <label>Zocoin hiện có:</label>
                <div class="row-right">
                    <input type="text" id="zocoin" value="<?php echo $this->profileinfo['zocoin'];?>" disabled=""/>
                </div>
            </div>
               
            <div class="row-inf">
                <div class="row-right">
                    <div class="error error-supmit" style="color: #f00;margin-bottom: 10px; display: block;"></div>
                    <button class="bt-save" onclick="payment()">Gửi yêu cầu</button>
                    <button class="bt-save" onclick="cancelPament()">Hủy bỏ</button>
                </div>
            </div>
       
        </div>
    </div>
</div>
</div>
