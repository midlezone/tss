<?php if (isset($data) && count($data)) { ?>
    <div class="service">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2><a href="javascript:void(0)" title="<?php echo $widget_title ?>"><?php echo $widget_title ?></a></h2>
            </div>
        <?php } ?>
        <div class="cont">
            <?php
            foreach ($data as $menu_id => $menu) {
                $m_link = $menu['menu_link'];
                ?>
                <a href="<?php echo $m_link; ?>" title="<?php echo $menu['menu_title'] ?>" class="clearfix">
                    <div class="box-img">
                        <img class="img1" src="<?php echo ClaHost::getImageHost(), $menu['icon_path'], $menu['icon_name'] ?>" alt="<?php echo $menu['menu_title'] ?>"> 
                        <img class="img2" src="<?php echo ClaHost::getImageHost(), $menu['background_path'], $menu['background_name'] ?>" alt="<?php echo $menu['menu_title'] ?>">
                    </div>
                    <div class="box-info">
                        <h3><?php echo $menu['menu_title']; ?></h3>
                        <p><?php echo $menu['description']; ?></p>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
    <?php
}
    