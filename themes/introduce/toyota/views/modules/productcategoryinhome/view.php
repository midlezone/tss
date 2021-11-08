
<div class="box-js-top">
		
		<?php
			foreach ($cateinhome as $cat) {
				if (!isset($data[$cat['cat_id']]['products']) || !count($data[$cat['cat_id']]['products']))
				continue;
        ?>
		<div class="promotions_tours">
			 <h3 class="localHeadLine hasLine">
				 <a href="<?php echo $cat['link']; ?>">
				 <span class="doc_head_21">
				 <?php echo $cat['cat_name']; ?>
				 </span>
				 <span class="readMoreTours hidden-xs">XEM THÊM XE</span>
				 <span class="clearfix"></span>
				 </a>
			  </h3>
			  
		</div>
		<ul class="lstToursPromotion">     

			<?php $i = 0 ?>
			<?php foreach ($data[$cat['cat_id']]['products'] as $product) { ?>
			<?php $i++ ?>
						
						   <li class="col-xs-6 col-sm-6 col-md-3">
							  <div class="promotionItem index_<?php echo $i ?> positionIn">
								 <div class="head_item">
									<a class="photo" href="<?php echo $product['link'] ?>" title="<?php echo $product['name']; ?>">
									<img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's500_500/' . $product['avatar_name'] ?>" alt="<?php echo $product['name']; ?>" width="263" height="163" 
									alt="<?php echo $product['name']; ?>"></a> 
									<p class="discount discount-<?php echo $i ?>">hot</p>
									<div class="tour_price"> 
									 <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
										<p class="product-info-price-market">
											<label>Giá NY:</label>
											<span style="text-decoration: line-through;" class="product-detail-price-market">
												<?php echo $product['price_market_text']; ?>
											</span>
										</p>
									<?php } ?>
									Giá Bán:<span class="price ">  <?php if ($product['price'] && $product['price'] > 0) { ?>
											<span class="product-detail-price">
												<?php echo $product['price_text']; ?>
											</span>
								<?php } ?>
								 </div>
								 <div class="body_item">
									<h3><a href="<?php echo $product['link'] ?>" 
									title="Du lịch Thái Lan Giá rẻ - Siêu khuyến mại (GOLDENTOUR): Bangkok - Pattaya"><?php echo $product['name'] ?></a></h3>
									<p class="departure mt5">Giá : <?php echo $product['price_text']; ?>  </p>
								 </div>
							  </div>
						   </li>
			<?php } ?>
		</ul>
	<?php } ?>
        <!--end-js--> 
    </div>

