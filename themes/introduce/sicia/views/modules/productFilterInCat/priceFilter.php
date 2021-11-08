<?php ?><div class="menu-lever2 trademark">
    <div class="panel panel-default categorybox">
        <div class="panel-heading">
            <h2><?php echo 'Khoảng giá'; ?></h2>
        </div>
        <div class="panel-body">
            <div style="margin: 5px 0 10px 0;">
                <div class="input-group">
                    <span class="input-group-addon" style="min-width: 60px;"><?php echo Yii::t('common', 'from'); ?></span>
                    <input type="text" class="form-control fi_pmin isnumber priceFormat" name="fi_pmin" value="<?php echo Yii::app()->request->getParam('fi_pmin') ?>" aria-describedby="basic-addon1" autocomplete="false" />
                </div>
                <div class="text-danger pull-right priceFormat-text" style="display: none"></div>
            </div>
            <div style="margin-bottom: 10px">
                <div class="input-group">
                    <span class="input-group-addon" style="min-width: 60px;"><?php echo Yii::t('common', 'to'); ?></span>
                    <input type="text" class="form-control fi_pmax isnumber priceFormat" name="fi_pmax" value="<?php echo Yii::app()->request->getParam('fi_pmax') ?>" aria-describedby="basic-addon1" autocomplete="false" />
                </div>
                <div class="text-danger pull-right priceFormat-text" style="display: none"></div>
            </div>
            <button style="margin-bottom: 5px;" type="submit" class="btn btn-sm btn-primary" onclick="var url = '<?php echo $formUrl; ?>';
                    url = addParamToUrl(url, 'fi_pmin', $(this).closest('.product-filter-box').find('.fi_pmin').val());
                    url = addParamToUrl(url, 'fi_pmax', $(this).closest('.product-filter-box').find('.fi_pmax').val());
                    window.location.href = url;
                    return false;">
                        <?php echo Yii::t('product', 'filter_by_price'); ?>
            </button>
        </div>
    </div>
</div>

