<div id="header">
    <div class="wrap">
        <div id="bg-header" class="clearfix">
            <h1 id="logo">
                <a href="<?php echo Yii::app()->homeUrl; ?>">
                    <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                </a>
            </h1>
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
            ?>

        </div> <!--end-bg-header-->

    </div><!--end-page-wrap-->

</div>