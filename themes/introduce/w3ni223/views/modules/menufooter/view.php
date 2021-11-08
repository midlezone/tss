<?php if (isset($data) && count($data)) { ?>
    <ul class="<?php echo $level == 0 ? 'level1' : '' ?>">
        <?php
        foreach ($data as $menu_id => $menu) {
            $i++;
            $m_link = $menu['menu_link'];
            if ($i > $cols)
                break;
            ?>
            <li class="<?php echo $level == 0 ? 'level1' : '' ?>">
                <a href="<?php echo $m_link; ?>" <?php echo $menu['target']; ?> title="<?php echo $menu['menu_title']; ?>"><?php echo $menu['menu_title']; ?></a>
                <?php
                if ($menu['items']) {
                    $this->render($this->view, array(
                        'data' => $menu['items'],
                        'first' => false,
                        'level' => $level + 1,
                        'rows' => $this->rows,
                        'cols' => $this->cols,
                        'colItemClass' => $colItemClass,
                    ));
                }
                ?>
            </li>
        <?php } ?>
    </ul>
<?php } ?>