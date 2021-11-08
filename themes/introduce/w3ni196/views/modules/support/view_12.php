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
            <div class="box-phone clearfix">
                <div class="phone clearfix">
                    <a href="tel:<?php echo $support['phone'] ?>" class="icon-phone"></a>
                    <a href="tel:<?php echo $support['phone'] ?>"> Hotline: <?php echo $support['phone'] ?></span></a>
                </div>
            </div>
        <?php
        }
    }
    ?>
<?php } ?>