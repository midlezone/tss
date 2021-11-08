<?php $this->beginContent('//layouts/main'); ?>
<div id="h1main"><h1><span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span></h1></div>
<div class="top-banner clearfix">
    <div class="left">
        <div id="maincontent">
            <div class="clearfix layout layout-2">
                <div id="leftCol">
                    <div class="box-menu">
                        <?php
                        echo $content;
                        ?>
                    </div>
                </div>

                <div id="contentCol" class="clearfix">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2));
                    ?>
                </div>

            </div>
        </div>

        <div class="promotional">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3));
            ?>
        </div>

    </div>
    <div class="right">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_RIGHT));
        ?>
    </div>
</div>
<!--End top Banner-->


<div class="content">
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK4));
    ?>
</div>
<!-- End Content -->


<?php
$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK5));
?>
<!-- End Banner Full Width and productCategoryWithBackground -->


<div class="news-left">
    <div class="clearfix layout layout-2">
        <div id="leftCol">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK3));
            ?>
        </div>
        <div id="contentCol">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK4));
            ?>
        </div>
    </div>
</div>


<?php $this->endContent(); ?>