<?php if (isset($data) && count($data)) {
    ?>
    <div class="need">
        <?php
        foreach ($data as $menu_id => $menu) {
            $i++;
            $m_link = $menu['menu_link'];
            if ($i > $cols)
                break;
            ?>

            <?php if ($first) { ?>
                <div class="title-bt">
                    <span>
                        <?php echo $menu['menu_title']; ?>
                    </span>
                </div>
                <div class="cont">
                    <ul>
                    <?php } else { ?>
                        <li class="<?php echo $level == 0 ? 'level1' : '' ?>">
                            <a href="<?php echo $m_link; ?>" <?php echo $menu['target']; ?> title="<?php echo $menu['menu_title']; ?>"><?php echo $menu['menu_title']; ?></a>
                        </li>
                    <?php } ?>
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
                    <?php if ($first) { ?>
                    </ul>
                </div>
            <?php }
            ?>
            <?php
        }
        ?>
    </div>
<?php } ?>