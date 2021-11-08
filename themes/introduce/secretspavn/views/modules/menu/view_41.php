<?php
if (isset($data) && count($data)) {
    ?>
    <div class="customer">
        <?php if ($first) { ?>
            <div class="container">
            <?php } ?>
            <?php if ($first && $show_widget_title) { ?>
                <div class="title clearfix">
                    <h2><?php echo $widget_title; ?></h2>
                </div>
                <!--<div class="line"></div>-->
            <?php } ?>
            <div class="cont">
                <div class="row">
                    <?php
                    foreach ($data as $menu_id => $menu) {
                        $m_link = $menu['menu_link'];
                        ?>
                        <div class="col-sm-3">
                            <div class="box-about">

                                <div class="box-images">
                                    <a href="<?php echo $m_link; ?>" title="<?php echo $menu['menu_title']; ?>"> 
                                        <img alt="<?php echo $menu['menu_title']; ?>" class="menu-icon" src="<?php echo ClaHost::getImageHost() . $menu['icon_path'] . $menu['icon_name']; ?>" />
                                    </a>
                                </div>
                                <div class="title-about">
                                    <h3>
                                        <a href="<?php echo $m_link; ?>" title="<?php echo $menu['menu_title']; ?>"> 
                                            <?php echo $menu['menu_title']; ?>
                                        </a>
                                    </h3>
                                </div>
                                <div class="more-about">
                                    <h4>
                                        <p><?php echo $menu['description']; ?></p>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php if ($first) { ?>
            </div>
        <?php }
        ?>
    </div>
    <?php
}
?>

