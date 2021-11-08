<?php
/* @var $this SiteController */
/* @var $model SiteSettings */

$this->breadcrumbs=array(
	'Site Settings'=>array('index'),
	$model->site_id,
);

$this->menu=array(
	array('label'=>'List SiteSettings', 'url'=>array('index')),
	array('label'=>'Create SiteSettings', 'url'=>array('create')),
	array('label'=>'Update SiteSettings', 'url'=>array('update', 'id'=>$model->site_id)),
	array('label'=>'Delete SiteSettings', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->site_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SiteSettings', 'url'=>array('admin')),
);
?>

<h1>View SiteSettings #<?php echo $model->site_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'site_id',
		'site_type',
		'user_id',
		'meta_keywords',
		'meta_description',
		'site_logo',
		'site_title',
		'expiry_date',
		'time_zone',
		'site_descriptions',
		'site_skin',
		'admin_email',
		'google_analytics',
		'created_time',
		'modified_time',
		'contact',
		'footercontent',
		'domain_default',
		'favicon',
	),
)); ?>
