<div id="header">
    <div class="container">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_HEADER)); ?>
    </div>
</div>
<div id="contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_LEFT)); ?>
            </div>
            <div class="col-sm-6 logodt">
                <h1>
                    <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                        <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                        <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                    </a>
                </h1>
            </div>
        </div>
    </div>
</div>
<div id="nav">
    <div class="container">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN)); ?>
    </div>
</div>
