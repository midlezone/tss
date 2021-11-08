<div id="header">
    <div class="top-header clearfix">
        <div class="logo">
            <h1>
                <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                    <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                    <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                </a>
            </h1>
        </div>
        <div class="registered">
            <div class="registered-action">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">
                    <span class="option-lg">Chọn địa điểm</span>
                </button>
                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="display: none;">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content ">
                            <?php
                            $this->widget('common.widgets.modules.filterAddress.filterAddress', array(
                            ));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="cssmenu">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN));
            ?>
        </div>


        <div class="login">
            <ul class="menu">
                <?php if (Yii::app()->user->isGuest) { ?>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('login/login/login'); ?>" id="w3nlogin">
                            <?php echo Yii::t('common', 'login'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('login/login/signupRverify'); ?>">
                            <?php echo Yii::t('common', 'signup'); ?>
                        </a>
                    </li>
                    <?php
                } else {
                    $user = Users::getCurrentUser();
                    ?>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('profile/profile'); ?>">
                            <?php echo $user->name ?>
                            <img style="width: 23px;margin-left: 6px;margin-top: -5px;" src="<?php echo Yii::app()->theme->baseUrl ?>/css/img/icon-person.png" />
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>