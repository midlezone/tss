<?php
$username = (Yii::app()->user->id == $this->profileinfo['user_id']) ? 'bạn' : $this->profileinfo['name'];
$user = Users::getCurrentUser();
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title profilename aaaa">
            <?php echo $this->profileinfo['name']; ?>
        </h3>
    </div>
    <div class="panel-body">
        <div class="profilelink">
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <a href="<?php echo Yii::app()->createUrl('profile/profile/view', array('id' => $this->profileinfo['user_id'])) ?>"><?php echo Yii::t('common', 'profile'); ?></a>
                        </td>
                    </tr>
                    <?php if (Yii::app()->user->id == $this->profileinfo['user_id']) { ?>
                        <tr>
                            <td>
                                <a href="<?php echo Yii::app()->createUrl('profile/profile/changepassword') ?>"><?php echo Yii::t('common', 'user_changepassword'); ?></a>
                            </td>
                        </tr>
                        <?php if ($user->type == ActiveRecord::TYPE_LEADER_USER) { ?>
                            <tr>
                                <td>
                                    <a href="<?php echo Yii::app()->createUrl('profile/profile/realestateProjectIndex'); ?>">
                                        <?php echo Yii::t('realestate', 'list_manager'); ?>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td>
                                <a href="<?php echo Yii::app()->createUrl('profile/profile/realestateIndex'); ?>">
                                    <?php echo Yii::t('realestate', 'realestate_manager'); ?>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="<?php echo Yii::app()->createUrl('profile/profile/realestateNewsIndex'); ?>">
                                    <?php echo Yii::t('realestate', 'classifiedadvertising_manager'); ?>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="<?php echo Yii::app()->createUrl('profile/profile/userIntroduce'); ?>">
                                    Mạng lưới
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="<?php echo Yii::app()->createUrl('login/login/logout') ?>"><?php echo Yii::t('common', 'quit'); ?></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>    
    </div>
</div>


