<?php if (isset($data) && count($data)) { ?>
    <?php
    foreach ($data as $menu_id => $menu) {
        $i++;
        $m_link = $menu['menu_link'];
        if ($i > $cols) {
            break;
        }
        ?>
        <div class="title-bt"><a href="<?php echo $m_link ?>" title="<?php echo $menu['menu_title'] ?>"><?php echo $menu['menu_title'] ?></a></div>
        <?php if ($menu['items']) { ?>
            <div class="site-map-cont">
                <ul>
                    <?php foreach ($menu['items'] as $sub_menu) { ?>
                        <li>
                            <a href="<?php echo $sub_menu['menu_link'] ?>" title="<?php echo $sub_menu['menu_title'] ?>">
                                <?php echo $sub_menu['menu_title'] ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
        <?php
    }
}
?>

