
<div class="row">
    <div class="col-xs-12 no-padding">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'files-form',
            'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
        ));
        ?>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'folder_id', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->dropDownList($model, 'folder_id', Folders::getFolderOptionsArr(), array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'folder_id'); ?>
            </div>
        </div>

        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'display_name', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'display_name', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'display_name'); ?>
            </div>
        </div>
        <?php if ($model->isNewRecord) { ?>
            <div class="control-group form-group">
                <?php echo $form->labelEx($model, 'file_src', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
                <div class="controls col-sm-10">
                    <?php echo $form->hiddenField($model, 'file_src', array('class' => 'span12 col-sm-12')); ?>
                    <div class="row" style="margin: 10px 0px;">
                        <?php echo CHtml::fileField('file_src', ''); ?>
                    </div>
                    <?php echo $form->error($model, 'file_src'); ?>
                </div>
            </div>
        <?php } ?>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'description', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textArea($model, 'description', array('class' => 'span12 col-sm-12')); ?>
                <?php echo $form->error($model, 'description'); ?>
            </div>
        </div></br></br></br></br>
		
		 <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'Ngày Ban Hành', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php
                $this->widget('common.extensions.EJuiDateTimePicker.EJuiDateTimePicker', array(
                    'model' => $model, //Model object
                    'name' => 'Files[publicdate]', //attribute name
                    'mode' => 'datetime', //use "time","date" or "datetime" (default)
                    'value' => ((int) $model->publicdate > 0 ) ? date('d-m-Y H:i:s', (int) $model->publicdate) : date('d-m-Y H:i:s'),
                    'language' => 'vi',
                    'options' => array(
                        'showSecond' => true,
                        'dateFormat' => 'dd-mm-yy',
                        'timeFormat' => 'HH:mm:ss',
                        'controlType' => 'select',
                        'stepHour' => 1,
                        'stepMinute' => 1,
                        'stepSecond' => 1,
                        //'showOn' => 'button',
                        'showSecond' => true,
                        'changeMonth' => true,
                        'changeYear' => false,
                        'tabularLevel' => null,
                    //'addSliderAccess' => true,
                    //'sliderAccessArgs' => array('touchonly' => false),
                    ), // jquery plugin options
                    'htmlOptions' => array(
                        'class' => 'span12 col-sm-12',
                    )
                ));
                ?>
				</div>
        </div>
		
        <div class="control-group form-group buttons" style="border-bottom: none;">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('file', 'file_create') : Yii::t('file', 'file_edit'), array('class' => 'btn btn-info', 'id' => 'savebanner')); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->