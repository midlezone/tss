<div id="footer" class="clearfix">
    <div class="bottom-footer clearfix">
        <div class="container">
            <div class="col-sm-6  facebook">
                <?php
                if (Yii::app()->siteinfo['footercontent']) {
                    echo Yii::app()->siteinfo['footercontent'];
                }
                ?>
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                ?>
            </div>
			 <div class="col-sm-3 bantin">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK4));
                ?>
            </div>
            <div class="col-sm-3 bantin">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                ?>
            </div>
          
        </div>

    </div>
    <div class="footer-f clearfix">
        <div class="container">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK3));
            ?>

        </div>

    </div>
</div>