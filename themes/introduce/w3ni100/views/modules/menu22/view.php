<?php
if ($data && count($data) > 0) {
    ?>
    <ul class="nav">
        <?php foreach ($data as $item) { ?>
            <li class="boder-menu <?php echo ($item['active']) ? 'active' : '' ?>" >
                <a <?php echo Menus::getTarget($item); ?> href="<?php echo $item['menu_link'] ?>"><?php echo $item['menu_title']; ?></a>
            </li>
        <?php } ?>
    </ul>        
<?php } ?>