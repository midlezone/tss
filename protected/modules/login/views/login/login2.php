 <?php
						$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
						?>
<div id="container" class="container">
 <div class="login" data-spm-anchor-id="a2o4n.login_signup.0.i0.492a705b0jtKzv">
	<div class="login-title">
	   <h3>Chào mừng đến với Zoda. Đăng nhập ngay!</h3>
	   <div class="login-other"><span>Thành viên mới? <a href="<?php echo Yii::app()->createUrl('/login/login/signup'); ?>">Đăng kí</a> tại đây</span></div>
	</div>
	<div>
		<?php
			$form = $this->beginWidget('CActiveForm', array(
				'id' => 'login-form',
				'htmlOptions' => array(
					'class' => 'form-horizontal',
				),
				'enableClientValidation' => true,
				'enableAjaxValidation' => false,
			));
			?>
	  <form class="form-horizontal" id="login-form" action="/dang-nhap" method="post">		
	  	<div class="regis control-group form-group">
		  <div class="mod-login">
			 <div class="mod-login-col1">
				<div class="mod-input mod-login-input-loginName mod-input-loginName"><label>Số điện thoại hoặc email</label>
					<input  type="text" placeholder="Vui lòng nhập số điện thoại hoặc email của bạn" name="LoginForm[username]" id="LoginForm_username" type="text"><b></b><span></span>
					<?php echo $form->error($model, 'username'); ?>
				</div>
				<div class="mod-input mod-input-password mod-login-input-password mod-input-password">
				   <label>Mật khẩu</label>
				   <input type="password" placeholder="Vui lòng nhập mật khẩu của bạn" name="LoginForm[password]" id="LoginForm_password" ><b></b><span></span>
				   <div class="mod-input-password-icon"></div>
				</div>
				<div class="mod-login-forgot"><a href="<?php echo Yii::app()->createUrl('/login/login/forgotpassword'); ?>">Quên mật khẩu?</a></div>
			 </div>
			 <div class="mod-login-col2">
				<div class="mod-login-btn">

					<button type="submit" class="next-btn next-btn-primary next-btn-large">ĐĂNG NHẬP</button></div>
				<div class="mod-login-third">
				   <div class="mod-third-party-login mod-login-third-btns">
					  <div class="mod-third-party-login-line"><span>Hoặc, đăng nhập bằng</span></div>
					  <div class="mod-third-party-login-bd">
					  	<button class="mod-button mod-button mod-third-party-login-btn mod-third-party-login-fb"><i class="fa fa-facebook"></i>         Facebook</button><button class="mod-button mod-button mod-third-party-login-btn mod-third-party-login-google"> <i class="fa fa-google-plus"></i>       Google</button></div>
				   </div>
				</div>
			 </div>
		  </div>
	   </form>
	</div>
 </div>
 </div>
 <?php $this->endWidget(); ?>