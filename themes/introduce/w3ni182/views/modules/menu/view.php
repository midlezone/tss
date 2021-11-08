<?php
if (isset($data) && count($data)) {
    ?>
    <?php if ($first) { ?>
        <div id='cssmenu'>
        <?php } ?>
        <ul>
            <?php if ($first) { ?>
                <li>
                    <a href='<?php echo Yii::app()->getBaseUrl(); ?>'>
                        <i class="icon-home"></i>
                    </a>
                </li>
            <?php } ?>
            <?php
            foreach ($data as $menu_id => $menu) {
                $m_link = $menu['menu_link'];
                ?>
                <li class="<?php echo ($menu['items']) ? 'has-sub' : ''; ?> <?php echo ($menu['active']) ? 'active' : '' ?>">
                    <a href='<?php echo $m_link ?>' title="<?php echo $menu['menu_title']; ?>"><?php echo $menu['menu_title']; ?></a>
                    <?php
                    $this->render($this->view, array(
                        'data' => $menu['items'],
                        'first' => false,
                    ));
                    ?>
                </li>
            <?php } ?>
        </ul>
        <?php if ($first) { ?>
        </div>
    <?php }
}
?>