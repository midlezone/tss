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
var certificatesFirst = '<?php echo $certificatesFirst;?>';
var certificatesLast = '<?php echo $certificatesLast;?>';
 //http://g2s.tss-software.com.vn/mediacenter//media/files/1145/avatar/184_1538068377_7655bad0f99c61af.png
</script>
<div class="ttl-box-profile" id="right-profile-message-wrapper">
    <p>Thông tin nâng cao</p>
</div>
<div class="cont-user-account">
    <div class="user-inf">
        <div class="row-inf">
            <label>Chứng minh nhân dân:<span>*</span></label>
            <div class="row-right">
                <input type="text" id="certificates" value="<?php echo $this->profileinfo['identity_card'];?>" <?php echo $display?>/>
            </div>
        </div>
        <div class="row-inf">
            <label>Ngày cấp CMND:<span>*</span></label>
            <div class="row-right">
                <input type="date" id="dateRange" value="<?php echo $this->profileinfo['created_identity_card'];?>"  <?php echo $display?>/>
            </div>
        </div>
        <div class="row-inf">
            <label>Nơi cấp:<span>*</span></label>
            <div class="row-right">
                <input type="text" id="issuedBy" value="<?php echo $this->profileinfo['created_identity_card'];?>"  <?php echo $display?>/>
            </div>
        </div>
        
        <div class="row-inf">
            <label>Mặt trước CMND:<span>*</span></label>
            <div class="row-right">
                <img class = "certificates" id = "certificatesFirstImg"src="<?php echo $certificatesFirst;?>" onclick="chooseFile('certificatesFirst')"/>
                <form id="formCertificatesFirst" style="display: none;">
                    <input type="file" id="certificatesFirst" onchange="chooseImg('#certificatesFirstImg', 'certificatesFirst', 'formCertificatesFirst')"  <?php echo $display?>/>
                </form>
            </div>
        </div>
        
        <div class="row-inf">
            <label>Mặt sau CMND:<span>*</span></label>
            <div class="row-right">
            <img class = "certificates" id = "certificatesLastImg" src="<?php echo $certificatesLast;?>" onclick="chooseFile('certificatesLast')"/>
                <form id="formcertificatesLast" style="display: none;">
                    <input type="file" id="certificatesLast"  onchange="chooseImg('#certificatesLastImg', 'certificatesLast', 'formcertificatesLast')"  <?php echo $display?>/>
                </form>
            </div>
        </div>
        <div class="row-inf row-small">
            <label>Email:</label>
            <div id="email-wrapper" class="row-right " >
                <div class="row-right-inner">
                    <input type="text" name="email" disabled="disabled" id="email" value="<?php echo $this->profileinfo['email'];?>" />
                    <div class="error error-error">Vui lòng thêm email.</div>
                </div>
            </div>
            <?php if($this->profileinfo['verified_email'] == 0) {
                echo ' <label class="email-status"><span class="unauthorized">(Chưa xác thực)</span></label>';
            }?>
           
        </div>
        <div class="row-inf">
            <label>Mã Giới Thiệu:</label>
            <div class="row-right">
                <input type="text" id="keyReferrers" value="<?php echo $this->profileinfo['token'];?>" <?php if(!empty($this->profileinfo['token'])) {echo 'disabled'; }?>/>
            </div>
        </div>
        <div class="row-inf">
            <label>Link Giới Thiệu:</label>
            <div class="row-right">
                <p class="text_slide" id="linkReferrers" onclick="coppyUrl()"><?php echo $this->profileinfo['link_introduce'];?></p>
            </div>
        </div>
        <div class="row-inf">
            <label>Người Giới Thiệu:</label>
            <div class="row-right">
                <input type="text" id="nameReferrers" value="<?php echo $this->profileinfo['zoda_granted'];?>" <?php if(!empty($this->profileinfo['zoda_granted'])) {echo 'disabled'; }?>/>
            </div>
        </div>
        
        <div class="row-inf">
            <div class="row-right">
                <div class="error error-supmit" style="color: #f00;margin-bottom: 10px; display: block;"></div>
                <button class="bt-save" onclick="updateAdvanced()">Cập nhật</button>
            </div>
        </div>
    </div>
</div>
</div>


