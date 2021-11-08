<?php
$this->beginContent('//layouts/main');
$user_id = Yii::app()->user->id;
 $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); 
if ($user_id) {
    ?>
    <div class="content clearfix">
        <div class="left left-realestate">
            <?php $this->widget('common.widgets.modules.realestateProjectModule.realestateProjectModule'); ?>
        </div>
        <div class="right">
            <div id="contentCol">
                <div id="centerCol">
                    <div class="centerContent">
                        <?php
                        echo $content;
                        ?>
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="content clearfix">
        <div class="wrap_create_real_estate">
            <span class="do-not-login"><?php echo Yii::t('realestate', 'do_not_login'); ?></span>
        </div>
    </div>
<?php } ?>
<?php $this->endContent(); ?>