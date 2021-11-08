<?php
if (isset($data) && count($data)) {
    ?>
    <?php if ($first) { ?>
        <?php if ($show_widget_title) { ?>
            <div class="box category">
                <div class="title">
                    <h2><?php echo $widget_title; ?></h2>
                </div>
                <div class="box-cont">
                <?php } ?>
            <?php } ?>
            <ul class="menu <?php if ($first && $directfrom) echo 'menu-align-right'; ?> <?php if ($first) echo 'menu-list'; ?>">
                <?php
                foreach ($data as $menu_id => $menu) {
                    $m_link = $menu['menu_link'];
                    ?>
                    <li class="<?php echo ($menu['items']) ? 'submenu' : ''; ?> <?php echo ($menu['active']) ? 'active' : '' ?>" >
                        <a target='blank'  href="<?php echo $menu['description']; ?>" <?php echo ($menu['target'] != ''); ?> title="<?php echo $menu['description']; ?>">                            
                            <?php echo $menu['menu_title']; ?>
							<?php if ($menu['icon_path'] && $menu['icon_name']) { ?>
                                <img class="menu-icon" src="<?php echo ClaHost::getImageHost() . $menu['icon_path'] . $menu['icon_name']; ?>" />
                            <?php } ?>
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
        <?php if ($first) { ?>
            <?php if ($show_widget_title) { ?>
            </div>
        </div>
    <?php } ?>
<?php } ?>