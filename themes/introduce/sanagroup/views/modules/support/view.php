<div class="box support">
    <?php if ($show_widget_title) { ?>
        <div class="title">
            <h2><?php echo $widget_title; ?></h2>
        </div>
    <?php } ?>
    <div class="box-cont">
        <div class="panel-body">
            <ul>
                <?php
                if ($data && count($data)) {
                    ?>
                    <?php
                    $i = 0;
                    foreach ($data as $support) {
                        $i++;
                        if ($i > $limit)
                            break;
                        Yii::app()->controller->renderPartial('//modules/support/type_' . $support['type'], array('data' => $support));
                    }
                    ?>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
