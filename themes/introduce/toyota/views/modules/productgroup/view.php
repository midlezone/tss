<?php if (count($products)) { ?>
    <div class="box-js-top">
		<div class="promotions_tours">
			<h2 class="doc_head_21"><a href="#" title="Tour giảm giá &amp; Khuyến mãi"><?php echo $widget_title ?></a></h2>
			<div class="intro"><p style="text-align: justify;">Các <strong>
			Tour du lịch giá rẻ</strong>, Tour Khuyến mãi, Tour Giảm giá của tour trong nước &amp; nước ngoài hot nhất tại DU LỊCH THÀNH SEN. Nhanh tay đặt tour không hết chỗ!</p></div>
		</div>
		<ul class="lstToursPromotion">     

			<?php $i = 0 ?>
			<?php foreach ($products as $key=>$product) { ?> 
			<?php $i++ ?>
						
						   <li class="col-xs-6 col-sm-6 col-md-3">
							  <div class="promotionItem index_<?php echo $i ?> positionIn">
								 <div class="head_item">
									<a class="photo" href="<?php echo $product['link'] ?>" title="<?php echo $product['name']; ?>">
									<img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's250_250/' . $product['avatar_name'] ?>" alt="<?php echo $product['name']; ?>" width="263" height="163" 
									alt="<?php echo $product['name']; ?>"></a> 
									<div class="tour_price"> Giá:<span class="price ">Liên Hệ <img align="absmiddle"
									src="https://www.dulichcongvu.com//isocms/templates/default/skin/images/icon_hot.gif"> </div>
									<p class="discount discount-<?php echo $i ?>">-5%</p>
								 </div>
								 <div class="body_item">
									<h3><a href="<?php echo $product['link'] ?>" 
									title="Du lịch Thái Lan Giá rẻ - Siêu khuyến mại (GOLDENTOUR): Bangkok - Pattaya"><?php echo $product['name'] ?></a></h3>
									<p class="day_night"><?php echo $product['code'] ?></p>
									<p class="departure mt5">Khởi hành: Hà Tĩnh</p>
									<a href="<?php echo $product['link'] ?>" title="Ngày khác" class="btnViewOrther">Ngày khác</a>
								 </div>
							  </div>
						   </li>
			<?php } ?>
		</ul>

        <!--end-js--> 
    </div>
<?php } ?>