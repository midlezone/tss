<div id="footer" class="clearfix">
    <div class="top-footer">
        <div class="container">
            <div class="menu-ft">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                ?>
            </div>
        </div>
    </div>
    <div class="bottom-footer clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <?php
                    if (Yii::app()->siteinfo['footercontent']) {
                        echo Yii::app()->siteinfo['footercontent'];
                    }
                    ?>
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                    ?>
                </div>
               
                <div class=" col-sm-3 box-footer">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK4));
                    ?>

                </div>
                <div class="col-sm-3 facebook">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK5));
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-f clearfix">
        <div class="container">
            <div class="social-ft clearfix">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK6));
                ?>
            </div>
        </div>
    </div>
    <div class="bottom-footer1">
        <div class="box-pay">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK1));
            ?>
        </div>
        <div class="coppyright">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK2));
            ?>
        </div>
        <div class="designby"><a href="http://tss-software.com.vn/" title="Thiết kế web, thiết kế web chuyên nghiệp" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

    </div>
</div>


<div class="coccoc-alo-phone coccoc-alo-green coccoc-alo-show" id="coccoc-alo-phoneIcon" style="left:0%; bottom:30px;">
        <a href="tel:0988656940">
            <div class="coccoc-alo-ph-circle"></div>
            <div class="coccoc-alo-ph-circle-fill"></div>
            <div class="coccoc-alo-ph-img-circle"></div>
            <span class="phone_text">Gọi ngay: 0988.656.940</span>
        </a>
</div>

 <script type="text/javascript">
     
    jQuery(document).ready(function () {
        if ($(window).width() > 768) {
            $(document).on('scroll', function () {
                if ($(this).scrollTop() > 280) {
                    $('.cont-header').addClass('pf');
                } else {
                    $('.cont-header').removeClass('pf');
                }
            });
        }
    });

 </script>
