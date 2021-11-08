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
                <p> Hotline: <span style="color:red"> <?php echo $support['phone'] ?></span></p>
            </div>
        </div>
    <?php } ?>
<?php } ?>

