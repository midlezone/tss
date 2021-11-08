<?php if (isset($data) && count($data)) { ?>
    <ul>
        <?php if ($first) { ?>
        <li class="home-icon">
            <a href='<?php echo Yii::app()->getBaseUrl(true); ?>'>Trang chủ</a>
        </li>
        <?php } ?>
        <?php foreach ($data as $menu_id => $menu) { ?>
            <li class="<?php echo (($menu['active']) && $first) ? 'active' : '' ?> <?php echo (count($menu['items']) && $first) ? 'has-sub' : '' ?>">
                <a href='<?php echo $menu['menu_link'] ?>' title="<?php echo $menu['menu_title'] ?>"><?php echo $menu['menu_title']; ?></a>
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
