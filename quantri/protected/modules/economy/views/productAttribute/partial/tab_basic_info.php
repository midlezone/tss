        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'name', array('class' => 'span12 col-sm-10')); ?>
                <?php echo $form->error($model, 'name'); ?>
            </div>
        </div>  
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'code', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'code', array('class' => 'span12 col-sm-10')); ?>
                <?php echo $form->error($model, 'code'); ?>
            </div>
        </div>
        <?php
        $attSetpoptions = ProductAttributeSet::getAttributeSetOptions();    
        ?>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'attribute_set_id', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->dropDownList($model, 'attribute_set_id', array('' => Yii::t('attribute','attribute_att_set_select')) + $attSetpoptions, array('class' => 'span12 col-sm-3')); ?>
                <?php echo $form->error($model, 'attribute_set_id'); ?>
            </div>
        </div>
        <div class="control-group form-group">
            <?php echo $form->label($model, 'frontend_input', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->dropDownList($model, 'frontend_input',ProductAttribute::$_dataTypeInput, array('class' => 'span12 col-sm-3')); ?>
                <?php echo $form->error($model, 'frontend_input'); ?>
            </div>
        </div>
        <div class="control-group form-group">
            <?php echo $form->label($model, 'type_option', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->dropDownList($model, 'type_option',ProductAttribute::$_dataTypeOption, array('class' => 'span12 col-sm-3')); ?>
                <?php echo $form->error($model, 'type_option'); ?>
            </div>
        </div>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'default_value', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'default_value', array('class' => 'span12 col-sm-10')); ?>
                <?php echo $form->error($model, 'default_value'); ?>
            </div>
        </div>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'sort_order', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->textField($model, 'sort_order', array('class' => 'span2 col-sm-1 ')); ?>
                <?php echo $form->error($model, 'sort_order',array('class' => 'errorMessage')); ?>
            </div>
        </div>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'is_configurable', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->checkBox($model, 'is_configurable'); ?>
                <?php echo $form->error($model, 'is_configurable'); ?>
                <span class="hint" style="font-size:11px;color:#d19d59;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Chỉ "Màu sắc" và "Kích cỡ" nên tick (Nhớ chọn loại "Lựa chọn nhiều giá trị")</span>
            </div>
        </div>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'is_filterable', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->checkBox($model, 'is_filterable'); ?>
                <?php echo $form->error($model, 'is_filterable'); ?>
            </div>
        </div>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'is_frontend', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->checkBox($model, 'is_frontend'); ?>
                <?php echo $form->error($model, 'is_frontend'); ?>
            </div>
        </div>
        <div class="control-group form-group">
            <?php echo $form->labelEx($model, 'is_system', array('class' => 'col-sm-2 control-label no-padding-left')); ?>
            <div class="controls col-sm-10">
                <?php echo $form->checkBox($model, 'is_system'); ?>
                <?php echo $form->error($model, 'is_system'); ?>
            </div>
        </div>