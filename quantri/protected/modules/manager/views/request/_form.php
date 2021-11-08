<div class="row">
    <div class="col-xs-12 no-padding">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'news-form',
            'htmlOptions' => array('class' => 'form-horizontal'),
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
        ));
        ?>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'name', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'name'); ?>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'email', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'email', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'email'); ?>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'phone', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'phone', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'phone'); ?>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'address', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'address', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'address'); ?>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'trade', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'trade', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'trade'); ?>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'website_reference', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textArea($model, 'website_reference', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'website_reference'); ?>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'color', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php
                $this->widget('common.extensions.spectrum.MSpectrum', array(
                    'model' => $model,
                    'attribute' => 'color',
                    'htmlOptions' => array(
                        'class' => 'form-control',
                    ),
                ));
                ?>
                <?php echo $form->error($model, 'color'); ?>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'description', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textArea($model, 'description', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'description'); ?>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->dropDownList($model, 'status', Requests::getRequestStatus(), array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'status'); ?>
            </div>
        </div>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'theme_id', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'theme_id',array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'theme_id'); ?>
            </div>
        </div>

        <div class="control-group form-group buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('common', 'create') : Yii::t('common', 'update'), array('class' => 'btn btn-info', 'id' => 'savenews')); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->
