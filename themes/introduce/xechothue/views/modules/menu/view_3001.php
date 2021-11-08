<?php
if (isset($data) && count($data)) {
    ?>
    <ul>
        <?php
        foreach ($data as $menu_id => $menu) {
            $m_link = $menu['menu_link'];
            ?>
            <li class='<?php echo ($menu['active']) ? 'active' : '' ?> <?php echo ($menu['items']) ? 'has-sub' : ''; ?>'>
                <a href='<?php echo $menu['menu_link'] ?>' title="<?php echo $menu['menu_title']; ?>"><?php echo $menu['menu_title']; ?></a>
                <?php
                $this->render($this->view, array(
                    'data' => $menu['items'],
                    'first' => false,
                ));
                ?>
            </li>
        <?php } ?>
    </ul>
<?php }
