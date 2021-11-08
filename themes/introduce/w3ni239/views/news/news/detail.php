<div class="main-content clearfix">
    <div class="box-breadcrumb">
        <?php // $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
        <ul class="breadcrumb">
            <li><a href="<?php echo Yii::t('url', 'tin-tuc-nc,495'); ?>" title="<?php echo $name ?>"><?php echo Yii::t('common', 'product'); ?></a></li>
            <li><a><?php echo $news['news_title']; ?></a></li>
        </ul>
    </div>
    <div class="detail-warper main-content-bg main-content-padding">
        <div class="newsdetail">
            <h1 class="newstitle"><?php echo $news['news_title']; ?></h1>
            <?php if ($news['publicdate']) { ?>
                <p class="newstime"><?php echo date('d/m/Y H:i', $news['publicdate']); ?></p>
            <?php } ?>
            <div class="newsdes">
                <?php
                echo $news['news_desc'];
                ?>
            </div>
            <?php
            $this->renderPartial('partial/tags', array(
                'data_tags' => $news['meta_keywords'],
                'search_type' => ClaSite::SITE_TYPE_NEWS
            ));
            ?>
        </div>
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
        ?>
    </div>
</div>
