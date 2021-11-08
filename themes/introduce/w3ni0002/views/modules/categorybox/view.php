<?php
$check = false;
if (isset($data) && count($data)) {
    ?>
    <?php
    if ($level == 0) {
        $check = true;
        ?>
        <div class="box-left">
            <div class="head-box-left">
                <p class="menu-left">
                    <?php echo $widget_title; ?>
                </p>
            <?php } ?>
            <?php
            $level++;
            foreach ($data as $cat_id => $category) {
                $c_link = $category['link'];
                ?>
                <a <?php echo ($category['active']) ? 'class="active"' : '' ?> href="<?php echo $c_link; ?>">
                    <i class="dien-nuoc"></i>
                    <?php echo $category['cat_name']; ?>
                    <?php
                    $this->render($this->view, array(
                        'data' => $category['children'],
                        'level' => $level,
                    ));
                    ?>
                </a>
            <?php } ?>     
        <?php } ?>
        <?php if ($check) { ?>
        </div>
    </div>
<?php } ?>