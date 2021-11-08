<?php
//
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/colorbox/jquery.colorbox-min.js');
//
?>
 <?php
		$images = $model->getImages();
		$first = reset($images);
   ?>
  <img class="product-image" src="/themes/introduce/otohondahatinh/css/img/way.jpg" alt="Xe <?php echo $product['name'];  ?>" style="min-height: 400px;">

   <?php
      echo $product['product_sortdesc'];
    ?>
<div class="product-detail container" >
   
    <div class="product-detail-more">
        <?php if ($product['product_desc']) { ?>
            <div class="tab">
                
                <div class="tab-content">
                    <div id="home" class="tab-pane fade active">
                        <?php
                        echo $product['product_desc'];
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>