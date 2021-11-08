<?php
foreach ($cateinhome as $cat) {
    if (!isset($data[$cat['cat_id']]['products']) || !count($data[$cat['cat_id']]['products']))
        continue;
    ?>
    <div class="featured panel panel-default">
             <div class="title">
                    <h2><?php echo $widget_title ?></h2>
                </div>
        <div class="product-cont">
            <div class="list22 grid22">
                <?php foreach ($data[$cat['cat_id']]['products'] as $product) { ?>
				
                    <div class="list-item2">
                        <div class="list-content clearfix">
                            <div class="list-content-box">
                                <div class="title3">
                                     <?php echo $product['name']; ?>
                                </div>
                                <div class="list-content-body">
                                    
									<a href="thanh-toan?step=s2&user=guest" title="Mua Tip" class="trans_tip2">Mua Tip</a> 
                                </div>
                            </div>
                        </div>
                    </div>
					
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>

