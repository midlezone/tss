    <div class="box-js-top">
		 <?php
    foreach ($cateinhome as $cat) {
        if (!isset($data[$cat['cat_id']]['products']) || !count($data[$cat['cat_id']]['products']))
            continue;
        ?>
		
		<div class="promotions_tours">
			 <h3 class="localHeadLine hasLine">
				 <a href="/tour-khuyen-mai">
				 <span class="doc_head_21">
				 <?php echo $cat['cat_name']; ?>
				 </span>
				 <span class="readMoreTours hidden-xs">XEM THÊM TOURS</span>
				 <span class="clearfix"></span>
				 </a>
			  </h3>
			  
		</div>
		<ul class="lstToursPromotion">     

			<?php $i = 0 ?>
				<?php foreach ($data[$cat['cat_id']]['products'] as $product) { ?>
						<?php if($product['name'] != reset($data[$cat['cat_id']]['products'])['name']): ?>
			<?php $i++ ?>
						<div class="full-length">
						<div class="product">						
									
							<!-- Effect-1 End -->    
							 <li class="col-xs-6 col-sm-6 col-md-3">
							  <div class="promotionItem positionIn port-1 effect-2" >
								 <div class="head_item">
									<a class="photo" href="<?php echo $product['link'] ?>" title="<?php echo $product['name']; ?>">
									<img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's500_500/' . $product['avatar_name'] ?>" alt="<?php echo $product['name']; ?>"  width="360" height="225"  
									alt="<?php echo $product['name']; ?>"></a> 
									<div class="tour_price"> Giá:<span class="price ">Liên Hệ </div>
								 </div>
								 <div class="body_item">
									<h3><a href="<?php echo $product['link'] ?>" 
									title="Du lịch Thái Lan Giá rẻ - Siêu khuyến mại (GOLDENTOUR): Bangkok - Pattaya"><?php echo $product['name'] ?></a></h3>
									<p class="day_night">Thời Gian: <?php echo $product['code'] ?></p>
									<p class="departure mt5">Khởi hành: Hà Tĩnh | <span class="transport">Phương tiện: 
								<span class="hint--top hint--rounded" data-hint="Máy bay">
									<i class="icn icon-plane text-blue"></i></span>
									<span class="hint--top hint--rounded" data-hint="Ô tô">
									<i class="icn icon-bus text-blue"></i>
								</span></span></p>
								 </div>
								 
								 <div class="text-desc">
										<h3><?php echo $product['name'] ?></h3>
										<div class="record-popup first-record">
										  <div class="product-1">Thời gian:</div>
										  <div class="product-2" id="thoigian55293"><?php echo $product['code'] ?></div>
										</div>
										<div class="record-popup">
										  <div class="product-1">Phương tiện:</div>
										  <div class="product-2">Ô tô </div>
										</div>
										<div class="record-popup last-record">
										  <div class="product-1">Khởi hành:</div>
										  <div class="product-2" id="khoihanh55293">Hà Tĩnh</div>
										</div>
										<div class="record-popup last-record">
										  <div class="product-1">Giá:</div>
										  <div class="product-2" id="khoihanh55293">Liên Hệ</div>
										</div>
										
										<a href="<?php echo $product['link'] ?>" class="btn1">Xem chi tiết</a>
										<a href="<?php echo $product['link'] ?>" class="btn2">Đặt Tour</a>

								 </div>
							  </div>
						   </li>
							
						</div>
						</div>
						
						  
			 <?php endif; ?>
			<?php } ?>
		</ul>
		
   <?php } ?>

        <!--end-js--> 
    </div>
