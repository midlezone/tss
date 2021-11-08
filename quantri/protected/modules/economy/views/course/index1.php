<?php
/* @var $this NewsController */
/* @var $model News */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-active-form form').submit(function(){
	$('#product-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h4>
            Quản Lý Câu Hỏi
        </h4>

        <div class="widget-toolbar no-border">
           
            <a href="<?php echo Yii::app()->createUrl('economy/course/create'); ?>" class="btn btn-xs btn-primary" style="margin-right: 20px;">
                <i class="icon-plus"></i>
               Tạo Câu Hỏi
            </a>
            <a href="<?php echo Yii::app()->createUrl('economy/course/deleteall'); ?>" class="btn btn-xs btn-danger delAllinGrid" grid="product-grid">
                <i class="icon-remove"></i>
                <?php echo Yii::t('common', 'delete'); ?>
            </a>
        </div>
    </div>
    <div class="widget-body">
        <div class="widget-main">
            <div class="search-active-form" style="position: relative; margin-top: 10px;">
                <?php
//                $this->renderPartial('_search', array(
//                    'model' => $model,
//                ));
                ?>
                <div class="pageSizebox" style="position: absolute; right: 0px; top: 0px;">
                    <div class="pageSizealign">
                        <?php
                        $this->widget('common.extensions.PageSize.PageSize', array(
                            'mGridId' => 'product-grid', //Gridview id
                            'mPageSize' => Yii::app()->request->getParam(Yii::app()->params['pageSizeName']),
                            'mDefPageSize' => Yii::app()->params['defaultPageSize'],
                        ));
                        ?>
                    </div>
                </div>
            </div><!-- search-form -->
            <div class="clearfix" style="height: 30px;"></div>
            <?php
            Yii::import('common.extensions.LinkPager.LinkPager');
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'course-grid',
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
                    array(
                        'class' => 'CCheckBoxColumn',
                        'selectableRows' => 100,
                        'htmlOptions' => array('width' => 5,),
                    ),
					'name' => array(
                        'header' => 'Câu Hỏi',
                        'name' => 'name',
                        'type' => 'raw',
                    ),
					'alias' => array(
                        'header' => 'Đáp Án 1',
                        'name' => 'alias',
                    ),	
					
					'time_for_study' => array(
                        'header' => 'Đáp Án 2',
                        'name' => 'time_for_study',
                        'type' => 'raw',
                    ),	
					'school_schedule' => array(
                        'header' => 'Đáp Án 3',
                        'name' => 'school_schedule',
                        'type' => 'raw',
                    ),	
					'score4' => array(
                        'header' => 'Đáp Án 4',
                        'name' => 'score4',
                        'type' => 'raw',
                    ),	
					'sort_description' => array(
                        'header' => 'Kết Quả',
                        'name' => 'sort_description',
                        'type' => 'raw',
                    ),	
					
					
                    'status' => array(
                        'name' => 'status',
                        'value' => function($data) {
                            $status = ActiveRecord::statusArray();
                            return isset($status[$data->status]) ? $status[$data->status] : '';
                        }
                    ),
                    'created_time' => array(
                        'name' => 'created_time',
                        'value' => function($data) {
                            return ($data->created_time) ? date('d-m-Y', $data->created_time) : '';
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
                    'translate' => array(
                        'header' => Yii::t('common', 'translate'),
                        'type' => 'raw',
                        'visible' => ClaSite::showTranslateButton() ? true : false,
                        'htmlOptions' => array('class' => 'button-column'),
                        'value' => function($data) {
                    $this->widget('application.widgets.translate.translate', array('baseUrl' => '/economy/course/update', 'params' => array('id' => $data->id)));
                }
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>