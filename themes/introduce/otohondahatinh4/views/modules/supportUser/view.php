<?php if (count($data)) { ?>
    <div class="contact-box clearfix">
        <?php if($show_widget_title) { ?>
        <div class="box-title">
            <h2>
                <a onclick="javascript:void(0)"><?php echo $widget_title ?></a>
            </h2>
        </div>
        <?php } ?>
        <?php foreach ($data as $user) { ?>
            <div class="contact-box-item">
                <div class="contact-box-item-img">
                    <a href="">
                        <img src="<?php echo ClaHost::getImageHost() . $user['avatar_path'] . 's50_50/' . $user['avatar_name'] ?>">
                    </a>
                </div>
                <div class="contact-box-item-content">
                    <span class="name"><?php echo $user['name'] ?></span><br>
                    <span class="tel"><?php echo $user['phone'] ?></span>
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
        <?php } ?>
    </div>
<?php } ?>

