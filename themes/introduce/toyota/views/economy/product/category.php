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
					đại lý kia vinh</span>
					<div class="tour-addon">
					<span class="transport">Hỗ trợ 24/24 : <span style="color: red"> 0981.540.919 - 0938.808.225 </span></span>
					</div>
			
					<div class="tour-price">
						Giá: <span class="product-detail-price">
												<?php echo $product['price_text']; ?>
							</span>					
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