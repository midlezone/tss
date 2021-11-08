
<div class="footer" class="clearfix">
    <div class="bottom-footer clearfix">
        <div class="container">
            <div class="col-sm-4 box-footer">
                <?php
                if (Yii::app()->siteinfo['footercontent']) {
                    echo Yii::app()->siteinfo['footercontent'];
                }
                ?>
            </div>
            <div class="col-sm-4 bantin">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                ?>
            </div>
            <div class="col-sm-4 facebook">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                ?>
            </div>
        </div>

    </div>
    <div class="footer-f clearfix">
        <div class="container">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK3));
            ?>
			<div class="dc" style="border-top: 2px solid #FFF;"><a href="http://tss-software.com.vn/" target="_blank" title="Thiết kế web, thiết kế web chuyên nghiệp"><span style="color:#FFFFFF;">Thiết kế web: TSS-SOFTWARE</span></a></div>
        </div>
    </div>
</div>


