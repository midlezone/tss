<div class="thongke">
    <?php if($show_widget_title) { ?>
    <div class="header-panel">
        <h3><?php echo $widget_title; ?></h3>
    </div>
    <?php } ?>
    <div class="tk-cont">
        <p class="ltc"><?php echo Yii::t('common', 'statistic_totalaccess'); ?>: <?php echo number_format($totalAccess); ?></p>
        <p class="onl"><?php echo Yii::t('common', 'statistic_online'); ?>: <?php echo number_format($online); ?></p>
        <p class="ltchn"><?php echo Yii::t('common', 'statistic_today'); ?>: <?php echo number_format($today); ?></p>
    </div>
</div>
