<div id="footer" class="clearfix">
    <div class="bottom-footer clearfix">
        <div class="row">
            <div class="col-sm-8">
                <div class=" col-sm-7">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                    ?>
                </div>
                <div class="col-sm-5 bantin">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                    ?>
                </div>
            </div>
            <div class="col-sm-4">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK3));
                ?>
            </div>
        </div>
    </div>
    <div class="footer-f clearfix">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK5));
        ?>
    </div>
</div>