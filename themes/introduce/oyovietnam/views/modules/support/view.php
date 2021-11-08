<?php
if ($data && count($data)) {
    ?>
    <div class="social clearfix">
        <?php
        $i = 0;
        foreach ($data as $support) {
            $i++;
            if ($i > $limit)
                break;
            Yii::app()->controller->renderPartial('//modules/support/type_' . $support['type'], array('data' => $support));
        }
        ?>
    </div>
<?php } ?>
