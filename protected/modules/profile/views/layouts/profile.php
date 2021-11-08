
<?php $this->beginContent('//layouts/main'); ?>
<?php $themUrl = Yii::app()->theme->baseUrl; ?>
<script>
    var methodName = '<?php echo $this->profileinfo['methodName'];?>';
</script>
<script type="text/javascript" src="<?= $themUrl ?>/js/dobpicker.js"></script>
<script type="text/javascript" src="<?= $themUrl ?>/js/profile.js?v=<?php echo time();?>"></script>
<style>
body {
    background: #fff !important;
}
</style>
<div class="container-full breadcrumb">
    <div class="container">
        <div class="breadcrumb_detail" >
           <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
        </div>
    </div>
</div>

<div id ='mainProfile'>
    <div class="wrapper-profile profile-user-account">
        <div class="left-profile">
            <div class="box-profile-top">
                <div class="user-inf-top">
                    <img style="width: 40px;" src="<?php if($this->profileinfo['avatar'] == '') { ?>
					<?php echo '/mediacenter/media/images/1182/logo/326_1544169906_5305c0a29b2308e2.png'; ?> <?php } else { ?>
					<?php echo $this->profileinfo['avatar']; ?>	<?php } ?>" alt="" class="avatar" />	
					
					<a href="<?php echo Yii::app()->createUrl('profile/profile/userinfo')?>" title="<?php echo $this->profileinfo['name'];?>" class="shopname"><?php echo $this->profileinfo['name'];?></a>
                    <a href="<?php echo Yii::app()->createUrl('profile/profile/userinfo')?>" title="Chỉnh sửa tài khoản" class="edit-account">Chỉnh sửa tài khoản</a>
					</br>
					<p class="txt-userInfoVip">- Điểm Tích Lũy: <strong><?php echo ($this->profileinfo['zoda_granted']) ?> Điểm</strong></p>
					<p class="txt-userInfoVip">- Hạng thành viên: <strong>
					<?php if($this->profileinfo['zocoin'] != '') { ?> 
						<?php echo $this->profileinfo['zocoin'] ?>
					<?php } else { ?>
						<?php echo $this->profileinfo['rate'] ?>
					<?php } ?>
					</strong></p>
					<p class="txt-userInfoVip">- Mức ữu đãi:<strong>
					<?php if($this->profileinfo['zocoin'] != '') { ?> 
						<?php if($this->profileinfo['zocoin'] == 'Hội viên')  { ?>
							<?php echo '0%'; ?>
						<?php  } elseif($this->profileinfo['zocoin'] == 'Silver')  { ?>
							<?php echo '10%'; ?>
						<?php  } elseif($this->profileinfo['zocoin'] == 'Gold')  { ?>
							<?php echo '15%'; ?>
						<?php  } elseif($this->profileinfo['zocoin'] == 'Platinum')  { ?>
							<?php echo '20%'; ?>
						<?php  } elseif($this->profileinfo['zocoin'] == 'Diamond')  { ?>
							<?php echo '25%'; ?>
						<?php  } elseif($this->profileinfo['zocoin'] == 'Fan Cứng')  { ?>
							<?php echo '20%'; ?>
						<?php } else { ?>
							<?php echo $this->profileinfo['bonus'] ?>
						<?php } ?>						
					<?php } else { ?>
						<?php echo $this->profileinfo['bonus'] ?>
					<?php } ?></strong></p>
					<p class="txt-userInfoVip" style="display: none">Doanh Thu: <strong><?php echo number_format($this->profileinfo['revenue'],0,",","."); ?> VND</strong></p>
				</div>
				
                <div class="menu-quanly" onclick="showMenu()">
                <i class="fa fa-bars" style="font-size:24px"></i>
                </div>
                <div class="box-quanly">
                    <div class="ttl-box">Dành cho thành viên</div>
                    <ul class="action-list">
                        <li class="order"><a href="<?php echo Yii::app()->createUrl('profile/profile/order') ?>"  class="infoadvanced order" title="Ðơn hàng">Ðơn hàng <i>&nbsp;</i></a>
                        </li>
                        <li class="order"><a href="<?php echo Yii::app()->createUrl('profile/profile/new') ?>"  class="infoadvanced order" title="Ðơn hàng">Khuyến Mãi<i>&nbsp;</i></a>
                        </li>
                    </ul>
                    <div class="ttl-box">Quản lý tài khoản</div>
                    <ul class="action-list">
                        <li class="user-inf">
                            <a href="<?php echo Yii::app()->createUrl('profile/profile/userinfo')?>" class="userinfo menu_user_info" title="Thông tin cơ bản">
                                <i class="fa fa-user-o"></i>Chỉnh sửa tài khoản
                            </a>
                        </li>
                        <li class="user-inf">
                            
                            <a href="<?php echo Yii::app()->createUrl('profile/profile/infoadvanced')?>" class="infoadvanced menu_user_info" title="Thông tin nâng cao">
                                <i class="fa fa-info" aria-hidden="true"></i>Thông tin nâng cao
                            </a>
                        </li>
                        
                         <li class="user-inf">
                            
                            <a href="<?php echo Yii::app()->createUrl('profile/profile/changepassword') ?>" class="changepassword menu_user_info" title="Thay đổi mật khẩu">
                                <i class="fa fa-key" aria-hidden="true"></i>Thay đổi mật khẩu
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--right-profile-->
    
        <div class="right-profile">
        <?php  echo $content;?>
        </div>
    </div>
</div>
<div class="loading" style="display: none;" class="f-loading cnt"><?php echo $methodName;?></div>
<?php  $this->endContent(); ?>

