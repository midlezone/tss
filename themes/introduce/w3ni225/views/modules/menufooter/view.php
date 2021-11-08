<?php
if (isset($data) && count($data)) {
    foreach ($data as $menu_id => $menu) {
        $i++;
        if ($i > $cols) {
            break;
        }
        ?>
        <div class="col-sm-4">
            <div class="title">
                <h2 class="abc">
                    <a title="<?php echo $menu['menu_title']; ?>" <?php echo $menu['target']; ?> href="<?php echo $menu['menu_link']; ?>"><?php echo $menu['menu_title']; ?></a>
                </h2>
            </div>
            <?php if ($menu['items'] && count($menu['items'])) { ?>
                <div class="cont">
                    <ul>
                        <?php foreach ($menu['items'] as $c_menu) { ?>
                            <li><a title="<?php echo $c_menu['menu_title']; ?>" <?php echo $c_menu['target']; ?> href="<?php echo $c_menu['menu_link']; ?>"><?php echo $c_menu['menu_title']; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        </div>
        <?php
    }
}