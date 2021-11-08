<div class="box-r">
    <div class="support-top">
        <?php
        if ($data && count($data)) {
            $i = 0;
            $flag = 1;
            $flag1 = 1;
            foreach ($data as $support) {
                $i++;
                if ($i > $limit)
                    break;
                if ($support['type'] == 'phone') {
                    if (!$flag) {
                        continue;
                    }
                    if ($phone && $phone != '') {
                        $phone .= '<span>-</span>' . '<a href="tel:' . $support['phone'] . '" title="' . $support['phone'] . '">' . $support['phone'] . '</a>';
                    } else {
                        $phone = '<a href="tel:' . $support['phone'] . '" title="' . $support['phone'] . '">' . $support['phone'] . '</a>';
                        $flag = FALSE;
                    }
                }
                if ($support['type'] == 'googleplus') {
                    if ($flag1) {
                        $email = $support['link'];
                        $flag1 = FALSE;
                    }
                }
            }
        }
        ?>
        <div class="hotline-top">
            <?php if ($phone) { ?>
                <a>Hotline</a>
                <?php echo $phone; ?>
            <?php } ?>
        </div>
        <div class="email-top">
            <?php echo 'Email: ' . $email; ?>
        </div> 
    </div>
</div>
