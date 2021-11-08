<?php
if (isset($data) && count($data)) {
    ?>

    <?php if ($first) { ?>
        <nav class="top-bar">
            <ul class="title-area">
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>
            <?php if ($show_widget_title) { ?>
                <h2><?php echo $widget_title; ?></h2>
            <?php } ?>
            <section class="top-bar-section">
                <!-- Nav Section -->
            <?php } ?>
                <ul class="<?php if(!$first) echo 'dropdown'; ?>">
                <?php
                foreach ($data as $menu_id => $menu) {
                    $m_link = $menu['menu_link'];
                    ?>
                    <li class="<?php echo ($menu['items']) ? 'has-dropdown' : ''; ?> <?php echo ($menu['active']) ? 'active' : '' ?>" >
                        <a href="<?php echo $m_link; ?>" <?php echo $menu['target'];?> title="<?php echo $menu['menu_title']; ?>"><?php echo $menu['menu_title']; ?></a>
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
        </section>
    </nav>
<?php } ?>