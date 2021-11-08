<?php
if (isset($data) && count($data)) {
    ?>

    <?php if ($first && $show_widget_title) { ?>
        <div class="panel panel-default menu-horizontal">
            <div class="panel-heading">
                <h3><?php echo $widget_title; ?></h3>
            </div>
            <div class="panel-body">
            <?php } ?>
            <?php if ($first) { ?>
                <div class="menu-footer">
                <?php } ?>
                <?php
                $i = 0;
                foreach ($data as $menu_id => $menu) {
                    $i++;
                    $m_link = $menu['menu_link'];
                    ?>
                    <?php if($i > 1) { ?>
                    <span> | </span>
                    <?php } ?>
                    <a href="<?php echo $m_link; ?>" <?php echo $menu['target']; ?> title="<?php echo $menu['menu_title']; ?>"><?php echo $menu['menu_title']; ?></a>
                <?php } ?>
            <?php } ?>
            <?php if ($first) { ?>
            </div>
        <?php } ?>
        <?php if ($first && $show_widget_title) { ?>
        </div>
    </div>
<?php } ?>