<?php
if (isset($data) && count($data)) {
    ?>
    <ul class="menu  menu-align-right">
        <?php
        foreach ($data as $menu_id => $menu) {
            $m_link = $menu['menu_link'];
            ?>
            <li class="menu-item ">
                <a href="<?php echo $m_link ?>" <?php echo $menu['target']; ?> title="<?php echo $menu['description']; ?>"><?php echo $menu['menu_title']; ?></a>
            </li>
        <?php } ?>
    </ul>
<?php }