<?php
if (isset($data) && count($data)) {
    ?>

    <?php
    if ($level == 0) {
        ?>
        <div class="box tt">
            <?php if ($show_widget_title) { ?>
                <div class="title">
                    <div class="title-cont">
                        <h3><?php echo $widget_title; ?></h3>
                    </div>
                </div>
            <?php } ?>
            <div class="tt-cont">
            <?php } ?>
            <ul class="menu <?php if ($level == 0) echo 'menu-list'; ?>">
                <?php
                foreach ($data as $cat_id => $category) {
                    $c_link = $category['link'];
                    ?>
                    <li class="<?php echo ($category['children']) ? 'submenu' : ''; ?> <?php echo ($category['active']) ? 'active' : '' ?>" >
                        <a href="<?php echo $c_link; ?>" title="<?php echo $category['cat_name']; ?>"><?php echo $category['cat_name']; ?></a>
                        <?php
                        $this->render($this->view, array(
                            'data' => $category['children'],
                            'level' => $level + 1,
                        ));
                        ?>
                    </li>
                <?php } ?>
            </ul>        
            <?php if ($level == 0) { ?>
            </div>
        </div>
    <?php } ?>
<?php } ?>