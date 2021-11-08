<?php $this->renderPartial('script/attributescript');?>
<div class="product-attribute-tab">
<?php       
    $category = ProductCategories::model()->findByPk($model->product_category_id);
    $attribute_set_id = ($category)?$category->attribute_set_id:0;
    if($attribute_set_id){        
        echo EconomyAttributeHelper::helper()->attRenderHtmlAll($attribute_set_id,$productInfo);
        if (count($attributes_cf)){ ?>
            <div class="control-group form-group">
                <label class="col-sm-2 control-label no-padding-left">Đăng sản phẩm theo <?php echo Yii::t('product', 'product_attribute_color_size'); ?></label>
                <div class="controls col-sm-10">
                    <div id="attributes-cf" class="tab-pane">               
                        <?php $this->renderPartial('partial/subtabconfigurable', array('model' => $model, 'productInfo' => $productInfo, 'attributes_cf' => $attributes_cf));?>                
                    </div> 
                </div>
            </div>
        <?php }
    }else{        
        if($model->isNewRecord){
            echo "Vui lòng chọn danh mục sản phẩm";
        }else{
            echo "Sản phẩm không có thuộc tính! Vui lòng chọn bộ thuộc tính cho danh mục sản phẩm này";
        }
    }
?>
</div>