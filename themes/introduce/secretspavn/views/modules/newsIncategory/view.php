
<div class="hot-product-index" style="background-image:url(themes/introduce/nhasachhatinh1/css/img/transfer-bg.png)">
   <div class="container">
      <div class="title-standard center">
         <h2><span>Dịch vụ</span></h2>
      </div>
      <div class="ctn-product-hot">
         <div class="owl-product-hot owl-carousel owl-theme" style="opacity: 1; display: block;">
            <div class="owl-wrapper-outer">
               <div class="owl-wrapper" style=" left: 0px; display: block;">
			     <?php foreach ($news as $ne) { ?>
					  <div class="owl-item" style="width: 390px; margin-left: 0px; margin-right: 0px;">
						 <div class="item-product-hot item-show">
							<div class="product-img-hot" style="height: 306px;">
							   <a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>" >
							    <img class="lazyOwl"  src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's500_500/' . $ne['image_name']; ?>" alt="<?php echo $ne['image_name']; ?>" style="display: inline;"/>
							   <span class="bg-hover-img"><i class="fa fa-link"></i></span>
							   </a>
							</div>
							<div class="product-title-hot">
							   <div class="box-product-ctn">
								  <h2>
									 <a href="<?php echo $ne['link']; ?>"><?php echo $ne['news_title']; ?></a>
								  </h2>
								  <a href="<?php echo $ne['link']; ?>" class="view-all">Xem chi tiết</a>
							   </div>
							</div>
						 </div>
					  </div>
				<?php } ?>
               </div>
            </div>
           
         </div>
      </div>
   </div>
</div>