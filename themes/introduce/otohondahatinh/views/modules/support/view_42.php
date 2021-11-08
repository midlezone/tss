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
            <div class="contact-box clearfix">
                <div class="contact-box-item">
                    <a href="tel:<?php echo $support['phone'] ?>"><span class="tel"><?php echo $support['phone'] ?></span></a>
                </div>
            </div>
            <?php
        }
    }
    ?>
<?php } ?>