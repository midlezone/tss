<?php if (count($news)) { ?>
    <div class="product body-cont">
        <?php if ($show_widget_title) { ?>
			
            <div class="title">
                <h2><a href="<?php echo $cat_id; ?>"><?php echo $widget_title; ?></a></h2>
				 <?php if ($widget_title == 'THI CÔNG') { ?>
					<div class="view-all">
						<a href="<?php echo Yii::app()->createUrl('/thi-cong-nc,5002', array()) ?>">Xem tất cả</a>
					</div>
				 <?php } ?>
				  <?php if ($widget_title == 'CHO THUÊ') { ?>
					<div class="view-all">
						<a href="<?php echo Yii::app()->createUrl('/cho-thue-nc,5003', array()) ?>">Xem tất cả</a>
					</div>
				 <?php } ?>
				  <?php if ($widget_title == 'SẢN PHẨM') { ?>
					<div class="view-all">
						<a href="<?php echo Yii::app()->createUrl('/san-pham-nc,5012', array()) ?>">Xem tất cả</a>
					</div>
				 <?php } ?>
            </div>


            <!--            <div class="panel panel-default menu-horizontal">
                            <div class="panel-heading">
                                <h2><?php // echo $widget_title;              ?></h2>
                            </div>
                            <div class="panel-body">-->
        <?php } ?>
        <div class="product-cont">
            <div class="list grid">
                <?php foreach ($news as $new) { ?>
                    <div class="list-item">
                        <div class="list-content">
                            <div class="list-content-box">
                                <?php if ($new['image_path'] && $new['image_name']) { ?>
                                    <div class="list-content-img">
                                        <a href="<?php echo $new['link']; ?>" title="<?php echo $new['news_title']; ?>">
                                            <img src="<?php echo ClaHost::getImageHost() . $new['image_path'] . 's200_200/' . $new['image_name']; ?>" alt="<?php echo $new['news_title']; ?>" />
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="list-content-body">

                                    <div class="product-price-all clearfix">
                                        <div class="list-content-title">
                                            <h3>
                                                <a href="<?php echo $new['link'] ?>" title="<?php echo $new['news_title']; ?>">
                                                    <?php echo $new['news_title']; ?>
                                                </a>
                                            </h3>
                                        </div>
                                        <div class="product-description">
                                            <p>
                                                <?php echo $new['news_sortdesc']; ?>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>  
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>