<?php
if ($data && count($data)) {
    ?>
    <?php
    $i = 0;
    $first = true;
    foreach ($data as $support) {
        $i++;
        if ($i > $limit) {
            break;
        }
        if ($support['type'] == 'phone') {
            $phone[] = $support['phone'];
        }
    }
    if ($phone) {
        ?>
        <div class="hotline1">
            <span>Hotline:</span>
            <?php
            $string_phone = '';
            foreach ($phone as $p) {
                if($string_phone != '') {
                    $string_phone .= '<span style="margin-left:10px;">-</span>';
                }
                $string_phone .= '<a href="#">' . $p . '</a>';
            }
            echo $string_phone;
            ?>
        </div>
        <?php
    }
}
?>