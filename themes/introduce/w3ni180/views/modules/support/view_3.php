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
            <div class="support-header">
                <div class="phone">
                    <i class="icon"></i>
                    <label>Hotline</label>
                    <a href="tel:<?php echo $support['phone'] ?>"><?php echo $support['phone'] ?></a>
                </div>
            </div>
        <?php
        }
    }
    ?>
<?php } ?>
