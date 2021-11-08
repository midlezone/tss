<?php
if ($data && count($data)) {
    ?>
    <?php
    $i = 0;
    foreach ($data as $support) {
        $i++;
        if ($i > $limit)
            break;
        ?>
        <div class="box-phone">
            <div class="phone">
                <div class="icon"></div>
                <p> Hotline: <a href="tel:<?php echo $support['phone'] ?>"  style="color:red"> <?php echo $support['phone'] ?></a></p>
            </div>
        </div>
    <?php } ?>
<?php } ?>

