<?php
if (isset($data) && count($data)) {
    ?>

    <?php if ($first) { ?>
        <div class="panel panel-default categories">
            <?php if ($show_widget_title) { ?>
                <div class="panel-heading">
                    <h2><?php echo $widget_title; ?></h2>
                </div>
            <?php } ?>
            <div class="panel-body">
            <?php } ?>
            <ul class="menu <?php if ($first && $directfrom) echo 'menu-align-right'; ?> <?php if ($first) echo 'menu-list'; ?>">
                <?php
                foreach ($data as $menu_id => $menu) {
                    $m_link = $menu['menu_link'];
                    ?>
                    <li class="<?php echo ($menu['items']) ? 'submenu' : ''; ?> <?php echo ($menu['active']) ? 'active' : '' ?>" >
                        <a href="<?php echo $m_link; ?>" <?php echo ($menu['menu_target'] != '') ? 'target="_blank"' : ''; ?> title="<?php echo $menu['description']; ?>"><?php echo $menu['menu_title']; ?></a>
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
        <?php if ($first) { ?>
        </div>
    </div>

<?php } ?>