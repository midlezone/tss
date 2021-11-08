
<?php $this->beginContent('//layouts/main'); ?>
<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
<?php if (Yii::app()->user->isGuest) { ?>
			<div class="col container">
					<div class="courses_button trans_200"><a href="/dang-nhap">Bắt Đầu Thi</a></div>
			</div> 
  <?php } else { ?>
              <div class="col container">
					<div class="courses_button trans_200"><a href="http://test.levananh.com/thi-nc,6700">Bắt Đầu Thi</a></div>
			</div> 
  <?php } ?>			


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