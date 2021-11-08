<?php $this->beginContent('//layouts/main'); ?>

        <?php echo $content; ?>
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER));
        ?>
        <div class="clear"></div>
        <div class="banner-level2">
            <div class="banner-2">
                <div class="row">
                    <div class="col-md-6">
                        <a href="#"  class="hover-banner"></a>
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
                        ?>
                    </div>
                    <div class="col-md-3">
                        <a href="#"  class="hover-banner"></a>
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2));
                        ?>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="hover-banner"></a>
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3));
                        ?>
                    </div>
                </div>
            </div>
            <div class="banner-2 banner-3">
                <div class="row">

                    <div class="col-md-3">
                        <a href="#" t class="hover-banner"></a>
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK4));
                        ?>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="hover-banner"></a>
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK5));
                        ?>
                    </div>
                    <div class="col-md-6">
                        <a href="#"  class="hover-banner"></a>
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK6));
                        ?>
                    </div>
                </div>
            </div>
        </div>

<?php $this->endContent(); ?>