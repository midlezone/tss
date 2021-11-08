<div class="top-left">
    <?php
    if ($data && count($data)) {
        ?>
        <?php
        $i = 0;
        $flag = true;
        foreach ($data as $support) {
            $i++;
            if ($i > $limit)
                break;
            if ($support['type'] == 'phone') {
                ?>
                <?php if ($flag) { ?>
                    <div class="hotline1">
                        <a href="#" class="icon-phone">Hotline:</a>
                    <?php } ?>
                    <?php
                    if (!$flag) {
                        echo '<a> - </a>';
                    }
                    ?>
                    <a href="tel:<?php echo $support['phone'] ?>"><?php echo $support['phone'] ?></a>
                    <?php if (!$flag) { ?>
                    </div>
                    <?php
                }
                $flag = false;
            }
        }
        ?>
    <?php } ?>
</div>