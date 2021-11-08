<?php
/* @var $this NewsController */
/* @var $model News */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-active-form form').submit(function(){
	$('#news-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h4>
            <?php echo Yii::t('user', 'manager_user'); ?>
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
                            'mGridId' => 'news-grid', //Gridview id
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
                'id' => 'news-grid',
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
                        'htmlOptions' => array('width' => '12%')
                    ),
                    'phone',
                    'email',
                    'verified_email' => array(
                        'name' => 'Xác Thực Email',
                        'type' => 'raw',
                        'value' => function($data) {    
                            $verified_email = $data->verified_email;
                            if ($data->verified_email == 0) {
                                $verified_email = 'Chưa Xác Thực';
                            } else {
                                $verified_email = 'Đã Xác Thực';
                            }   
                            return $verified_email;
                        }
                    ),

                    // 'phone_introduce' => array(
                    //     'name' => 'Người Giới Thiệu',
                    //     'type' => 'raw',
                    //     'value' => function($data) {    
                    //         return $data->phone_introduce; 
                    //     }
                    // ),
                    'Điểm Tích Lũy' => array(
                        'name' => 'Điểm Tích Lũy',
                        'type' => 'raw',
                        'htmlOptions' => array('width' => '2%'),
                        'value' => function($data) {    
							return $data->zoda_granted;
                        }                   
                    ),
                   
                    'level' => array(
                        'name' => 'Hạng Thành Viên',
                        'type' => 'raw',
                        'value' => function($data) {    
                            $data_point = $data->zoda_granted;
							if ($data->zocoin != NULL) {
								return $data->zocoin;
							} else {
								if ($data_point < '500') {
									$data = 'Hội viên';
								}
								if ($data_point >= '500' &&  $data_point < '1000') {
									 $data = 'Silver';
								}
								if ( $data_point >= '1000' && $data_point < '2000') {

									$data = 'Gold';
								}
								if ($data_point >= '2000' &&  $data_point < '3000') {
									$data = 'Platinum';
								}
								if ($data_point > '3000') {
									$data = 'Diamond';
								}
								return $data;
							}
							
                        }
                    ),                                 
                    
                    array(
                        'class' => 'CButtonColumn',
                        'template' => '{update} {delete}',
                        'viewButtonLabel' => '',
                        'updateButtonOptions' => array('class' => 'icon-edit'),
                        'updateButtonImageUrl' => false,
                        'updateButtonLabel' => '',
                        'deleteButtonOptions' => array('class' => 'icon-trash'),
                        'deleteButtonImageUrl' => false,
                        'deleteButtonLabel' => '',

                        'buttons' => array (
                            'update' => array (
                                'url' => 'Yii::app()->createUrl("content/users/updateNormal", array("id"=>$data->user_id))',
                            ),
                        ),
                    ),
                    'translate' => array(
                        'header' => Yii::t('common', 'translate'),
                        'type' => 'raw',
                        'visible' => ClaSite::showTranslateButton() ? true : false,
                        'htmlOptions' => array('class' => 'button-column'),
                        'value' => function($data) {
                    $this->widget('application.widgets.translate.translate', array('baseUrl' => '/content/users/updateNormal', 'params' => array('id' => $data->user_id)));
                }
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>