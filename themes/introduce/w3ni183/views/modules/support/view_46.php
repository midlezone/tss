<?php if ($show_widget_title) { ?>
    <div class="box-title">
        <h2>
            <a onclick="javascript:void(0)"><?php echo $widget_title ?></a>
        </h2>
    </div>
<?php } ?>
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