<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'name', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>
</div>
<?php if (!$model->isNewRecord) { ?>
    <div class="form-group no-margin-left">
        <?php echo $form->labelEx($model, 'alias', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
        <div class="controls col-sm-10">
            <?php echo $form->textField($model, 'alias', array('class' => 'span10 col-sm-12')); ?>
            <?php echo $form->error($model, 'alias'); ?>
        </div>
    </div>
<?php } ?>

<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Imei', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'code', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'code'); ?>
    </div>
</div>
<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'product_category_id', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <div class="input-group">
            <?php echo $form->dropDownList($model, 'product_category_id', $option, array('class' => 'form-control')); ?>
            <div class="input-group-btn" style="padding-left: 10px;">  
                <a href="<?php echo Yii::app()->createUrl('economy/productcategory/addcat', array('pa' => ClaCategory::CATEGORY_ROOT) + $_GET) ?>" id="addCate" class="btn btn-primary btn-sm" style="line-height: 14px;">
                    <?php echo Yii::t('category', 'category_add'); ?>
                </a>
            </div>
        </div>
        <?php echo $form->error($model, 'product_category_id'); ?>
    </div>
</div>
<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'manufacturer_id', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->dropDownList($model, 'manufacturer_id', array('' => Yii::t('product', 'manufacturer_choice')) + Manufacturer::getAllManufacturerArr(), array('class' => 'span12 col-sm-12')); ?>
    </div>
</div>
<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Giá Màu Vàng', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'price_gold', array('class' => 'numberFormat span2 col-sm-2')); ?> 
		<?php echo $form->error($model, 'price_gold', array(), true, false); ?>		
    </div>
</div>
<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Giá Màu Xám Đen', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'price_black', array('class' => 'numberFormat span2 col-sm-2')); ?>
        <?php echo $form->error($model, 'price_black', array(), true, false); ?>
    </div>
</div>

<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Giá Màu Hồng', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'price_throat', array('class' => 'numberFormat span2 col-sm-2')); ?>
        <?php echo $form->error($model, 'price_throat', array(), true, false); ?>
    </div>
</div>

<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Giá Màu Bạc', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'price_silver', array('class' => 'numberFormat span2 col-sm-2')); ?>
        <?php echo $form->error($model, 'price_silver', array(), true, false); ?>
    </div>
</div>

<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Giá Màu Đỏ', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'price_red', array('class' => 'numberFormat span2 col-sm-2')); ?>
    </div>
</div>

<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Giá Màu Đen Bóng', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'price_jetblack', array('class' => 'numberFormat span2 col-sm-2')); ?>
    </div>
</div>



<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'include_vat', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">                            
        <?php echo $form->checkBox($model, 'include_vat'); ?>
        <span class="lbl" style="padding:0px 5px 4px 5px; color: #999; font-size: 12px; font-style: italic;"><?php echo Yii::t('product', 'product_include_vat_help') ?></span>
        <?php echo $form->error($model, 'include_vat'); ?>
    </div>
</div>
<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'isnew', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">                            
        <?php echo $form->checkBox($model, 'isnew'); ?>
        <?php echo $form->error($model, 'isnew'); ?>
    </div>
</div>
<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'ishot', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">                            
        <?php echo $form->checkBox($model, 'ishot'); ?>
        <?php echo $form->error($model, 'ishot'); ?>
    </div>
</div>
<!--<div class="form-group no-margin-left">
<?php //echo $form->label($model, 'currency', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
<?php //echo $form->dropDownList($model, 'currency',Product::$_dataCurrency, array('class' => 'span12 col-sm-2')); ?>
<?php //echo $form->error($model, 'currency'); ?>
    </div>
</div>-->
<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'quantity', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'quantity', array('class' => 'span12 col-sm-12', 'placeholder' => Yii::t('product', 'product_quantity_placeholder'))); ?>
        <?php echo $form->error($model, 'quantity'); ?>
    </div>
</div>

<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->dropDownList($model, 'status', ActiveRecord::statusArray(), array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>
</div>
<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'state', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->checkBox($model, 'state'); ?>
        <span class="lbl" style="padding:0px 5px 4px 5px; color: #999; font-size: 12px; font-style: italic;"><?php echo Yii::t('product', 'product_state_help') ?></span>
        <?php echo $form->error($model, 'state'); ?>
    </div>
</div>
<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'position', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'position', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'position'); ?>
    </div>
</div>

<div class="form-group no-margin-left">
    <?php echo $form->labelEx($model, 'Vị trí', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'location', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'location'); ?>
    </div>
</div>



<div class="form-group no-margin-left">
    <?php echo $form->labelEx($productInfo, 'product_sortdesc', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textArea($productInfo, 'product_sortdesc', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($productInfo, 'product_sortdesc'); ?>
    </div>
</div>
<div class="form-group no-margin-left">
    <?php echo $form->labelEx($productInfo, 'product_desc', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textArea($productInfo, 'product_desc', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($productInfo, 'product_desc'); ?>
    </div>
</div>