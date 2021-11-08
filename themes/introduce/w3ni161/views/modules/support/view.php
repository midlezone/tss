<?php
if ($data && count($data)) {
    ?>
    <div class="album">
        <div class="panel panel-default categorybox">
            <?php if ($show_widget_title) { ?>
            <div class="panel-heading">
                <h3><?php echo $widget_title; ?></h3>
            </div>
            <?php } ?>
            <div class="panel-body">
                <ul>
                    <?php
                    $i = 0;
                    foreach ($data as $support) {
                        $i++;
                        if ($i > $limit)
                            break;
                        Yii::app()->controller->renderPartial('//modules/support/type_' . $support['type'], array('data' => $support));
                    }
                    ?>
                </ul>
            </div>
            <!--end-panel-body--> 
        </div>
    </div>
<?php } ?>
