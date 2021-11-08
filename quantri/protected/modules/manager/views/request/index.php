<?php
/* @var $this NewsController */
/* @var $model News */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-active-form form').submit(function(){
	$('#request-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h4>
            <?php echo Yii::t('request', 'request_manager'); ?>
        </h4>
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
                            'mGridId' => 'request-grid', //Gridview id
                            'mPageSize' => Yii::app()->request->getParam(Yii::app()->params['pageSizeName']),
                            'mDefPageSize' => Yii::app()->params['defaultPageSize'],
                        ));
                        ?>
                    </div>
                </div>
            </div><!-- search-form -->
            <?php
            Yii::import('common.extensions.LinkPager.LinkPager');
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'request-grid',
                'dataProvider' => $model->search(),
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
                    ),
                    //'news_id',
                    'name' => array(
                        'name' => 'name',
                        'type' => 'raw',
                    ),
                    'email' => array(
                        'name' => 'email',
                    ),
                    'phone' => array(
                        'name' => 'phone',
                    ),
                    'created_time' => array(
                        'name' => 'created_time',
                        'value' => 'date("d-m-Y",$data->created_time)',
                    ),
                    'status' => array(
                        'name' => 'status',
                        'type' => 'raw',
                        'value' => function($data) {
                    $status = Requests::getRequestStatus();
                    $st = isset($status[$data->status]) ? $status[$data->status] : '';
                    if ($data->status == Requests::STATUS_WAIT)
                        $st = '<b>' . $st . '</b>';
                    return $st;
                }
                    ),
                    'theme_id' => array(
                        'name' => 'theme',
                        'type' => 'raw',
                        'value' => function($data) {
                    if ($data->theme_id) {
                        $api = new ClaAPI();
                        $respon = $api->createUrl(array(
                            'basepath' => 'site/build/order',
                            'params' => json_encode(array('theme' => $data->theme_id)),
                            'absolute' => 'true',
                        ));
                        if ($respon) {
                            return '<a href="' . $respon['url'] . '" target="_blank">' . $data->theme_id . '</a>';
                        }
                    }
                    return '';
                }
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