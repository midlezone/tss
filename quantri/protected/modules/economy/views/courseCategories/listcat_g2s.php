<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#news-categories-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});

jQuery(document).on('change','.updateorder',function(){
var url = jQuery(this).attr('rel');
var or  = jQuery(this).val();
   jQuery.ajax({
        type: 'POST',
        url: url,
        data: {or: or},
        success: function(){
            $.fn.yiiGridView.update('news-categories-grid');
        }
   }); 
});

");
?>

<div class="widget-box">
    <div class="widget-header">
        <h4>
            <?php echo Yii::t('course', 'Danh Sách Đại Lý'); ?>
        </h4>

        <div class="widget-toolbar no-border">
            <a href="<?php echo Yii::app()->createUrl('economy/courseCategories/create', array('id' => ClaCategory::CATEGORY_ROOT)); ?>" class="btn btn-xs btn-primary" style="margin-right: 20px;">
                <i class="icon-plus"></i>
                <?php echo Yii::t('category', 'Thêm Mới Đại Lý'); ?>
            </a>
            <a href="<?php echo Yii::app()->createUrl('economy/courseCategories/delallcat'); ?>" class="btn btn-xs btn-danger delAllinGrid" grid="news-categories-grid">
                <i class="icon-remove"></i>
                <?php echo Yii::t('common', 'delete'); ?>
            </a>
        </div>
    </div>
    <div class="widget-body">
        <div class="widget-main">

            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'news-categories-grid',
                'dataProvider' => $model->search(),
                'itemsCssClass' => 'table table-bordered table-hover vertical-center',
                'summaryText' => false,
                'filter' => null,
                'enableSorting' => false,
                'columns' => array(
                    'number' => array(
                        'header' => '',
                        'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + $row + 1',
                        'htmlOptions' => array('style' => 'width: 50px; text-align: center;')
                    ),
                    array(
                        'class' => 'CCheckBoxColumn',
                        'value' => '$data["cat_id"]',
                        'selectableRows' => 150,
                        'htmlOptions' => array('width' => 5,),
                    ),
                    'cat_name' => array(
                        'header' => Yii::t("category", "Tên Đại Lý"),
                        'name' => 'cat_name',
                        'type' => 'raw',
                    ),
					'link' => array(
                        'header' => 'URL Đại Lý',
                        'name' => 'link',
                        'type' => 'raw',
                    ),
					'rose_ctv' => array(
                        'header' => 'Hoa Hồng Cộng Tác Viên',
                        'name' => 'rose_ctv',
                        'type' => 'raw',
                    ),
					'rose_dn' => array(
                        'header' => 'Hoa Hồng Doanh Nghiệp',
                        'name' => 'rose_dn',
                        'type' => 'raw',
                    ),
					'rose_web' => array(
                        'header' => 'Hoa Hồng Web',
                        'name' => 'rose_web',
                        'type' => 'raw',
                    ),
					'rose_cty' => array(
                        'header' => 'Hoa Hồng Tổng Doanh Số Cty',
                        'name' => 'rose_cty',
                        'type' => 'raw',
                    ),
                    'ctv' => array(
                        'header' => 'Số Cộng Tác Viên',
                        'name' => 'ctv',
                        'type' => 'raw',
                    ),
               
                    array(
                        'class' => 'CButtonColumn',
                        'template' => '{_addnew} {update} {delete} ',
                        'buttons' => array(
                            '_addnew' => array(
                                'label' => '',
                                'url' => 'Yii::app()->createUrl("economy/courseCategories/create", array("id" => $data["cat_id"]))',
                                'options' => array('class' => 'icon-file-text', 'title' => Yii::t('product', 'product_create')),
                            ),
                            'update' => array(
                                'label' => '',
                                'imageUrl' => false,
                                'url' => 'Yii::app()->createUrl("economy/courseCategories/update", array("id" => $data["cat_order"]))',
                                'options' => array('class' => 'icon-edit', 'title' => Yii::t('common', 'update')),
                            ),
                            'delete' => array(
                                'label' => '',
                                'imageUrl' => false,
                                'url' => 'Yii::app()->createUrl("economy/courseCategories/delete", array("id" => $data["cat_id"]))',
                                'options' => array('class' => 'icon-trash', 'title' => Yii::t('common', 'delete')),
                            ),
                        ),
                        'htmlOptions' => array(
                            'style' => 'width: 150px;',
                            'class' => 'button-column',
                        ),
                    ),
                    'translate' => array(
                        'header' => Yii::t('common', 'translate'),
                        'type' => 'raw',
                        'visible' => ClaSite::showTranslateButton() ? true : false,
                        'htmlOptions' => array('class' => 'button-column'),
                        'value' => function($data) {
                    $this->widget('application.widgets.translate.translate', array('baseUrl' => '/economy/courseCategories/update', 'params' => array('id' => $data['cat_id'])));
                }
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>