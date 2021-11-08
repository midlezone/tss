<?php
$cdata = count($data);
if ($data && $cdata) {
    ?>
    <ul class="title-main-sp-title">
        <?php
        $i = 0;
        foreach ($data as $name => $crumb) {
            $i++;
            ?>
            <?php if ($i != $cdata) { ?>
                <li class="sp-space-title-sp"><a href="<?php echo $crumb ?>"><?php echo $name; ?></a></li>
            <?php } else { ?>
                <li class="active"><a href="<?php echo $crumb ?>"><?php echo $name; ?></a></li>
                <?php } ?>
            <?php } ?>
    </ul>
<?php } ?>