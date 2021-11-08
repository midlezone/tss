<?php
if ($data && count($data) > 0) {
    ?>
    <?php if ($first) { ?>
        <div class="menu-box">
            <?php
            if ($show_widget_title && $widget_title) {
                ?>
                <div class="mtitle">
                    <span class="mptitle">
                        <?php echo $widget_title; ?>
                    </span>
                </div>
            <?php } ?>
            <div class="mbody">
            <?php } ?>
           <ul class="menu <?php if ($first && $directfrom) echo 'menu-align-right'; ?>">
                <?php
                foreach ($data as $menu_id => $menu) {
                    $m_link = $menu['menu_link'];
                    ?>
                    <li class="<?php echo ($menu['items']) ? 'submenu' : ''; ?> <?php echo ($menu['active']) ? 'active' : '' ?>" >
                        <a href="<?php echo $m_link; ?>" <?php echo ($menu['menu_target'] != '') ? 'target="_blank"' : ''; ?>><?php echo $menu['menu_title']; ?></a>
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
            </div>
        </div>
    <?php } ?>
<?php } ?>