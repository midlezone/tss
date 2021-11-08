<div class="footer" id="footer">
    <div class="box clearfix">
      <div class="row">
        <div class="footer-nd col-xs-5 col-md-5">
          <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
            ?>
        </div>
        <div class="footer-nd col-xs-3 col-md-3">
          <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
            ?>
        </div>  
        <div class="footer-nd col-xs-4 col-md-4">
          <?php
            if (Yii::app()->siteinfo['footercontent']) {
                echo Yii::app()->siteinfo['footercontent'];
            }            ?>
        </div>
      </div>
    </div>
	<div class="designby"><a href="http://tss-software.com.vn/" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

  </div>