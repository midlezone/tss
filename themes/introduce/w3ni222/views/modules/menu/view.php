<?php
if (isset($data) && count($data)) {
    if ($first) {
        ?>
       
        <?php } ?>
        <ul class="<?php
        if ($first) {
            echo 'nav-home';
        }
        ?>">
                <?php
                foreach ($data as $menu_id => $menu) {
                    $m_link = $menu['menu_link'];
                    ?>
                <li class="<?php echo ($menu['items']) ? 'has-sub' : ''; ?> <?php echo ($menu['active']) ? 'active' : '' ?>">
                    <?php if ($first) { ?>
                        <a href='<?php echo $m_link; ?>' title="<?php echo $menu['menu_title']; ?>"><span><?php echo $menu['menu_title'] ?></span></a>
                    <?php } else { ?>
                        <a href='<?php echo $m_link; ?>' title="<?php echo $menu['menu_title']; ?>"><?php echo $menu['menu_title'] ?></a>
                    <?php } ?>
                    <?php
                    $this->render($this->view, array(
                        'data' => $menu['items'],
                        'first' => false,
                    ));
                    ?>
                </li>
            <?php } ?>
        </ul>
        <?php if ($first) { ?>

        <?php
    }
}    