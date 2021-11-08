<div id="footer">
    <div class="container">
        <div class="row top-footer">
            <div class="col-sm-4 introduce">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1)); ?>
            </div>

            <div class="col-sm-4 transport">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2)); ?>
            </div>

            <div class="col-sm-4 about">
                <div class="title">
                    <h3>Thông tin liên hệ</h3>
                </div>
                <div class="footer-logo">
                    <img src="<?php echo Yii::app()->theme->baseUrl . '/css/img/logo-footer.jpg'; ?>" />
                </div>
                <div class="w3n-intro">
                    <?php
                    if (Yii::app()->siteinfo['footercontent']) {
                        echo Yii::app()->siteinfo['footercontent'];
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="bot-footer">
            <p>Copyright 2015 @ <a href="">http://tss-software.com.vn</p>
        </div>
    </div>
</div>