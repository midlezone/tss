<?php if (isset($data) && count($data)) { ?>
    <ul>
        <?php foreach ($data as $menu_id => $menu) { ?>
            <li class="<?php echo (($menu['active']) && $first) ? 'active' : '' ?> <?php echo (count($menu['items']) && $first) ? 'has-sub' : '' ?>">
                <a href="<?php echo $menu['menu_link'] ?>" <?php echo $menu['target']; ?> title="<?php echo $menu['menu_title']; ?>">
                    <?php echo $menu['menu_title']; ?>
                </a>
                <?php
                $this->render($this->view, array(
                    'data' => $menu['items'],
                    'first' => false,
                ));
                ?>
            </li>
        <?php } ?>
    </ul>
<?php } ?>
