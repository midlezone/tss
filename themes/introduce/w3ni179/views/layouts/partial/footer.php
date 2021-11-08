<div id="footer">
    <div class="container">
        <div class="bottom-footer">
            <div class="row">
                <div class=" col-sm-8 col-xs-12 box-footer">
                    <?php
                    if (Yii::app()->siteinfo['footercontent']) {
                        echo Yii::app()->siteinfo['footercontent'];
                    }
                    ?>
                </div>
                <div class="col-sm-4 col-xs-12 facebook">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                    ?>
                </div>
            </div>
            <div class="footer-f">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK3));
                ?>
            </div>
        </div>
    </div>
