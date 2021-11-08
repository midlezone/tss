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
            ?>
            <ul class="menu">
                <li class="hotline3">
                    <a href="tel:<?php echo $support['phone'] ?>" id="w3nlogin"><?php echo $support['phone'] ?></a>
                </li>
            </ul>
            <?php
        }
    }
    ?>
<?php } ?>
