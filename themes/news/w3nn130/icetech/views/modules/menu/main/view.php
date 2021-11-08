<?php
if ($data && count($data) > 0) {
    ?>
    <nav id="navigation">
        <div class="nav_wrap">
            <div class="inner">
                <ul class="nav">
                    <?php foreach ($data as $item) { ?>
                        <li <?php echo ($item['active']) ? 'class="active"' : '' ?> >
                            <a href="<?php echo $item['menu_link'] ?>"><?php echo $item['menu_title']; ?></a>
                        </li>
                    <?php } ?>
                </ul>        
            </div>
        </div>
    </div>
<?php } ?>