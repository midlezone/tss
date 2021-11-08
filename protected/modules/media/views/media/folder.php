<div class="folder download">
    <div class="row listfile">
		
        <?php foreach ($folders as $folder) { ?>
            <div class="col-xs-3">
                <a class="folder-link" href="<?php echo $folder['link']; ?>" title="<?php echo $folder['folder_name']; ?>">
                    <?php echo $folder['folder_name']; ?>
                </a>
            </div>
        <?php } ?>
    </div>
    <?php
	
    Yii::import('common.extensions.LinkPager.LinkPager');
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'folder-grid',
        'itemsCssClass' => 'table table-bordered table-hover',
        'summaryText' => '',
        'dataProvider' => $dataprovider,
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
			'display_name' => array(
                'name' => 'Số Hiệu Văn bản',
                'value' => function($data) {
					return $data->display_name;
				}
            ),
            'publicdate' => array(
                'name' => 'Ngày Ban Hành',
                'type' => 'raw',
                'value' => function($data) {
					return date('m-d-Y', $data->publicdate);
				}
            ),
			'description' => array(
                'name' => 'Trích Yếu',
                'value' => function($data) {
					return $data->description;
				}
            ),
            'download' => array(
                'header' => Yii::t('common', 'download'),
                'type' => 'raw',
                'value' => function($data) {
            return '<a href="' . Yii::app()->createUrl('media/media/downloadfile', array('id' => $data->id)) . '">' . Yii::t('common', 'download') . '</a>';
        }
            )
        ),
    ));
    ?>
</div>