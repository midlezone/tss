<?php
if (isset($data) && count($data)) {
    ?>
    <?php $themUrl = Yii::app()->theme->baseUrl; ?>
    <div class="top-center-main-right">
        <ul class="menu-align-right">
            <?php
            foreach ($data as $menu_id => $menu) {
                $m_link = $menu['menu_link'];
                ?>
                <li class='<?php echo ($menu['active']) ? 'active' : '' ?> cont-menu'>
                    <a href='<?php echo $menu['menu_link'] ?>' title="<?php echo $menu['menu_title']; ?>"><?php echo $menu['menu_title']; ?></a>
                    <?php
//                    $this->render($this->view, array(
//                        'data' => $menu['items'],
//                        'first' => false,
//                    ));
//                    ?>
                    <p><img src="<?= $themUrl ?>/css/img/i-cuoi-den.png" alt="#"></p>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php }
?>