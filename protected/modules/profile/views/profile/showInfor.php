<div class="ttl-box-profile" id="right-profile-message-wrapper">
    <p>Thông tin tài khoản</p>
</div>
<div class="cont-user-account">
    <div class="img-user" onclick="changeAvatar();">
        <img id='avatar' src="<?php echo $data['avatar'];?>" alt="" class="img-avatar" />
        <a href="javascript:void(0);" title="Upload hình" class="bt-update">Thay đổi</a>
        <form id="formAvatar">
            <input type="file" id="fileAvatar" onchange="chooseAvatar()" style="display: none;"/>
        </form>
    </div>
    <div class="user-inf">
        <div class="row-inf row-small">
            <label>Email:<span>*</span></label>
            <div id="email-wrapper" class="row-right" >
                <div class="row-right-inner">
                    <input type="text" name="email" id="email" value="<?php echo $data['email'];?>" />
                    <div class="error error-error">Vui lòng thêm email.</div>
                </div>
            </div>
            <?php if($this->profileinfo['verified_email'] == 0) {
                echo ' <label class="email-status"><span class="unauthorized">(Chưa xác thực)</span></label>';
            }?>
        </div>
        <div class="row-inf">
            <!-- authorized unauthorized -->
            <label>Số điên thoại:<span>*</span></label>
            <div id="telephone-wrapper" class="row-right dialog-init" data-init="#phoneDialog">
                <div class="row-right-inner">
                    <a href="javascript:void(0)" id="changePhone" title="Thay đổi số điện thoại" class="row-action"></a>
                    <input disabled type="tel" value="<?php echo $data['phone'];?>" id="telephone" maxlength="11" />
                </div>
            </div>
        </div>

        <div class="row-inf">
            <label>Họ và tên:<span>*</span></label>
            <div class="row-right">
                <input type="text" name="first_name" value="<?php echo $data['name'];?>" id="full_name" maxlength="30" />
                <div class="error error-fname"></div>
            </div>
        </div>
        <div class="row-inf">
            <label>Giới tính:</label>
            <div class="row-right">
                <ul class="input-holder">
                    
                    <?php 
                        $male = $female = '';
                        if ($data['sex'] == 2) {
                           $male = 'checked';
                        }
                        if ($data['sex'] == 1) {
                            $female = 'checked';
                        }
                    
                    ?>
                    <li>
                        <input type="radio" value="2" class="sex" name="gender" id="male" <?php echo $male;?> />
                        <label for="male">Nam</label>
                    </li>
                    <li>
                        <input type="radio" value="1" class="sex" name="gender" id="female" <?php echo $female;?> />
                        <label for="female">Nữ</label>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row-inf dob">
            <label>Ngày sinh:<span>*</span></label>
            <div class="row-right row-flex">
                <div class="options-inf" id="date">
                    <select id="dobday"></select>
                </div>
                <div class="options-inf" id="month">
                    <select id="dobmonth"></select>
                </div>
                <div class="options-inf" id="year">
                    <select id="dobyear"></select>
                </div>
            </div>
        </div>
        <div class="row-inf">
            <label>Địa chỉ:<span>*</span></label>
            <div class="row-right">
                <input type="text" name="address" value="<?php echo $data['address'];?>" id="address" maxlength="30" />
                <div class="error error-address"></div>
            </div>
        </div>
       
        <div class="row-inf">
        <div class="row-right">
            <a class="row-link" href="<?php echo Yii::app()->createUrl('profile/profile/changepassword') ?>" title="Thay đổi mật khẩu">Thay đổi mật khẩu</a>
        </div>
        </div>
    
        <div class="row-inf">
            <div class="row-right">
                <div class="error error-supmit" style="color: #f00;margin-bottom: 10px; display: block;"></div>
                <button class="bt-save" onclick="updateProfile()">Cập nhật</button>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    var dob = "<?php echo $data['birthday']?>";
    var urlAvatar = "<?php echo $data['avatar']?>";
    
    setTimeout(function(){ setDobUser(); }, 1000);
</script>
