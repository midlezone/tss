<?php
if (isset($data) && count($data)) {
    ?>
    <?php if ($first) { ?>

    <?php } ?>
    <?php if ($first && $show_widget_title) { ?>
        <div class="title clearfix">
            <h2><?php echo $widget_title; ?></h2>
            <div class="line"></div>
        </div>
    <?php } ?>
    <div class="row">

        <?php
        foreach ($data as $menu_id => $menu) {

            $m_link = $menu['menu_link'];
            ?>
            <div class="col-sm-4">
                <div class="delivery">
                    <div class="box-img-f">
                        <a href="<?php echo $m_link; ?>" title="<?php echo $menu['menu_title']; ?>"> 
                            <img alt="<?php echo $menu['menu_title']; ?>" class="menu-icon" src="<?php echo ClaHost::getImageHost() . $menu['icon_path'] . $menu['icon_name']; ?>" />
                        </a>
                    </div>
                    <div class="box-info-f">
                        <h5><?php echo $menu['menu_title']; ?></h5>
                        <span><?php echo $menu['description']; ?></span>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php if ($first) { ?>
        <?php
    }
}
?>

