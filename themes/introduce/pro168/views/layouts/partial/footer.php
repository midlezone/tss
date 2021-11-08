<div class="footer" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 foot-l">
				<img alt="Về trang chủ" src="/mediacenter/media/images/1248/logo/548_1605595005_9485fb36f7d94ac8.jpg">
                <?php
                if (Yii::app()->siteinfo['footercontent']) {
                    echo Yii::app()->siteinfo['footercontent'];
                }
                ?>
            </div>
            <div class="col-sm-4 foot-c">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                ?>
            </div>  
            <div class="facebook col-sm-3">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                ?>
            </div>
        </div>
 

    </div>
</div>