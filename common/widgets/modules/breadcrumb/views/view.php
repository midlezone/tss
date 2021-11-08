<?php
$cdata = count($data);
if ($data && $cdata) {
    ?>
    <ul class="breadcrumb">
        <?php
        foreach ($data as $name => $crumb) {
            ?>
            <li><a href="<?php echo $crumb ?>" title="<?php echo $name ?>"><?php echo $name; ?></a></li>
        <?php } ?>
    </ul>
<?php } ?>