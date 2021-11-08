<div class="mwidget">
    <div class="mwhead">
        <span class="mwtitle">
            <?php echo $data['widget_title']; ?>
            <?php if (isset($data['widget_id'])) echo '(' . $data['widget_id'] . (isset($data['widget_name']) ? ' - ' . $data['widget_name'] : '') . ')'; ?>
        </span>
        <a class="mwdropdown"></a>
        <div class="mwaction">
            <ul class="list-unstyled">
                <li>
                    <a class="mwidgetedit" href="<?php echo Yii::app()->createUrl('widget/widget/getformupdate', array('id' => $data['page_widget_id'])) ?>">Chỉnh sửa module</a>
                </li>
                <li>
                    <a class="mwiddelete" href="<?php echo Yii::app()->createUrl('widget/widget/delete', array('id' => $data['page_widget_id'])) ?>">Xóa module</a>
                </li>
                <li>
                    <a class="mwidmove" href="<?php echo Yii::app()->createUrl('widget/widget/move', array('id' => $data['page_widget_id'], 'wkey' => $data['key'], 'action' => 'up')) ?>">Di chuyển lên</a>
                </li>
                <li>
                    <a class="mwidmove" href="<?php echo Yii::app()->createUrl('widget/widget/move', array('id' => $data['page_widget_id'], 'wkey' => $data['key'], 'action' => 'down')) ?>">Di chuyển xuống</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="mwcontent">
        <div class="mwconbox">
            <?php echo $wcontent; ?>
        </div>
    </div>
</div>