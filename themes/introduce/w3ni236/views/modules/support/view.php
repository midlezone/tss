<?php
//die();
?>
<div class="support-in">
    <div class="panel panel-default categorybox">
        <?php if ($show_widget_title) { ?>
            <div class="panel-heading">
                <h2><?php echo $widget_title ?></h2>
            </div>
        <?php } ?>
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
