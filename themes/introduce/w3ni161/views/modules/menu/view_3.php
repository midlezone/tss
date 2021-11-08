<?php if (isset($data) && count($data)) { ?>
    <ul>
        <?php if ($first) { ?>
        <li class="home-icon"><a href="" title="trang chủ">Trang chủ</a></li>
        <?php } ?>
        <?php foreach ($data as $menu_id => $menu) { 
            ?>
        <li class="<?php echo ($menu['active']) ? 'active' : '' ?> <?php echo (count($menu['items']) && $first) ? 'has-sub' : '' ?>">
            <?php if ($first && count($menu['items'])) { ?>
            <?php } ?>
            <a href="<?php echo $menu['menu_link'] ?>" <?php echo $menu['target']; ?> title="<?php echo $menu['description']; ?>">
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