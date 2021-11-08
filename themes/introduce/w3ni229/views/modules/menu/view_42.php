<?php
if (isset($data) && count($data)) {
    ?>
	
    <?php if ($first) { ?>
    <?php } ?>
	
    <?php if ($first && $show_widget_title) { ?>
        <div class="title clearfix">
            <h2><?php echo $widget_title; ?></h2>
        </div>
    <?php } ?>
	
    <div class="cont">
        <div class="row">
            <?php
            foreach ($data as $menu_id => $menu) {
                $m_link = $menu['menu_link'];
                ?>
                <div class="col-sm-6">
                    <div class="box-strategy-product">
						
                        <div class="box-images">
                            <a href="<?php echo $m_link; ?>" title="<?php echo $menu['menu_title']; ?>"> 
                                <img alt="<?php echo $menu['menu_title']; ?>" class="menu-icon" src="<?php echo ClaHost::getImageHost() . $menu['background_path'] . $menu['background_name']; ?>" />
                            </a>
                        </div>
                        <div class="title-pro">
                            <h4>
                                <a href="<?php echo $m_link; ?>" title="<?php echo $menu['menu_title']; ?>"> 
                                    <?php echo $menu['menu_title']; ?>
                                </a>
                            </h4>
                        </div>                          
                    </div>
                </div>
            <?php } ?>
			
        </div>

        <?php if ($first) { ?>
     </div>
        <?php
    }
}
?>

