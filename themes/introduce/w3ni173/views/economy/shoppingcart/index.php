<?php
$js = 'function updateQuantity(key, quantity) { if(quantity==0) {$(this).val(0);} document.location = "' . $this->createUrl('/economy/shoppingcart/update') . '?key=" + key + "&qty=" + quantity; }';
Yii::app()->clientScript->registerScript('updateQuantity', $js, CClientScript::POS_END);
?>
<div class="col-md-12" style="margin-bottom: 20px;">
    <div class="col-md-4" style="padding: 0px;">
        <?php
        $this->renderPartial('choose_food', array(
            'shoppingCart' => $shoppingCart,
        ));
        ?>
    </div>
    <div class="sc shoppingcart col-md-8" style="padding-right: 0px;">

        <div class="span12">
            <h2 class="sc-title"><?php echo Yii::t('shoppingcart', 'shoppingcart'); ?></h2>
            <div id="wrapper-pack">
                <?php 
                if ($shoppingCart->getProducts()) { 
                    $this->renderPartial('pack', array(
                        'shoppingCart' => $shoppingCart,
                    ));
                    } else { ?>
                    <p class="text-warning">
                        <?php echo Yii::t('shoppingcart', 'havanoproduct'); ?>
                    </p>
                <?php } ?>
            </div>
            
            <div class="row">
                <div class="col-xs-6">
                </div>		  
                <div class="col-xs-6 wrapper_btn_buy">
                    <?php if ($shoppingCart->getProducts()) { ?>
                        <a class="btn btn-sm btn-primary pull-right" href="<?php echo $this->createUrl('/economy/shoppingcart/checkout'); ?>"><?php echo Yii::t('shoppingcart', 'checkout'); ?></a>
                    <?php } ?>
                </div>
            </div>
            
        </div>
    </div>
</div>
