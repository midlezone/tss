
<?php
/* @var $this NewsController */
/* @var $model News */

Yii::app()->clientScript->registerScript('domain', "
$('#domainadd').click(function(){
    if(jQuery.trim(jQuery('#domainid').val())!=''){
        var url = jQuery(this).closest('form').attr('action');
        if(!url)
        return false;
        jQuery.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            data: 'do='+jQuery('#domainid').val(),
            success: function(res){
                if(res.code==200){
                    $('#domain-grid').yiiGridView('update');
                }else{
                    if(res.errors){
                        parseJsonErrors(res.errors,jQuery('#domain-form'));
                    }
                }
            }
        });
    }
});
jQuery(document).on('click','.changedomaindefault',function(){
                var url =jQuery(this).attr('href');
                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    success: function(){
                        $.fn.yiiGridView.update('domain-grid');
                    }
                });
                return false;
            });
");
?>
<p><h2><?php echo Yii::t('domain', 'domain_manager'); ?></h2></p>
<br/>
<div class="form">  
    <h4><?php echo Yii::t('domain', 'domain_add'); ?></h4>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'domain-form',
        'htmlOptions' => array('class' => 'form-horizontal'),
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ));
    ?>
    <div class="input-group" style="width: 50%;">
        <input type="text" id="domainid" class="form-control" placeholder="<?php echo Yii::t('common', 'domain'); ?>">
        <span class="input-group-btn">
            <button id="domainadd" type="button" class="btn btn-sm btn-default">
                <i class="icon-plus bigger-110"></i>
                <?php echo Yii::t('common', 'add'); ?>
            </button>
        </span>

    </div>
    <div class="input-group">
        <?php echo $form->error($domain, 'domain_id'); ?>
    </div>

    <?php $this->endWidget(); ?>
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'domain-grid',
        'dataProvider' => $domain->search(),
        'itemsCssClass' => 'table table-bordered table-hover',
        'filter' => null,
        'columns' => array(
            'domain_id',
            'domain_default' => array(
                'name' => 'domain_default',
                'type' => 'raw',
                'value' => function($data) {
            if ($data->domain_default == Domains::DOMAIN_DEFAULT_YES) {
                return '<i class="icon-check-circle-o"></i>';
            }
            return '<a class="changedomaindefault" href="' . Yii::app()->createUrl("setting/setting/changedomaindefault", array('id' => $data->domain_id)) . '"><i class="icon-circle-o"></i></a>';
        },
                'htmlOptions' => array('style' => 'width: 150px; text-align: center;'),
            ),
            array(
                'class' => 'CButtonColumn',
                'template' => '{delete}',
                'deleteButtonOptions' => array('class' => 'icon-trash'),
                'deleteButtonImageUrl' => false,
                'deleteButtonLabel' => '',
                'buttons' => array(
                    'delete' => array(
                        'url' => 'Yii::app()->createUrl("setting/setting/deletedomain",array("id"=>$data->domain_id))',
                        'visible' => '($data->domain_default!=Domains::DOMAIN_DEFAULT_YES && $data->domain_type!=Domains::DOMAIN_TYPE_NOACTION)?true:false',
                    ),
                ),
            ),
        ),
    ));
    ?>

<p>H?????NG D???N TR??? T??N MI???N RI??NG C???A B???N V??? H??? TH???NG TSS-SOFTWARE.COM.VN</p>
<p>B?????C 1: ????ng nh???p b???ng qu???n tr??? t??n mi???n m?? nh?? cung c???p g???i cho b???n khi b???n mua t??n mi???n 
<p>B?????C 2: Tr??? t??n mi???n v??? ?????a ch??? IP 171.244.17.116 ( Xin li??n h??? ????n v??? cung c???p t??n mi???n ????? h???i c??ch tr??? )</p>
<p>B?????C 3: Nh???p t??n mi???n b???n v??o ?? "Th??m t??n mi???n" ph??a tr??n v?? ch???n "Th??m"</p>
<p>B?????C 4: Click ch???n t??n mi???n ch???y ch??nh th???c</p>
<p>- ?????i t??n mi???n c???p nh???t ?????a ch??? IP ?????n h??? th???ng (Nhanh nh???t 5 ph??t , ch???m nh???t 3 gi??? n???a s??? c?? hi???u l???c)</p>
<p>HOTLINE H??? TR???: 09.09.72.72.88</p>
</div>
