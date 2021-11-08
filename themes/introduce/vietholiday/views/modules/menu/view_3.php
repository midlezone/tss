<?php
if (isset($data) && count($data)) {
    ?>
    <?php if ($first && $show_widget_title) { ?>
        <div class="panel panel-default menu-horizontal">
            <div class="panel-heading">
                <h2><?php echo $widget_title; ?></h2>
            </div>
            <div class="panel-body">
            <?php } ?>
            <?php if ($first) { ?>
                <div id='cssmenu'>
                <?php } ?>
                <ul>
                    <?php if ($first) { ?>
                        <li >
                            <a href='<?php echo Yii::app()->getBaseUrl(); ?>' class="active">
								<span class="menusys_name">Trang chủ</span>
                                
                            </a>
                        </li>
                    <?php } ?>
                    <?php
                    foreach ($data as $menu_id => $menu) {
                        $m_link = $menu['menu_link'];
                        ?>
                        <li class="<?php echo ($menu['items']) ? 'has-sub' : ''; ?> <?php echo ($menu['active']) ? 'active' : '' ?>" >
                            <a href="<?php echo $m_link; ?>" <?php echo $menu['target']; ?> title="<?php echo $menu['description']; ?>">
                                <?php if ($menu['icon_path'] && $menu['icon_name']) { ?>
                                    <img alt="<?php echo $menu['menu_title']; ?>" class="menu-icon" src="<?php echo ClaHost::getImageHost() . $menu['icon_path'] . $menu['icon_name']; ?>" />
                                <?php } ?>
								<span class="menusys_name">
                                <?php echo $menu['menu_title']; ?><span>
                            </a>
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
            <?php } ?>
        <?php } ?>
        <?php if ($first && $show_widget_title) { ?>
        </div>
    </div>
<?php } ?>