<?php if ($model->isNewRecord) { ?>
<a id="addProduct" href="javascript:void(0);" class="btn btn-sm btn-light" onclick="alert('<?php echo Yii::t('product','product_group_addproduct_disable_help'); ?>');">
        <?php echo Yii::t('product', 'product_group_addproduct'); ?>
    </a>
<?php } else { ?>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/colorbox/style3/colorbox.css"></link>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/colorbox/jquery.colorbox-min.js"></script>
    <a id="addProduct" href="<?php echo Yii::app()->createUrl('economy/productgroups/addproduct', array('gid' => $model->group_id)) ?>" class="btn btn-sm btn-primary">
        <?php echo Yii::t('product', 'product_group_addproduct'); ?>
    </a>
    <?php
    Yii::import('common.extensions.LinkPager.LinkPager');
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'product-groups-grid',
        'dataProvider' => $model->SearchProducts(),
        'itemsCssClass' => 'table table-bordered table-hover vertical-center',
        'filter' => null,
        'enableSorting' => false,
        'pager' => array(
            'class' => 'LinkPager',
            'header' => '',
            'nextPageLabel' => '&raquo;',
            'prevPageLabel' => '&laquo;',
            'lastPageLabel' => Yii::t('common', 'last_page'),
            'firstPageLabel' => Yii::t('common', 'first_page'),
        ),
        'columns' => array(
            'number' => array(
                'header' => '',
                'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + $row + 1',
                'htmlOptions' => array('width' => '30px',),
            ),
            'name' => array(
                'header' => Yii::t('product', 'product_name'),
                'value' => '$data->product["name"]',
            ),
            array(
                'class' => 'CButtonColumn',
                'template' => '{delete} ',
                'viewButtonLabel' => '',
                'updateButtonOptions' => array('class' => 'icon-edit'),
                'updateButtonImageUrl' => false,
                'updateButtonLabel' => '',
                'deleteButtonOptions' => array('class' => 'icon-trash'),
                'deleteButtonImageUrl' => false,
                'deleteButtonLabel' => '',
                'deleteButtonUrl' => 'Yii::app()->createUrl("/economy/productgroups/deleteproduct",array("id"=>$data["id"]))',
            ),
        ),
    ));
    ?>
    <script>
        jQuery(document).ready(function() {
            $("#addProduct").colorbox({width: "80%", maxHeight: '100%', overlayClose: false});
            <?php if(Yii::app()->request->getParam('create')){ ?>
                    $("#addProduct").trigger('click');
            <?php } ?>
        });
    </script>
<?php } ?>