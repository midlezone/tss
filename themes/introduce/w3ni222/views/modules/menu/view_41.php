<?php
if (isset($data) && count($data)) {
    ?>
    <?php if ($first) { ?>
        <div class="feature clearfix ">
        <?php } ?>
        <?php
        foreach ($data as $menu_id => $menu) {
            $m_link = $menu['menu_link'];
            ?>
            <div class=" col-sm-4 featureitem">
                <div class="featureitem-title">
                    <div class="featureitem-title">
                        <h3>
                          <a class="clearfix" href='<?php echo $m_link; ?>' title="<?php echo $menu['menu_title']; ?>">
                                <i class="icon">
                                    <img src="<?php echo ClaHost::getImageHost() . $menu['icon_path'] . $menu['icon_name']; ?>" alt="<?php echo $menu['menu_title']; ?>"/>
                                </i>
                                <span><?php echo $menu['menu_title']; ?></span>
                            </a>
                        </h3>
                    </div>
                    <div class="featureitem-cont">
                        <?php if ($menu['description']) { ?>
                            <p><?php echo $menu['description']; ?></p>                    
                        <?php } ?>
                    </div>
                </div>
                <?php
                $this->render($this->view, array(
                    'data' => $menu['items'],
                    'first' => false,
                ));
                ?>
            </div>
        <?php } ?>
        <?php if ($first) { ?>
        </div>
        <?php
    }
}
?>