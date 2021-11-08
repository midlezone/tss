<div id="footer">
    <div class="wrap-branch">
        <div class="container">
            <div class="row">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER));
                ?>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="top-footer-bottom clearfix">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                    ?>
                </div>
                <div class="wrapper-tags clearfix">
                    <?php
                    $tags = Yii::app()->siteinfo['meta_keywords'];
                    $list_tag = array();
                    if ($tags && $tags != '') {
                        $list_tag = explode(',', $tags);
                    }
                    if (count($list_tag) > 0) {
                        foreach($list_tag as $tag) {
                        ?>
                        <a href="<?php echo Yii::app()->createUrl('search/search/search', array(ClaSite::SEARCH_KEYWORD => $tag)); ?>" class="item-tag-footer"><?php echo $tag ?></a>
                    <?php } } ?>
                </div>
                <div class="coppy-footer">
                    <div class="footer-nd">
                        <?php
                        if (Yii::app()->siteinfo['footercontent']) {
                            echo Yii::app()->siteinfo['footercontent'];
                        }
                        ?>
                    </div>
                </div>
				<div class="designby"><a href="http://tss-software.com.vn/" target="_blank"><?php echo Yii::t('common', 'designby'); ?>: TSS-SOFTWARE</a></div>

            </div>
        </div>
    </div>
</div>
