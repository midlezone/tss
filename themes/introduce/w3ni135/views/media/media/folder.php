<div class="folder download">
    <div id="leftCol">            
        <div class="panel panel-default categorybox">
            <div class="panel-heading">
                <h3>Category List</h3>
            </div>
            <div class="panel-body">
            <ul class="menu menu-list">
                <?php foreach($folders as $folder){ ?>
                    <li>
                        <a class="folder-link" href="<?php echo $folder['link'];?>" title="<?php echo $folder['folder_name']; ?>">
                            <?php echo $folder['folder_name']; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>        
            </div>
        </div>
    </div>
    <div class="main-download">
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
                    'display_name',
                    'size' => array(
                        'name' => 'size',
                        'value' => function($data) {
                    return Files::GetStringSizeFormat($data->size);
                }
                    ),
                    'extension',
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
</div>