
<?php if (isset($data) && count($data)) { ?>
    <?php if ($level == 0) { ?>
        <div class="box category">
            <?php if ($show_widget_title) { ?>
                <div class="title">
                    <h2>DANH MỤC XE CHO THUÊ</h2>
                </div>
            <?php } ?>
            <div class="box-cont">
            <?php } ?>
            <ul class="menu <?php echo ($level == 0) ? 'menu-list' : ''; ?>">
                <?php
                foreach ($data as $cat_id => $category) {
                    $c_link = $category['link'];
                    ?>
                    <li class="<?php echo (count($category['children']) > 0) ? 'submenu' : '' ?>">
                        <a title="<?php echo $category['cat_name']; ?>" href="<?php echo $c_link ?>"><?php echo $category['cat_name']; ?></a>
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

    <?php
} 