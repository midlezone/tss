<div class="album">

    <?php if ($show_widget_title) { ?>
        <div class="box-title">
            <h2>
                <a onclick="javascript:void(0)"><?php echo $widget_title ?></a>
            </h2>
        </div>
    <?php } ?>
    <div class="panel panel-default categorybox">
        <div class="panel-body">
            <ul>
                <?php
                if ($data && count($data)) {
                    ?>
                    <?php
                    $i = 0;
                    foreach ($data as $support) {
                        $i++;
                        if ($i > $limit) {
                            break;
                        }
                        if ($support['type'] == 'phone') {
                            $phones = explode('-', $support['phone']);
                            if (count($phones)) {
                                foreach ($phones as $phone) {
                                    Yii::app()->controller->renderPartial('//modules/support/type_' . $support['type'], array('data' => $phone));
                                }
                            }
                        } else {
                            Yii::app()->controller->renderPartial('//modules/support/type_' . $support['type'], array('data' => $support));
                        }
                    }
                    ?>
                <?php } ?>
            </ul>
        </div>
        <!--end-panel-body--> 
    </div>
</div>
