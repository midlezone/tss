<?php $this->beginContent('//layouts/main'); ?>
<div class="row well animated fadeOutDown" data-sb="fadeInDown" data-sb-hide="fadeOutDown">
    <div class=" col-xs-12 col-sm-7 col-md-7">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
        ?>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-5">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2));
        ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 fix ">
        <?php
        echo $content;
        ?>
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
        ?>
    </div>
</div>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/story-box.min.js"></script>
<?php $this->endContent(); ?>