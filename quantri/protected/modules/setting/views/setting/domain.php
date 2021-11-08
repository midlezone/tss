
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

<p>HƯỚNG DẪN TRỎ TÊN MIỀN RIÊNG CỦA BẠN VỀ HỆ THỐNG TSS-SOFTWARE.COM.VN</p>
<p>BƯỚC 1: Đăng nhập bảng quản trị tên miền mà nhà cung cấp gửi cho bạn khi bạn mua tên miền 
<p>BƯỚC 2: Trỏ tên miền về địa chỉ IP 171.244.17.116 ( Xin liên hệ đơn vị cung cấp tên miền để hỏi cách trỏ )</p>
<p>BƯỚC 3: Nhập tên miền bạn vào ô "Thêm tên miền" phía trên và chọn "Thêm"</p>
<p>BƯỚC 4: Click chọn tên miền chạy chính thức</p>
<p>- Đợi tên miền cập nhật địa chỉ IP đến hệ thống (Nhanh nhất 5 phút , chậm nhất 3 giờ nữa sẽ có hiệu lực)</p>
<p>HOTLINE HỖ TRỢ: 09.09.72.72.88</p>
</div>
