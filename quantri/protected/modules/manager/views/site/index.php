<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-active-form form').submit(function(){
	$('#site-settings-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="widget-box">
    <div class="widget-header">
        <h4>
            <?php echo Yii::t('site', 'site_manager'); ?>
        </h4>

        <div class="widget-toolbar no-border">
            <a href="<?php echo Yii::app()->createUrl('manager/site/create'); ?>" class="btn btn-xs btn-primary">
                <i class="icon-plus"></i>
                <?php echo Yii::t('site', 'site_create_new'); ?>
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
                            'mGridId' => 'site-settings-grid', //Gridview id
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
                'id' => 'site-settings-grid',
                'dataProvider' => $model->search(),
                'itemsCssClass' => 'table table-bordered table-hover vertical-center',
                'filter' => null,
                'pager' => array(
                    'class' => 'LinkPager',
                    'header' => '',
                    'nextPageLabel' => '&raquo;',
                    'prevPageLabel' => '&laquo;',
                    'lastPageLabel' => Yii::t('common', 'last_page'),
                    'firstPageLabel' => Yii::t('common', 'first_page'),
                ),
                'columns' => array(
                    'site_id',
                    'site_title',
                    'site_type' => array(
                        'name' => 'site_type',
                        'value' => function($data) {
                    $site_type = ClaSite::getSiteTypes();
                    return isset($site_type[$data['site_type']]) ? $site_type[$data['site_type']] : '';
                }
                    ),
                    'admin_email',
                    'created_time' => array(
                        'name' => 'created_time',
                        'type' => 'raw',
                        'value' => function($data) {
                    return date('d-m-Y', $data->created_time);
                }
                    ),
                    'domain_default' => array(
                        'name' => 'domain_default',
                        'type' => 'raw',
                        'value' => function($data) {
                    return '<a href="http://' . $data->domain_default . '" target="_blank">' . $data->domain_default . '</a>';
                }
                    ),
                    /*
                      'site_title',
                      'expiry_date',
                      'time_zone',
                      'site_descriptions',
                      'site_skin',
                      'admin_email',
                      'google_analytics',
                      'created_time',
                      'modified_time',
                      'contact',
                      'footercontent',
                      'domain_default',
                      'favicon',
                     */
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