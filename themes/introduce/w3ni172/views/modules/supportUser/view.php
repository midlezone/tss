<div class="wrap-cskh">
    <?php if ($show_widget_title) { ?>
        <div class="title-support-cskh">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><?php echo $widget_title; ?></h2>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php
    if (count($data)) {
        foreach ($data as $user) {
            ?>
            <div class="support-in">
                <div class="right-about">
                    <img src="<?php echo ClaHost::getImageHost() . $user['avatar_path'] . 's150_150/' . $user['avatar_name'] ?>">
                    <div class="tuvan"><?php echo $user['name'] ?></div>
                    <div class="hotline2"><span><?php echo $user['phone'] ?></span></div>
                    <div class="contact clearfix">
                        <?php if ($user['phone']) { ?>
                            <a href="tel:<?php echo $user['phone'] ?>">
                                <img src="<?php echo Yii::app()->theme->baseUrl ?>/css/img/telephone5.png" alt="Điện thoại">
                            </a>
                        <?php } ?>
                        <?php if ($user['skype']) { ?>
                            <a href="skype:<?php echo $user['skype'] ?>?chat">
                                <img src="<?php echo Yii::app()->theme->baseUrl ?>/css/img/skype12.png" alt="Skype">
                            </a>
                        <?php } ?>
                        <?php if ($user['yahoo']) { ?>
                            <a href="ymsgr:<?php echo $user['yahoo'] ?>">
                                <img src="<?php echo Yii::app()->theme->baseUrl ?>/css/img/emoticon85.png" alt="Yahoo">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>