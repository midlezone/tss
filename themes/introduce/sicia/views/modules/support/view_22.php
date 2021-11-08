<div class="box-phone">
<?php
if ($data && count($data)) {
    ?>
    <?php
    $i = 0;
    foreach ($data as $support) {
        $i++;
        if ($i > $limit)
            break;
        if ($support['type'] == 'phone') {
            ?>
            <div class="phone">
                <div class="icon"><i class="icon-help"></i></div>
                <div class="text-phone">
                    <span class="label-hotline">Hotline : </span>
                    <span class="hot-line"><?php echo $support['phone'] ?></span></div>
            </div>
        <?php }
    } ?>
<?php } ?>
</div>