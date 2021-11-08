<?php if (count($products)) { ?>
    <div class="featured">
        <div class="panel panel-default categorybox">
            <?php if ($show_widget_title) { ?>
                <div class="title">
                    <h2><?php echo $widget_title ?></h2>
                </div>
            <?php } ?>
            <div class="panel-body">
                <div class="list list-small">
                    <?php foreach ($products as $product) { ?>
						<?php $date = strtotime(date('d-m-Y H:i:s')); ?>
						<?php if ($date < $product['publicdate']) { ?>						
							<div class="list-item  ">
								<div class="title333">
								<?php  $parent = Yii::app()->db->createCommand()
						->select('*')
						->from('manufacturers')
						->where('id ='.$product['manufacturer_id'])
						->queryAll(); ?>					
						
									<h3><?php echo $parent[0]['name']; ?> </h3>
								</div>
								<div class="list-content clearfix">
									<div class="list-content-box">
										<div class="list-content-img"> 
											<a href="#" title="<?php echo $product['name']; ?>"> 
												<img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's1000_1000/' . $product['avatar_name'] ?>" alt="<?php echo $product['name'] ?>">
											</a> 
										</div>
										<div class="list-content-body">                                        
											<a target="_blank" href="https://www.w88boleh.com/?affiliateid=49213" title="Đặt Cược" class="bet">Đặt Cược</a> 
											<a href="Api/CheckoutTip/?id=<?php echo $product['id']; ?>" title="Mua Tip" class="trans_tip">Mua Tip</a> 
											<a target="https://mig8love.com/home" href="" title="Xem Trực Tiếp" class="live">Xem Trực Tiếp</a>
										</div>
									</div>
								</div>
							</div>
							
						
						<?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
