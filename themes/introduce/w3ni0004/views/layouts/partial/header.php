<div id="header" class="header">
    <div class="container">
        <div class="box-header clearfix">
            <div class="box-logo">
                <a href="<?php echo Yii::app()->homeUrl; ?>">
                    <h1 class="logo">
                        <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                    </h1>
                </a> 
            </div>
            <div class="search-form clearfix">
                <form method="get" action="<?php echo Yii::app()->createUrl('search/search/search') ?>" class="searchform">
                    <?php
                    $searchtext = Yii::t('common', 'search');
                    $skey = ClaSite::SEARCH_KEYWORD;
                    $keyword = Yii::app()->request->getParam($skey);
                    if (!$keyword)
                        $keyword = '';
                    ?>
                    <input class="svalue box-search" type="text" value="<?php echo $keyword; ?>" name="<?php echo $skey; ?>" placeholder="<?php echo $searchtext . '...'; ?>">
                    <input type="submit" value="<?php echo $searchtext; ?>" class="btnsearch">
                    <script>
                        jQuery(document).ready(function() {
                            jQuery(document).on('submit', '.searchform', function() {
                                var sv = jQuery(this).find('.svalue').val();
                                if (sv == '' || sv.length < 2) {
                                    alert('<?php echo Yii::t('common', 'search_keyword_invalid') ?>');
                                    return false;
                                }
                            });
                        });
                    </script>
                </form>
            </div>
        </div>
    </div>
    <div class="menu-top">
        <div class="container">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
            ?>
        </div>
    </div><!--end-nav-->
</div>