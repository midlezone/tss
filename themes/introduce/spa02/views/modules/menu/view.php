<?php if (isset($data) && count($data)) { ?>
    <ul>
        <?php
        foreach ($data as $menu_id => $menu) {
            
            $m_link = $menu['menu_link'];
            ?>
            <li class="<?php echo ($menu['items']) ? 'has-sub' : ''; ?> <?php echo ($menu['active']) ? 'active' : '' ?>">
                <a href="<?php echo $m_link; ?>" <?php echo $menu['target']; ?> title="<?php echo $menu['description']; ?>"><?php echo $menu['menu_title']; ?></a>
                <?php
                $this->render($this->view, array(
                    'data' => $menu['items'],
                    'first' => false,
                ));
                ?>
            </li>
        <?php } ?>
    </ul>
    <?php
}