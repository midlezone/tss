<?php
$check = false;
if (isset($data) && count($data)) {
    ?>
    <?php
    if ($level == 0) {
        $check = true;
        ?>
        <div class="left-menu-left-sp">
            <div class="list-left-sp">
                <?php echo $widget_title; ?>
            </div>
            <div class="boder-box-sp">
            <?php } ?>
            <ul class="list-menu-left-sp">
                <?php
                $level++;
                foreach ($data as $cat_id => $category) {
                    $c_link = $category['link'];
                    ?>
                    <li <?php echo ($category['active']) ? 'class="active"' : '' ?> >
                        <a href="<?php echo $c_link; ?>"><?php echo $category['cat_name']; ?></a>
                        <?php
                        $this->render($this->view, array(
                            'data' => $category['children'],
                            'level' => $level,
                        ));
                        ?>
                    </li>
                <?php } ?>
            </ul>        
        <?php } ?>
        <?php if ($check) { ?>
        </div>
    </div>
<?php } ?>