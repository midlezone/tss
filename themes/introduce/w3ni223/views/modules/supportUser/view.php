<?php if (count($data)) { ?>
    <?php if ($show_widget_title) { ?>
        <div class="title-contact">
            <h2>
             <?php echo $widget_title ?>
            </h2>
        </div>
    <?php } ?>
    <div class="cont">
        <?php foreach ($data as $user) { ?>
            <div class="user">
                <div class="contact-box-item-content">
                    <span class="name"><?php echo $user['name'] ?></span><br>
                    <span class="phone"><?php echo $user['phone'] ?></span>
                    <span class="mail"><?php echo $user['email'] ?></span>
                </div>
            </div>
            <div class="clear"></div>
        <?php } ?>
    </div>
<?php } ?>

