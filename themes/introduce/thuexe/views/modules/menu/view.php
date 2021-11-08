<?php if (isset($data) && count($data)) { ?>
    <ul>
 
        <?php foreach ($data as $menu_id => $menu) { ?>
            <li class="<?php echo (($menu['active']) && $first) ? 'active' : '' ?> <?php echo (count($menu['items']) && $first) ? 'has-sub' : '' ?>">
				<?php if($menu['menu_title'] == 'Gian hàng'): ?>
					<a target="_blank"   href="http://gianghang.jujube.com.vn/" title="<?php echo $menu['menu_title'] ?>"><?php echo $menu['menu_title']; ?></a>
				<?php else: ?>
					<a href='<?php echo $menu['menu_link'] ?>' title="<?php echo $menu['menu_title'] ?>"><?php echo $menu['menu_title']; ?></a>
				<?php endif; ?>
				
                <?php
                $this->render($this->view, array(
                    'data' => $menu['items'],
                    'first' => false,
                ));
                ?>
            </li>
        <?php } ?>
    </ul>
<?php } ?>
