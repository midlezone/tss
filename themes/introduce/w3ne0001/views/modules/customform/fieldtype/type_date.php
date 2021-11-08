<li class="form_li">
    <span><?php echo $field['label']; ?></span><br />
    <?php
    $this->widget('application.widgets.CJuiDateTimePicker.CJuiDateTimePicker', array(
        'mode' => 'date',
        'name' => $field['cid'],
        'options' => array(
            'buttonImageOnly' => true,
            'dateFormat' => $field['field_options']['dateformat'],
            'changeMonth' => true,
            'changeYear' => true,
            'tabularLevel' => null,
            'yearRange' => '1970:' . (date('Y') + 20),
        ),
        'language' => '',
        'htmlOptions' => array(
            //'style' => 'color: #333',
            'autocomplete' => 'on',
            'class' => 'input-text  format_date',
        ),
    ));
    ?>
</li>