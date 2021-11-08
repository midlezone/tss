<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-active-form form').submit(function(){
	$('#orders-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="widget-box">
    <div class="widget-header">
        <h4>
            <?php echo Yii::t('shoppingcart', 'order_manager'); ?>
        </h4>
        <div class="widget-toolbar no-border">
			<a href="<?php echo Yii::app()->createUrl('economy/order/create'); ?>" class="btn btn-xs btn-primary" style="margin-right: 20px;">
                <i class="icon-plus"></i>
                Thêm            </a>
				
            <a href="<?php echo Yii::app()->createUrl('economy/order/deleteall'); ?>" class="btn btn-xs btn-danger delAllinGrid" grid="orders-grid">
                <i class="icon-remove"></i>
                <?php echo Yii::t('common', 'delete'); ?>
            </a>
        </div>
    </div>
    <div class="widget-body">
        <div class="widget-main">
            <div class="search-active-form" style="position: relative; margin-top: 10px;">
                <?php
                $this->renderPartial('_search', array(
                    'model' => $model,
                ));
                ?>
                <div class="pageSizebox" style="position: absolute; right: 0px; top: 0px;">
                    <div class="pageSizealign">
                        <?php
                        $this->widget('common.extensions.PageSize.PageSize', array(
                            'mGridId' => 'orders-grid', //Gridview id
                            'mPageSize' => Yii::app()->request->getParam(Yii::app()->params['pageSizeName']),
                            'mDefPageSize' => Yii::app()->params['defaultPageSize'],
                        ));
                        ?>
                    </div>
                </div>
            </div><!-- search-form -->

            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'orders-grid',
                'dataProvider' => $model->search(),
                'itemsCssClass' => 'table table-bordered table-hover vertical-center',
                'filter' => null,
                'columns' => array(
                    array(
                        'class' => 'CCheckBoxColumn',
                        'selectableRows' => 100,
                        'htmlOptions' => array('width' => 5,),
                    ),
                    'order_id' => array(
                        'header' => '#',
                        'name' => 'order_id',
                        'value' => '"#".$data->order_id',
                    ),
                    'customer' => array(
                        'header' => Yii::t('shoppingcart', 'customer'),
                        'value' => '$data->billing_name',
                    ),
                    'created_time1' => array(
                        'name' => 'Thời Gian Mua Máy',
                        'value' => '$data->created_time1',
                    ),
                    'order_status' => array(
                        'name' => 'order_status',
                        'value' => '"Đã Mua"',
                    ),
                    'order_total' => array(
                        'name' => 'order_total',
                        'type' => 'raw',
                        'value' => 'HtmlFormat::money_format($data->product_price)." Đ"',
                    ),
                    array(
                        'class' => 'CButtonColumn',
                        'template' => '{update}  {delete} ',
                        'viewButtonLabel' => '',
                        'updateButtonOptions' => array('class' => 'icon-edit'),
                        'updateButtonImageUrl' => false,
                        'updateButtonLabel' => '',
                        'deleteButtonOptions' => array('class' => 'icon-trash'),
                        'deleteButtonImageUrl' => false,
                        'deleteButtonLabel' => '',
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>