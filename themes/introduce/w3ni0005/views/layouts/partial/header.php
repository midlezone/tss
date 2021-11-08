<div class="header" id="header">
    <div class="bg-top">
        <div class="container clearfix">
            <div class="box-logo">
                <div class="logo">
                    <h1>
                        <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                            <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                            <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                        </a>
                    </h1>
                </div>
            </div><!--end-box-LOGO-->
            <div class="box-banner">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_RIGHT));
                ?>
            </div>
        </div>
    </div> <!--end-bg-top-->

    <div class="menu-top">
        <div class="container clearfix">
            <div class="box-menu">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
                ?>
            </div>    
            <div class="timkiem">
                <div class="search-form">
                    <form method="get" action="<?php echo Yii::app()->createUrl('search/search/search') ?>" class="searchform">
                        <?php
                        $searchtext = 'Màu sơn bạn cần tìm...';
                        $skey = ClaSite::SEARCH_KEYWORD;
                        $keyword = Yii::app()->request->getParam($skey);
                        if (!$keyword)
                            $keyword = '';
                        ?>
                        <div class="clearfix">
                            <input type="text" value="<?php echo $keyword; ?>" name="<?php echo $skey; ?>" placeholder="<?php echo $searchtext; ?>" class="svalue box-search">
                            <input type="submit" class="btnsearch" value="">
                        </div>
                        <script>
                            jQuery(document).ready(function() {
                                jQuery(document).on('submit', '.searchform', function() {
                                    var sv = jQuery(this).find('.svalue').val();
                                    if (sv == '' || sv.length < 2) {
                                        alert('Từ khóa tìm kiếm không đúng. Từ khóa phải có ít nhất 2 ký tự.');
                                        return false;
                                    }
                                });
                            });
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>