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
                <div class="text-phone"><span><a href="tel:<?php echo $support['phone'] ?>">Hotline : </span><span><?php echo $support['phone'] ?></span></a></div>
            </div>
        <?php }
    } ?>
<?php } ?>
