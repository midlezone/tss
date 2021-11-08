<?php if (isset($data) && count($data)) { ?>
    <div class="box-nav-right">
        <ul class="ul-language ">
            <li class="sub-right"><span class="option-lg"><?php echo Yii::t('common', 'location'); ?></span><br><i class="right-active"><?php echo Yii::t('common', 'location'); ?></i>
            </li>
            <div class="option-language clearfix">
                <ul>
                    <?php
                    foreach ($data as $menu_id => $menu) {
                        $m_link = $menu['menu_link'];
                        ?>
                        <li> <a href="<?php echo $m_link; ?>" title="<?php echo $menu['menu_title']; ?>"><?php echo $menu['menu_title']; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </ul>
    </div>
<?php } ?>