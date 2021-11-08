<?php
if (isset($data) && count($data)) {
    ?>
    <?php if ($first) { ?>
        <div class="featured_services">
            <div class="row">
            <?php } ?>
            <?php if ($first && $show_widget_title) { ?>
                <div class="panel panel-default menu-horizontal">
                    <div class="panel-heading">
                        <h3><?php echo $widget_title; ?></h3>
                    </div>
                <?php } ?>
                <?php
                $count = 0;
                foreach ($data as $menu_id => $menu) {
                    $count = $count + 1;
                    $m_link = $menu['menu_link'];
                    ?>
                    <div class="col-sm-4 col-xs-12">
                        <div class="box <?php if ($count == 2) echo 'active '; ?> clearfix">
                            <div class="box-title">
                                <a href="<?php echo $m_link; ?>" <?php echo $menu['target']; ?> title="<?php echo $menu['description']; ?>">
                                    <h2><?php echo $menu['menu_title']; ?></h2>
                                </a>
                            </div>
                            <div class="box-body">
                                <div class="box-img">
                                    <a href="<?php echo $m_link; ?>" title="<?php echo $menu['menu_title']; ?>"> 
                                        <img alt="<?php echo $menu['menu_title']; ?>" class="menu-icon" src="<?php echo ClaHost::getImageHost() . $menu['icon_path'] . '/s220_220/' . $menu['icon_name']; ?>" />
                                    </a>
                                </div>
                                <div class="shadow"></div>
                                <div class="box-content">
                                    <?php if ($menu['description']) { ?>
                                        <p><?php echo $menu['description']; ?></p>                    
                                    <?php } ?>
                                </div>
                                <div class="box-footer">
                                    <a class="btn detai-btn" href="<?php echo $m_link; ?>" title="<?php echo $menu['menu_title']; ?>">
                                        <span>read more</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($first && $show_widget_title) { ?>
                </div>
            <?php } ?>
            <?php if ($first) { ?>
            </div>
        </div>
        <?php
    }
}
?>

