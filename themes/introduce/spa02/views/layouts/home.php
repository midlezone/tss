
<?php $this->beginContent('//layouts/main'); ?>
<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
<div class="customer">
    <?php
    echo $content;
    ?>
    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1)); ?>
</div>

<?php $this->endContent(); ?>
<style>
    .cont-header{ background: rgba(255,255,255,0);}
</style>
<script>
    $(document).ready(function () {
        if ($(document).scrollTop() > 0) {
            $('.cont-header').addClass('fixed-top-menu');
        }
        $(document).on('scroll', function () {
            if ($(document).scrollTop() > 0) {
                $('.cont-header').addClass('fixed-top-menu');
            } else
            {
                $('.cont-header').removeClass('fixed-top-menu');
            }
        });

    });
</script>
<style>
    .fixed-top-menu{
        box-shadow: 0 0 1em #ccc; 
        background: #a0212c;
        width: 100%;
        position: fixed;
        top: 0;
        transition: all .6s;
    }
</style>