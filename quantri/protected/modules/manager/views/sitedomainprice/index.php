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
            <?php echo Yii::t('site', 'site_domain_price'); ?>
        </h4>
    </div>
    <div class="widget-body">
        <div class="widget-main">
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
                    'id',
                    'domain',
                    'price',
                    'old_price',
                'created_time' => array(
                        'name' => 'created_time',
                        'type' => 'raw',
                        'value' => function($data) {
                            return date('d-m-Y', $data->created_time);
                        }
                ),
                'updated_time' => array(
                        'name' => 'updated_time',
                        'type' => 'raw',
                        'value' => function($data) {
                            return date('d-m-Y', $data->updated_time);
                        }
                ),
                    // array(
                    //     'class' => 'CButtonColumn',
                    //     'template' => '{update}  {delete} ',
                    //     'viewButtonLabel' => '',
                    //     'updateButtonOptions' => array('class' => 'icon-edit'),
                    //     'updateButtonImageUrl' => false,
                    //     'updateButtonLabel' => '',
                    //     'deleteButtonOptions' => array('class' => 'icon-trash'),
                    //     'deleteButtonImageUrl' => false,
                    //     'deleteButtonLabel' => '',
                    // ),
                ),
            ));
            ?>
        </div>
    </div>
</div>