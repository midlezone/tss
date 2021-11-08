<?php
if (isset($data) && count($data)) {
    ?>

    <?php if ($first && $show_widget_title) { ?>
        <div class="panel panel-default menu-horizontal">
            <div class="panel-heading">
                <h3><?php echo $widget_title; ?></h3>
            </div>
            <div class="panel-body">
            <?php } ?>
            <?php if ($first) { ?>
                <ul class="menu <?php if ($first && $directfrom) echo 'menu-align-right'; ?>">
                <?php } else { ?>
                    <?php if ($level == 0) { ?>
                        <div class="submenu-separate">
                            <ul class="list-group">
                            <?php } ?>
                        <?php } ?>
                        <?php
                        foreach ($data as $menu_id => $menu) {
                            $m_link = $menu['menu_link'];
                            ?>
                            <?php if ($first) { ?>
                                <li class="<?php echo ($menu['items']) ? 'submenu' : ''; ?> <?php echo ($menu['active']) ? 'active' : '' ?>" >
                                    <a href="<?php echo $m_link; ?>" <?php echo $menu['target']; ?> title="<?php echo $menu['description']; ?>">
                                        <?php if ($menu['icon_path'] && $menu['icon_name']) { ?>
                                            <img class="menu-icon" src="<?php echo ClaHost::getImageHost() . $menu['icon_path'] . $menu['icon_name']; ?>" />
                                        <?php } ?>
                                        <?php echo $menu['menu_title']; ?>
                                    </a>
                                    <div class="submenu-background">
                                        <?php if ($level == 0 && $menu['background_path'] && $menu['background_name']) { ?>
                                            <div class="background-image">
                                                <img src="<?php echo ClaHost::getImageHost() . $menu['background_path'] . $menu['background_name']; ?>" />
                                            </div>
                                        <?php } ?>
                                        <?php
                                        $this->render($this->view, array(
                                            'data' => $menu['items'],
                                            'first' => false,
                                            'level' => $level,
                                        ));
                                        ?>
                                    </div>
                                </li>
                            <?php } else { ?>
                                <li class="list-group-item <?php echo ($menu['items']) ? 'has-item' : ''; ?> <?php echo ($menu['active']) ? 'active' : '' ?>" >
                                    <a href="<?php echo $m_link; ?>" <?php echo $menu['target']; ?> title="<?php echo $menu['menu_title']; ?>"><?php echo $menu['menu_title']; ?></a>
                                    <?php if ($menu['items']) { ?>
                                        <ul class="list-group">   
                                        <?php } ?>
                                        <?php
                                        $this->render($this->view, array(
                                            'data' => $menu['items'],
                                            'first' => false,
                                            'level' => $level + 1,
                                        ));
                                        ?>
                                        <?php if ($menu['items']) { ?>
                                        </ul>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($level == 0 || $first) { ?>
                        </ul>        
                    <?php } ?>
                    <?php if ($level == 0 && !$first) { ?>
                    </div>
                <?php } ?>    
            <?php } ?>
            <?php if ($first && $show_widget_title) { ?>
        </div>
    </div>
<?php } ?>