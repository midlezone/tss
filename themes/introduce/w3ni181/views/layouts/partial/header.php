<section id="ef-header">
    <a id="ef-logo" href="<?php echo Yii::app()->homeUrl; ?>">
        <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" alt="<?php echo Yii::app()->siteinfo['site_title']; ?>" />
    </a>
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
    ?>
</section>