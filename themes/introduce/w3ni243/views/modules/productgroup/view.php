<?php if (count($products)) { ?>
    <div class="box-js-top">
        <div class="main-list">          
			<div class="title-item-wrapper"><div class="title-item-gimmick left" style="width: 423px;"></div>
			<h2 class="title-item-header"><span><?php echo $widget_title ?></span></h2>
			<div class="title-item-gimmick right" style="width: 388px;margin-right:35px;"></div></div>
			
            <!--end-border-list--> 
        </div>
		<?php foreach ($products as $product) { ?>
			<div class="tour-item">
					<div class="full-length">
						<div class="product">						
							<ul>
										<li>
											<div class="port-1 effect-1">
												<div class="image-box">
													<img width="353" height="187" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's250_250/' . $product['avatar_name'] ?>" alt="<?php echo $product['name']; ?>">
												</div>
												<div class="text-desc">
													<h3><?php echo $product['name'] ?></h3>
													<a href="<?php echo $product['link'] ?>" class="btn">Xem chi tiết</a>
												</div>
											</div>
											
										</li>	
							</ul>       
							<!-- Effect-1 End -->       
							
						</div>
					</div>

					<h3 class="tour-title">
						<a href=""><?php echo $product['name'] ?></a>
					</h3>
					
					<div class="tour-addon">
						<!-- thoi gian tour -->
						<span class="duration icon-clock5">
						<?php echo $product['code'] ?></span>
						<!-- phuong tien van chuyen -->
						<span class="transport">Phương tiện: 
						<span class="hint--top hint--rounded" data-hint="Máy bay"><i class="icn icon-plane text-blue"></i></span><span class="hint--top hint--rounded" data-hint="Ô tô"><i class="icn icon-bus text-blue"></i></span></span>
					</div>
					<?php if ($product['group_id'] == '735' ): ?>
						<div class="khoi-hanh">
							<span class="khoi-hanh icon-calendar">
							Khởi hành: Hà Tĩnh							
							</span>
						</div>
					<?php endif; ?>
					<?php if ($product['group_id'] == '719' ): ?>
						<div class="khoi-hanh">
							<span class="khoi-hanh icon-calendar">
							Khởi hành: Hà Tĩnh Hoặc Vinh						
							</span>
						</div>
					<?php endif; ?>
					
					<div class="tour-price">
						Giá:<span class="price ">Liên Hệ</span>
					</div>
					<a href="<?php echo $product['link'] ?>" title="Xem chi tiết tour" class="btn btn-viewmore">Xem chi tiết</a>
			</div>
		<?php } ?>
        <!--end-js--> 
    </div>
<?php } ?>