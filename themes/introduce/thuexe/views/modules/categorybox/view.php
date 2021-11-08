<?php
if (isset($data) && count($data)) {
    ?>
    <?php
    if ($level == 0) {
        ?>
        <div class="category_right">
            <?php if ($show_widget_title) { ?>
			<div class="sidebar-wrapper">
				<div class="custom-sidebar widget_nav_menu" id="nav_menu-3">
					 <div class="custom-sidebar-title-wrapper">
						<div class="gdl-sidebar-left-bar"></div>
						<div class="gdl-sidebar-left-bar"></div>
						<h3 class="custom-sidebar-title gdl-border-x bottom">Nhóm dịch vụ</h3>
						<div class="custom-sidebar-title-gimmick"></div><div class="clear">
						</div>
					</div>
				</div>
			</div>
            <?php } ?>
        <?php } ?>
		
		<ul id="menu-serivices" >
			<li id="menu-item-3556" class="bold menu-item menu-item-type-post_type menu-item-object-page menu-item-3556">
				<a href="http://cedvietnam.com/dich-vu-cong-nc,5028">Dịch vụ công</a>
			</li>
			<li id="menu-item-3558" class="bold menu-item menu-item-type-post_type menu-item-object-page menu-item-3558">
				<a href="http://cedvietnam.com/dich-vu-tu-van-phat-trien-doanh-nghiep-nd,8976">Tư vấn phát triển doanh nghiệp</a>
			</li>
			<li id="menu-item-3557" class="bold menu-item menu-item-type-post_type menu-item-object-page menu-item-3557">
				<a href="http://cedvietnam.com/ket-noi-offline-nd,8977"> Kết nối offline</a>
			</li>
		</ul>
        <?php if ($level == 0) { ?>
        </div>
    <?php } ?>
<?php } ?>