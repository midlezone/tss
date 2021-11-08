<?php
$this->beginContent('//layouts/main');
?>
<div class="container">
    <div class="ads-banner-left">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT_OUT)); ?>
    </div>
    <div class="ads-banner-right">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_RIGHT_OUT)); ?>
    </div>
    <div class="top-banner">
        <div class="row">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1)); ?>
        </div>
    </div>
    <div class="option-color">
        <div class="row">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2)); ?>
        </div>
    </div>
    <div class="featured-products">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3)); ?>
    </div>
    <div class="bottom-main">
        <div class="row">
            <div class="col-xs-4">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK4)); ?>
            </div>
            <div class="col-xs-4">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK5)); ?>
            </div>
            <div class="col-xs-4">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK6)); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var width_window = $(window).width();
    var width_element = $('.ads-banner-left').width();
    var position_out = ((width_window - 1080) / 2) - width_element;
    var heightdiscount = 35 + 446 + 40;
    var height_container = 1401 - 200;
    var height_stop = heightdiscount + height_container;
    $(document).ready(function() {
        $(window).scroll(function() {
            var scroll_top = $(document).scrollTop();
            if(scroll_top > heightdiscount && scroll_top < height_stop) {
                $('.ads-banner-left').css({
                    'position':'fixed',
                    'top': '30px',
                    'left': position_out
                });
                $('.ads-banner-right').css({
                    'position':'fixed',
                    'top': '30px',
                    'right': position_out
                });
            } else if(scroll_top > height_stop) {
                $('.ads-banner-left').css({
                    'position':'absolute',
                    'top': height_container,
                    'left': '-130px'
                });
                $('.ads-banner-right').css({
                    'position':'absolute',
                    'top': height_container,
                    'right': '-130px'
                });
            } else {
                $('.ads-banner-left').css({
                    'position':'absolute',
                    'top': '0px',
                    'left': '-130px'
                });
                $('.ads-banner-right').css({
                    'position':'absolute',
                    'top': '0px',
                    'right': '-130px'
                });
            }
        });
    });
</script>
<?php
echo $content;
$this->endContent();
