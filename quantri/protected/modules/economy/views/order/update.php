<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->

        <div class="space-6">
        </div>

        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="widget-box transparent invoice-box">
                    <div class="widget-header widget-header-large">
                        <div class="col-xs-8">

                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'orders-form',
                                'enableAjaxValidation' => false,
                                'htmlOptions' => array('class' => 'form-inline'),
                            ));
                            ?>
                            <label><?php echo $model->getAttributeLabel('order_status');  ?> : </label>
                            <?php echo $form->dropDownList($model, 'order_status', Orders::getStatusArr()); ?>
                            <?php echo CHtml::submitButton(Yii::t('common', 'update'), array('class' => 'btn btn-sm btn-primary','style'=>'margin-left:20px;')); ?>
                            <?php $this->endWidget(); ?>
                        </div>
                        <div class="widget-toolbar no-border invoice-info">
                            <span class="invoice-info-label"><?php echo Yii::t('shoppingcart', 'invoice') ?>:</span>
                            <span class="red">#<?php echo $model->order_id; ?></span>

                            <br>
                            <span class="invoice-info-label"><?php echo Yii::t('common', 'date') ?>:</span>
                            <span class="blue"><?php echo date('m-d-Y H:i:s', $model->created_time); ?></span>
                        </div>

                        <div class="widget-toolbar hidden-480">
                            <a href="#">
                                <i class="icon-print"></i>
                            </a>
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main padding-24">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
                                            <b><?php echo Yii::t('shoppingcart', 'billing-text') ?></b>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <ul class="list-unstyled spaced">
                                            <li>
                                                <i class="icon-caret-right blue"></i>
                                                <?php echo $model['billing_name'] ?>
                                            </li>

                                            <li>
                                                <i class="icon-caret-right blue"></i>
                                                <?php echo $model['billing_address'] ?>
                                            </li>

                                            <li>
                                                <i class="icon-caret-right blue"></i>
                                                <?php
                                                $province = LibProvinces::getProvinceDetail($model['billing_city']);
                                                echo $province['name'];
                                                ?>
                                            </li>

                                            <li>
                                                <i class="icon-caret-right blue"></i>
                                                <b class="blue"><?php echo $model['billing_phone'] ?></b>
                                            </li>
                                            <li>
                                                <i class="icon-caret-right blue"></i>
                                                <?php echo $model['billing_email'] ?>
                                            </li>

                                            <li class="divider"></li>

                                            <li>
                                                <i class="icon-caret-right blue"></i>
                                                <b><?php echo Yii::t('shoppingcart', 'payment_method'); ?>: </b><?php echo $paymentmethod; ?>
                                            </li>
                                            <li>
                                                <i class="icon-caret-right blue"></i>
                                                <b><?php echo Yii::t('shoppingcart', 'transport_method'); ?>: </b><?php echo $transportmethod['name']; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- /span -->

                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
                                            <b><?php echo Yii::t('shoppingcart', 'shipping-text') ?></b>
                                        </div>
                                    </div>

                                    <div>
                                        <ul class="list-unstyled  spaced">
                                            <li>
                                                <i class="icon-caret-right green"></i>
                                                <?php echo $model['shipping_name'] ?>
                                            </li>

                                            <li>
                                                <i class="icon-caret-right green"></i>
                                                <?php echo $model['shipping_address'] ?>
                                            </li>
                                            <li>
                                                <i class="icon-caret-right green"></i>
                                                <?php
                                                $province = LibProvinces::getProvinceDetail($model['shipping_city']);
                                                echo $province['name'];
                                                ?>
                                            </li>
                                            <li>
                                                <i class="icon-caret-right green"></i>
                                                <b class="blue"><?php echo $model['shipping_phone'] ?></b>
                                            </li>

                                        </ul>
                                    </div>
                                </div><!-- /span -->
                            </div><!-- row -->

                            <div class="space"></div>

                            <div>
                                <?php $this->renderPartial('_products', array('products' => $products)); ?>
                            </div>

                            <div class="hr hr8 hr-double hr-dotted"></div>

                            <div class="row">
                                <div class="col-sm-5 pull-right">
                                    <h4 class="pull-right">
                                        <?php echo Yii::t('common', 'total') ?> :
                                        <span class="red"><?php echo Product::getPriceText(array('price' => $model['order_total'])); ?></span>
                                    </h4>
                                </div>
                            </div>

                            <div class="space-6"></div>
                            <?php if ($model['note']) { ?>
                                <div class="well">
                                    <?php echo $model['note'] ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div>