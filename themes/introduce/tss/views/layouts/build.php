<?php $this->beginContent('//layouts/main'); ?>
<div id="w3step" class="w3step">
    <div class="wrap">
        <div class="row no-margin pagecontent">
            <div class="row w3step-step">
                <div class="col-xs-4 step step1 <?php if (Yii::app()->controller->action->id == 'choicetheme') echo 'active'; ?>">
                    <i class="step-step"></i>
                    <i class="arrow-down"></i>
                </div>
                <div class="col-xs-4 step step2 <?php if (Yii::app()->controller->action->id == 'install') echo 'active'; ?>">
                    <i class="step-step"></i>
                    <i class="arrow-down"></i>
                </div>
                <div class="col-xs-4 step step3">
                    <i class="step-step"></i>
                    <i class="arrow-down"></i>
                </div>
            </div>
        </div>
    </div>
    <div id="content">
        <?php echo $content; ?>
    </div>
</div>
<?php $this->endContent(); ?>