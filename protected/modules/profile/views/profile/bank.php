<script>
    var bank = '<?php echo $this->profileinfo['bank_name'];?>';
    
    setTimeout(function(){ setBank(); }, 1000);
</script>
<div class="ttl-box-profile" id="right-profile-message-wrapper">
    <p>Thông tin Ngân hàng</p>
</div>
<div class="cont-user-account">
    <div class="user-inf">
        <div class="row-inf">
            <label>Số tài khoản ngân hàng:<span>*</span></label>
            <div class="row-right">
                <input type="text" id="bankNumber" value="<?php echo $this->profileinfo['bank_id'];?>"/>
                <span class="notebank"><b>Chú ý: </b>Hãy nhập số tài khoản ngân hàng chính xác để sử dụng cho việc thanh toán thuận lơi!</span>
            </div>
        </div>
        <div class="row-inf">
            <label>Tên ngân hàng:<span>*</span></label>
            <div class="row-right">
                <select id="bankName">
                    <option value="">Chọn Ngân Hàng</option>
                    <option value="VietinBank">VietinBank</option>
                    <option value="BIDV">BIDV</option>
                    <option value="VPBank">VPBank</option>
                    <option value="AgriBank">AgriBank</option>
                    <option value="VietcomBank">VietcomBank</option>
                    <option value="ACB">ACB</option>
                    <option value="MBBank">MBBank</option>
                    <option value="SacomBank">SacomBank</option>
                    <option value="MaritimeBank">MaritimeBank</option>
                    <option value="TechcomBank">TechcomBank</option>
                    <option value="DongABank">DongABank</option>
                </select>
            </div>
        </div>
        <div class="row-inf">
            <label>Chi nhánh ngân hàng:<span>*</span></label>
            <div class="row-right">
                <input type="text" id="bankBranch" value="<?php echo $this->profileinfo['bank_branch'];?>"/>
            </div>
        </div>
        <div class="row-inf">
            <label>Số Zocoin hiện tại:</label>
            <div class="row-right">
                <input type="text" value="<?php echo $this->profileinfo['zocoin'];?>" disabled=""/>
            </div>
        </div>

        <div class="row-inf">
            <div class="row-right">
                <div class="error error-supmit" style="color: #f00;margin-bottom: 10px; display: block;"></div>
                <button class="bt-save" onclick="updateBank()">Cập nhật</button>
            </div>
        </div>
    </div>
</div>
</div>
