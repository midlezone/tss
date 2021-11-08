<?php
if (isset($data) && count($data)) {
    ?>
    <ul class="nav-home">
        <?php
        foreach ($data as $menu_id => $menu) {
            $m_link = $menu['menu_link'];
            ?>
            <li>
                <a href="<?php echo $m_link; ?>" <?php echo $menu['target']; ?> title="<?php echo $menu['description']; ?>">
                    <span><?php echo $menu['menu_title']; ?></span>
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
