<div id="header">
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h1 id="logo"> 
                        <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                            <img alt="Về trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                        </a>
                    </h1>
                </div>
                <div class="col-sm-9">
                    <div class="header-r">
                        <div class="top-header clearfix">
                            <ul class="menu">
                                <li> 
                                    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_HEADER)); ?>
                                </li>
                                <?php if (Yii::app()->user->isGuest) { ?>
                                    <li>
                                        <a href="<?php echo Yii::app()->createUrl('login/login/login'); ?>">
                                            <?php echo Yii::t('common', 'login'); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Yii::app()->createUrl('login/login/signup'); ?>">
                                            <?php echo Yii::t('common', 'signup'); ?>
                                        </a>
                                    </li>
                                <?php } else { ?>
                                    <li>
                                        <a href="<?php echo Yii::app()->createUrl('login/login/logout'); ?>">
                                            <?php echo Yii::t('common', 'logout'); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="cont-header">
                            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX)); ?>
                            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_RIGHT)); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="menu-nav">
    <header class="app-bar promote-layer">
        <button class="menu-btn"><img src="<?php echo Yii::app()->theme->baseUrl ?>/css/img/hamburger.png"></button>
    </header>
    <nav class="navdrawer-container promote-layer">
        <div class="container">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN)); ?>
        </div>
    </nav>
</div>
<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER)); ?>
