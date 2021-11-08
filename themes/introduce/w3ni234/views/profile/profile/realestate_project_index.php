<?php if ($user->type == ActiveRecord::TYPE_LEADER_USER) { ?>
    <?php
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
    <h3 class="username-title"><?php echo Yii::t('realestate', 'list_manager'); ?></h3>
    <div class="widget-body">
        <div class="pageSizealign">
            <?php
            $this->widget('common.extensions.PageSize.PageSize', array(
                'mGridId' => 'news-grid', //Gridview id
                'mPageSize' => Yii::app()->request->getParam(Yii::app()->params['pageSizeName']),
                'mDefPageSize' => Yii::app()->params['defaultPageSize'],
            ));
            ?>
            <a style="float: right;" class="btn btn-primary" href="<?php echo Yii::app()->createUrl('profile/profile/realestateProjectCreate') ?>"><?php echo Yii::t('common', 'create_new') ?></a>
        </div>
        <?php
        Yii::import('common.extensions.LinkPager.LinkPager');
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'news-grid',
            'dataProvider' => $model->searchMyProject(),
            'itemsCssClass' => 'table-realestate-index table table-bordered table-hover vertical-center',
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
                'created_time' => array(
                    'name' => 'created_time',
                    'value' => function($data) {
                        return date('d-m-Y H:i:s', $data->created_time);
                    }
                ),
                'status' => array(
                    'name' => 'status',
                    'value' => function($data) {
                        $status = ActiveRecord::statusArray();
                        return isset($status[$data->status]) ? $status[$data->status] : '';
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
                    'buttons' => array(
                        'update' => array(
                            'url' => 'Yii::app()->createUrl("profile/profile/realestateProjectUpdate", array("rp_id"=>$data->id))',
                        ),
                        'delete' => array(
                            'url' => 'Yii::app()->createUrl("profile/profile/realestateProjectDelete", array("rp_id"=>$data->id))',
                        ),
                    ),
                ),
            ),
        ));
        ?>
    </div>
<?php } else { ?>
    <h3 class="username-title"><?php echo Yii::t('realestate', 'list_manager'); ?></h3>
    <div class="widget-body">
        <p><?php echo Yii::t('common', 'forbidden'); ?></p>
    </div>
<?php } ?>