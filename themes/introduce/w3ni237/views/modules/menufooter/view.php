<?php if (isset($data) && count($data)) { ?>
    <ul>
        <?php foreach ($data as $menu_id => $menu) { ?>
            <li><a title="<?php echo $menu['menu_title']; ?>" <?php echo $menu['target']; ?> href="<?php echo $menu['menu_link']; ?>"><?php echo $menu['menu_title']; ?></a></li>
        <?php } ?>
    </ul>
<?php } ?>
