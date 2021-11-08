<?php if (count($products)) { ?>
    <div class="product-category">
        <div class="list grid">
            <div class="tour-list" id="id-tour-list"> 
					 <?php foreach ($products as $product) { ?>

				<div class="tour-item">
				
					<a href="<?php echo $product['link']; ?>" class="thumb" title="Tour Thái Lan 5N4D: Mimosa – Tặng Buffet 86 tầng, Massage Thái" style="background-image: url(<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's180_180/' . $product['avatar_name'] ?>);">
					<img width="720" height="487" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's180_180/' . $product['avatar_name'] ?>" class="attachment-large size-large wp-post-image" alt="baiyok-sky-86-tang" srcset="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's180_180/' . $product['avatar_name'] ?>" sizes="(max-width: 720px) 100vw, 720px"></a>
					
					<h3 class="tour-title">
					<a href="<?php echo $product['link']; ?>">
						<?php echo $product['name']; ?></a>	
					</h3>					
					<!-- Khởi hành từ -->
					<span class="tour-places icon-location-filled">
					<i class="icon-location5"></i>Khởi hành từ:					
					Hà Tĩnh</span>
					<div class="tour-addon">											
					<!-- thoi gian tour -->
					<span class="duration icon-clock5">
					<?php echo $product['code']; ?>											</span>
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
					<a href="<?php echo $product['link']; ?>" title="Xem chi tiết tour" class="btn btn-viewmore btn-viewmore-new">Xem chi tiết</a>

				</div> <!-- / Tour block -->
					<?php } ?>
			</div>
		
        </div><!--end-list-gird-->
		
        <div class='product-page'>
            <?php
            $this->widget('common.extensions.LinkPager.LinkPager', array(
                'itemCount' => $totalitem,
                'pageSize' => $limit,
                'header' => '',
                'selectedPageCssClass' => 'active',
            ));
            ?>
        </div>
    </div>
<?php } ?>

<script type="text/javascript">

    function get_html_quickview(id, this_tag) {
        var wq = jQuery(this_tag).next().children('.modal-dialog');
        if (!wq.hasClass('has_quickview')) {
            jQuery.getJSON(
                '<?php echo Yii::app()->createUrl('/economy/product/quickview'); ?>',
                {id: id},
                function (data) {
                    wq.html(data.html);
                    wq.addClass('has_quickview');
                }
            );
        }
    }

</script>