<div class="content clearfix">
    <div class="left">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT)); ?>
    </div>
    <div class="right">
        <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
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
        </div>
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FACEBOOK_COMMENT)); ?>
    </div>
</div>

<div class="featured-services">
    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK6)); ?>
</div>

