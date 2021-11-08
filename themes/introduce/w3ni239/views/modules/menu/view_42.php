<?php
if (isset($data) && count($data)) {
    ?>
    <div class="clear"></div>
    <div class="bottom-main clearfix">
        <?php if ($first) { ?>

        <?php } ?>
        <?php if ($first && $show_widget_title) { ?>
            <div class="title clearfix">
                <h2><?php echo $widget_title; ?></h2>
                <div class="line"></div>
            </div>
        <?php } ?>
        <?php
        foreach ($data as $menu_id => $menu) {
            $m_link = $menu['menu_link'];
            ?>
            <a href="<?php echo $m_link; ?>" title="<?php echo $menu['menu_title']; ?>" class="box-category clearfix "> 
                <img alt="<?php echo $menu['menu_title']; ?>" class="menu-icon" src="<?php echo ClaHost::getImageHost() . $menu['icon_path'] . $menu['icon_name']; ?>" />
                <div class="title-dm">
                    <h2><?php echo $menu['menu_title']; ?></h2>
                </div>
            </a>
        <?php } ?>
        <?php if ($first) { ?>
        </div>
        <?php
    }
}
?>

