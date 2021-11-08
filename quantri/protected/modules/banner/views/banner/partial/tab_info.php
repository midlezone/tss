<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ckeditor/ckeditor.js') ?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        CKEDITOR.replace("Banners_banner_description", {
            height: 400,
            language: '<?php echo Yii::app()->language ?>'
        });
    });
</script>
<div class="control-group form-group">
    <?php echo $form->label($model, 'banner_name', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'banner_name', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'banner_name'); ?>
    </div>
</div>
<?php
$bgroupoptions = Banners::getBannerGroupOptionsArr();
?>
<div class="control-group form-group">
    <?php echo $form->label($model, 'banner_group_id', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php if (!is_array($bgroupoptions['data'])) $bgroupoptions['data'] = array(); ?>
        <?php echo $form->dropDownList($model, 'banner_group_id', array('' => Yii::t('banner', 'selectbannergroup')) + $bgroupoptions['data'], array('class' => 'span12 col-sm-12', 'options' => $bgroupoptions['options'])); ?>
        <?php echo $form->error($model, 'banner_group_id'); ?>
    </div>
</div>

<div class="control-group form-group">
    <?php echo $form->labelEx($model, 'banner_size', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <div class ="col-sm-6" style="padding-right: 20px; padding-left: 0px;">
            <?php echo $form->textField($model, 'banner_width', array('placeholder' => $model->getAttributeLabel('banner_width'), 'class' => 'col-sm-12')); ?>
        </div>
        <?php echo $form->textField($model, 'banner_height', array('placeholder' => $model->getAttributeLabel('banner_height'), 'class' => 'span12 col-sm-6')); ?>
        <?php echo $form->error($model, 'banner_width'); ?>
        <?php echo $form->error($model, 'banner_height'); ?>
    </div>
</div>
<div class="control-group form-group">
    <?php echo CHtml::label(Yii::t('banner', 'banner_src'), '', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->hiddenField($model, 'banner_src', array('class' => 'span12 col-sm-12')); ?>
        <div class="row" style="margin: 10px 0px;">
            <?php if ($model->banner_id && $model->banner_src) { ?>
                <div style="max-height: 200px; overflow: hidden; display: block; margin-bottom: 15px;">
                    <?php $this->renderPartial('partial/banner_view', array('model' => $model)); ?>
                </div>
            <?php } ?>
            <?php echo CHtml::fileField('banner_src', ''); ?>
        </div>
        <?php echo $form->error($model, 'banner_src'); ?>
    </div>

</div>
<div class="control-group form-group">
    <?php echo $form->labelEx($model, 'banner_link', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'banner_link', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'banner_link'); ?>
    </div>
</div>
<div class="control-group form-group">
    <?php echo $form->label($model, 'banner_order', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textField($model, 'banner_order', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'banner_order'); ?>
    </div>
</div>
<div class="control-group form-group">
    <?php echo $form->label($model, 'banner_description', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->textArea($model, 'banner_description', array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'banner_description'); ?>
    </div>
</div>
<div class="control-group form-group">
    <?php echo $form->labelEx($model, 'banner_target', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <?php echo $form->dropDownlist($model, 'banner_target', array_reverse(Menus::getTagetArr()), array('class' => 'span12 col-sm-12')); ?>
        <?php echo $form->error($model, 'banner_target'); ?>
    </div>
</div>
<div class="control-group form-group">
    <?php echo $form->labelEx($model, 'show', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <label>
            <?php echo $form->checkBox($model, 'actived', array('class' => 'ace ace-switch ace-switch-6')); ?>
            <span class="lbl"></span>
        </label>
    </div>
</div>

<div class="control-group form-group">
    <?php echo CHtml::label('Trang hiển thị', '', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
    <div class="controls col-sm-10">
        <p>Bạn muốn hiện thị quảng cáo này tại trang nào thì check box vào trang đó. Mặc định là tất cả trang</p>
        <div class="listcheck">
            <?php
            $checkall = ($model->isNewRecord && !$model->banner_rules || $model->banner_showall ) ? true : false;
            if (!$checkall) {
                $rules = explode(',', $model->banner_rules);
            }
            //
            $pages = Banners::getPageKeyArr();
            $pages = array(Banners::BANNER_SHOWALL_KEY . '' => Yii::t('common', 'all')) + $pages;

            foreach ($pages as $key => $label) {
                $checked = false;
                if (!$checkall) {
                    if (in_array(Banners::getRealPageKey($key), $rules)) {
                        $checked = true;
                    }
                }
                ?>
                <label class="labelcheckpage">
                    <input <?php echo ($checkall || $checked) ? 'checked="checked"' : '' ?> type="checkbox" value="<?php echo $key; ?>" class="checkpage" name="checkpage[]"> <?php echo $label; ?>
                </label>
            <?php } ?>
        </div>
    </div>
</div>