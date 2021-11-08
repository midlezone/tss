<div class="page-wrap">
    <div id="footer">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER));
        if (Yii::app()->siteinfo['footercontent']) {
            echo Yii::app()->siteinfo['footercontent'];
        }
        ?>
    </div>
    <p class="designby">Thiết kế bởi <a href="http://web3nhat.com" target="_blank">web3nhat</a></p>
</div>