<div class="row">
    <div class="col-sm-8">
        <div class="left">
            <div class="newsdetail">
                <h1 class="newstitle"><?php echo $news['news_title']; ?></h1>
                <?php if ($news['publicdate']) { ?>
                    <p class="newstime"><?php echo date('d/m/Y H:i', $news['publicdate']); ?></p>
                <?php } ?>
                <div class="newsdes">
                    <?php
                    echo ClaWeb::replaceWebText($news['news_desc']);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="right">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_RIGHT));
            ?>
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK7));
            ?>
        </div>
    </div>
</div>


