	<div class="new_content1">

	<div class="col-md-6" style="height: 300px;">
	   <div class="boxTourGioChot">
		  <div class="box" id="jcarousel-last-out-tours">
		     <?php foreach ($products as $product) { ?>
			 
				 <div class="item" style="background-image:url(<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's500_500/' . $product['avatar_name'] ?>" alt="<?php echo $product['name'] ?>)">
					<figuation>
					   <div class="caption">
						  <h3 class="title"><?php echo $product['name']; ?></h3>
						  <div class="info"> <?php echo $product['code']; ?> &nbsp;|&nbsp; <strong>KH : </strong> Liên Hệ </div>
					   </div>
					   <div class="priceTours"> <span class="pricefrom"> <?php echo Yii::t('product', 'price'); ?>: Liên Hệ</span><span class="oldprice"></span> </div>
					</figuation>
					<a href="/du-xuan-dinh-dau-bac-kinh-thuong-hai-hang-chau-to-chau_cl423.html" title="Du xuân Đinh Dậu - Bắc Kinh - Thượng Hải - Hàng Châu - Tô Châu"></a> 
				 </div>
			<?php } ?>
		  </div>
		  <!--<div class="head"><span>Tour giờ chót</span></div>--> 
	   </div>
	   <script type="text/javascript"> if($('#jcarousel-last-out-tours').length>0 && $('.boxTourGioChot .item').size() > 1){	var $owl=$('#jcarousel-last-out-tours');	$owl.owlCarousel({	autoplay:true,	loop:true,	mouseDrag:false,	margin:0,	responsiveClass:true,	responsive:{	0:{items:1,loop:true, nav:true},	1200:{ items:1, loop:true,nav:true }	}	}); } </script> 
	</div>
</div>