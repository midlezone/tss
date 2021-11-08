<?php
if (isset($data) && count($data)) {
    ?>
    <ul>
        <?php
        foreach ($data as $menu_id => $menu) {
            $m_link = $menu['menu_link'];
            ?>
            <li class='<?php echo ($menu['active']) ? 'active' : '' ?> <?php echo ($menu['items']) ? 'has-sub' : ''; ?>'>
                <a href='<?php echo $menu['menu_link'] ?>' title="<?php echo $menu['menu_title']; ?>"><?php echo $menu['menu_title']; ?></a>
                <?php
                $this->render($this->view, array(
                    'data' => $menu['items'],
                    'first' => false,
                ));
                ?>
            </li>
			
        <?php } ?>
			
		  <?php if (Yii::app()->user->isGuest) { ?>
			<li class="login22">
				<a href="<?php echo Yii::app()->createUrl('login/login/login'); ?>">
					<?php echo Yii::t('common', 'login'); ?>
				</a>
			</li>
		  
		<?php } else { ?>
			<li class="icon-register" id="accountInfor">
				<a class="userName" id="menuNameUser" class="" rel="nofollow" onclick="showMenuUser()">
					<i class="fa fa-user-circle-o" style="font-size:24px"></i>
					<span><?php echo Yii::app()->user->name;?></span>
				</a>
				<ul class="userInfor" id="menuUserSetting" style="display:none">
					<li>
						<a href="<?php echo Yii::app()->createUrl('profile/profile/userinfo'); ?>">
							<i class="fa fa-user-circle-o"></i>
							<span>Thông tin tải khoản </span>
						</a>
					</li>
					<li>
						<a href="<?php echo Yii::app()->createUrl('profile/profile/order'); ?>">
							<i class="fa fa-calendar-check-o"></i>
							<span>Theo dõi Tip Đã Mua</span>
						</a>
					</li>
				
					<li class="hasBorder_3vxk">
						<a href="<?php echo Yii::app()->createUrl('login/login/logout'); ?>">
							<i class="fa fa-sign-out"></i>
							<span><?php echo Yii::t('common', 'logout'); ?></span>
						</a>
					</li>
				</ul>
			</li>
		<?php } ?>
		 
    </ul>
<?php }
