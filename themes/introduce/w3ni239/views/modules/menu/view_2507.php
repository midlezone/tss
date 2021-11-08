<?php if (isset($data) && count($data)) { ?>
    <div class="slide-menu-left">    
        <ul class="menu-smal">
            <?php
            $first_child = true;
            foreach ($data as $menu_id => $menu) {
                $m_link = $menu['menu_link'];
                if ($first_child && $first) {
                    ?>
                    <li>
                        <a href="<?php echo $m_link; ?>" <?php echo $menu['target']; ?> title="<?php echo $menu['description']; ?>" class = "top-menu-left"> <?php echo $menu['menu_title']; ?></a>
                    </li>
                    <?php
                    $first_child = false;
                    continue;
                }
                ?>
                <li>
                    <a href="<?php echo $m_link; ?>" <?php echo $menu['target']; ?> title="<?php echo $menu['description']; ?>"><?php echo $menu['menu_title']; ?></a>
                    <?php
                    if ($menu['items']) {
                        foreach ($menu['items'] as $menu_id => $menu) {
                            $m_link = $menu['menu_link'];
                            ?>
                            <ul>  
                                <li>
                                    <a href="<?php echo $m_link; ?>" <?php echo $menu['target']; ?> title="<?php echo $menu['description']; ?>" > <?php echo $menu['menu_title']; ?></a>
                                </li>
                            </ul>
                            <?php
                        }
                    }
                    ?>
                </li>
            <?php } ?>
        </ul>
    </div>
    <?php
}    