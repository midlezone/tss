<div class="login" >
    <div class="login-title">
        <h3>Tạo tài khoản Zoda</h3>
        <div class="login-other" ><span>Bạn đã là thành viên? <a href="login/login/login">Đăng nhập</a> tại đây</span></div>
    </div>
     <?php
			$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
	?>
    <div>
        	
            <?php
					$form = $this->beginWidget('CActiveForm', array(
						'id' => 'user-form',
						'enableAjaxValidation' => false,
						'enableClientValidation' => true,
						'htmlOptions' => array(
							'class' => 'form-horizontal',
						),
					));
			?>
            <div class="mod-login">
                <div class="mod-login-col1">
                    <div class="mod-input mod-login-input-email mod-input-email">
                        <label>Địa chỉ email</label>                
                        
                        <input type="text"  name="Users[email]" id="Users_email" placeholder="Vui lòng nhập email của bạn" value="" /><b></b>
                        <span><?php echo $form->error($model, 'email'); ?></span></div>
                        
                    <div class="mod-input mod-input-password mod-login-input-password mod-input-password">
                        <label>Mật khẩu</label>
                       
                        <input type="password" name="Users[password]" id="Users_password" placeholder="Tối thiểu 6 kí tự bao gồm cả chữ và số" value="" /><b></b>
                        <span><?php echo $form->error($model, 'password'); ?></span>
                        <div class="mod-input-password-icon open"></div>
                    </div>
                    <div class ="mod-input">					
                          <label>Giới Tính</label>						
							<?php
							echo $form->dropDownList($model, 'sex', ClaUser::getListSexArr(), array('class' => 'next-select large mod-fusion-select mod-gender-gender',));
							?>
					   <span></span>
					</div>
                    <div class="mod-input mod-login-input-name mod-input-name">
                        <label>Tên</label>                       
                        <input type="text" name="Users[name]" id="Users_name" maxlength="100" placeholder="Họ Tên" value="" />
                        <b></b><span></span>
                    </div>
                </div>
                <div class="mod-login-col2">
                 
                    <div class="mod-login-btn">
                    
                        <button type="submit" class="next-btn next-btn-primary next-btn-large">ĐĂNG KÍ</button>
                    </div>
                    <div class="mod-login-policy"><span>Tôi đồng ý với <a href="/" target="_blank" rel="noopener noreferrer">Chính sách bảo mật Zoda</a></span></div>
                    
                    <div class="mod-login-third">
                        <div class="mod-third-party-login mod-third-party-login-in-two-lines">
                            <div class="mod-third-party-login-line"><span></span></div>
                            <div class="mod-third-party-login-bd">
                                <button class="mod-button mod-button mod-third-party-login-btn mod-third-party-login-fb">Facebook</button>
                                <button class="mod-button mod-button mod-third-party-login-btn mod-third-party-login-google">Google</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
       
    </div>
</div>