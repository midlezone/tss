<?php if (isset($data) && count($data)) { ?>
    <ul class="menu">
        <?php foreach ($data as $menu_id => $menu) { ?>
            <li>
                <a <?php echo $menu['target']; ?> href="<?php echo $menu['menu_link'] ?>" title="<?php echo $menu['menu_title']; ?>" id="w3nlogin">
                    <?php echo $menu['menu_title']; ?>
                </a>
            </li>
        <?php } ?>
    </ul>
<?php } ?>