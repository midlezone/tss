<div class="statistic" style="margin-top: 10px;">
    <div class="panel">
        <?php if ($show_widget_title) { ?>
           
        <?php } ?>
        <div class="panel-body">
            <div class="useraccess">
                <p class="text-info">
                    <i class="uc-online"></i>
                    <span class="uc-title"><?php echo Yii::t('common', 'statistic_online'); ?></span>
                    <span class="uc-number"><?php echo number_format($online); ?></span>
                </p>
                <p class="text-info">
                    <i class="uc-today"></i>
                    <span class="uc-title"><?php echo Yii::t('common', 'statistic_today'); ?></span>
                    <span class="uc-number"><?php echo number_format($today); ?></span>
                </p>
                <p class="text-primary">
                    <i class="uc-total"></i>
                    <span class="uc-title"><?php echo Yii::t('common', 'statistic_totalaccess'); ?></span>
                    <span class="uc-number"><?php echo number_format($totalAccess); ?></span>
                </p>
            </div>
        </div>
    </div>
</div>