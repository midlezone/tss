<?php $this->beginContent('//layouts/main'); ?>
<div class="title-product">
    <div>
        <h2>KHÁM PHÁ QUANH BẠN</h2>
    </div>
    <div>
        <p>thời trang và hơn thế nữa ...</p>
    </div>
</div>
<div class="cont">
    <?php echo $content; ?>
    <div class="row">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
        ?>
    </div>
    <div class="row">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2));
        ?>
        
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3));
        ?>
        
    </div>
</div>
<?php $this->endContent(); ?>