<?php
if (isset($data) && count($data)) {
    ?>
    <ul <?php echo $first ? "class='lv1'" : '' ?>>
        <?php
        foreach ($data as $menu_id => $menu) {
            $m_link = $menu['menu_link'];
            ?>
            <li>
                <a href="<?php echo $m_link ?>" <?php echo $menu['target']; ?> title="<?php echo $menu['menu_title']; ?>"><?php echo $menu['menu_title'] ?></a> 
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
