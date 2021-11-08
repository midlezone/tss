<?php
if (isset($data) && count($data)) {
    ?>
    <?php if ($first) { ?>
        <div class="col-sm-3">
        <?php } ?>
        <?php
        $i = 0;
        foreach ($data as $menu_id => $menu) {
            $i++;
            if ($i > $cols) {
                break;
            }
            ?>
            <h3>
                <a href="<?php echo $menu['menu_link'] ?>" title="<?php echo $menu['menu_title'] ?>"><?php echo $menu['menu_title'] ?></a>
            </h3>
        <?php if ($menu['items'] && count($menu['items']) > 0) { ?>
                <ul class="list-news-bottom">
                    <?php foreach ($menu['items'] as $c_menu) { ?>
                        <li>
                            <a href="<?php echo $c_menu['menu_link'] ?>" title="<?php echo $c_menu['menu_title'] ?>"><?php echo $c_menu['menu_title'] ?></a>
                        </li>
                <?php } ?>
                </ul>
        <?php } ?>
    <?php } ?>
    <?php if ($first) { ?>
        </div>
    <?php
    }
}
?>
