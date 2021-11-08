<?php
if (isset($data) && count($data)) {
    ?>
    <div class="mn-ft">
        <?php foreach ($data as $menu_id => $menu) { ?>
            <div class="panel-heading">
                <h2>
                    <a href="<?php echo $menu['menu_link'] ?>" title="<?php echo $menu['menu_title'] ?>" <?php echo $menu['target']; ?>>
                        <span><?php echo $menu['menu_title'] ?></span>
                    </a>
                </h2>
            </div>
            <?php if (isset($menu['items']) && count($menu['items']) > 0) { ?>
                <div class="site-map-cont">
                    <ul>
                        <?php foreach ($menu['items'] as $m_id => $menu) { ?>
                            <li>
                                <a href="<?php echo $menu['menu_link'] ?>" title="<?php echo $menu['menu_title'] ?>">
                                    <i class="icon-tt"></i> 
                                    <?php echo $menu['menu_title'] ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
<?php } ?>