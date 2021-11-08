<div class="pro-search"> 
    <div class="search-result">
        <p class="textreport"><?php echo Yii::t('common', 'search_result', array('{results}' => $totalitem, '{keyword}' => '<span class="bold">' . $keyword . '</span>')); ?></p>
    </div>
	
    <?php if (count($data)) { ?>
	<div class="product-category"> 
        <div class="list grid">
            <?php
            foreach ($data as $pro) {
                $price = number_format(floatval($pro['price']));
                $price_market = number_format(floatval($pro['price_market']));
                ?>
				<div class="tour-list" id="id-tour-list"> 
					<div class="tour-item">					
						<a href="<?php echo $pro['link']; ?>" class="thumb" title="Tour Thái Lan 5N4D: Mimosa – Tặng Buffet 86 tầng, Massage Thái" style="background-image: url(<?php echo ClaHost::getImageHost() . $pro['avatar_path'] . 's180_180/' . $pro['avatar_name'] ?>);">
						<img width="720" height="487" src="<?php echo ClaHost::getImageHost() . $pro['avatar_path'] . 's180_180/' . $pro['avatar_name'] ?>" class="attachment-large size-large wp-post-image" alt="baiyok-sky-86-tang" srcset="<?php echo ClaHost::getImageHost() . $pro['avatar_path'] . 's180_180/' . $pro['avatar_name'] ?>" sizes="(max-width: 720px) 100vw, 720px"></a>
						
						<h3 class="tour-title">
						<a href="<?php echo $pro['link']; ?>">
							<?php echo $pro['name']; ?></a>	
						</h3>					
						<!-- Khởi hành từ -->
						<span class="tour-places icon-location-filled">
						<i class="icon-location5"></i>Khởi hành từ:					
						Hà Tĩnh</span>
						<div class="tour-addon">											
						<!-- thoi gian tour -->
						<span class="duration icon-clock5">
						<?php echo $pro['code']; ?>											</span>
						<!-- phuong tien van chuyen -->
						<span class="transport">Phương tiện: 
						<span class="hint--top hint--rounded" data-hint="Máy bay"><i class="icn icon-plane text-blue"></i></span><span class="hint--top hint--rounded" data-hint="Ô tô"><i class="icn icon-bus text-blue"></i></span>											</span>
						</div>
						
						<!-- /Tour add-on -->
						<p class="tour-desc"							

						</p>
						<div class="tour-price">
							Giá: Liên Hệ					
						</div>
						<a href="<?php echo $pro['link']; ?>" title="Xem chi tiết tour" class="btn btn-viewmore btn-viewmore-new">Xem chi tiết</a>

					</div> <!-- / Tour block -->
				</div>
				
              
				
            <?php } ?>
        </div>
	</div>
        <div class="wpager">
            <?php
            $this->widget('common.extensions.LinkPager.LinkPager', array(
                'itemCount' => $totalitem,
                'pageSize' => $limit,
                'header' => '',
                'selectedPageCssClass' => 'active',
            ));
            ?>
        </div>
    <?php } ?>
</div>