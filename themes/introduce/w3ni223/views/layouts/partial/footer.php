<div id="footer">
    <div class="container">
        <div class="coppyright">
            <?php
            if (Yii::app()->siteinfo['footercontent']) {
                echo Yii::app()->siteinfo['footercontent'];
            }
            ?>
        </div>
    </div>
</div>