<?php
/* @var $this SiteController */
/* @var $data SiteSettings */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->site_id), array('view', 'id'=>$data->site_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_type')); ?>:</b>
	<?php echo CHtml::encode($data->site_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_keywords')); ?>:</b>
	<?php echo CHtml::encode($data->meta_keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_description')); ?>:</b>
	<?php echo CHtml::encode($data->meta_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_logo')); ?>:</b>
	<?php echo CHtml::encode($data->site_logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_title')); ?>:</b>
	<?php echo CHtml::encode($data->site_title); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('expiry_date')); ?>:</b>
	<?php echo CHtml::encode($data->expiry_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_zone')); ?>:</b>
	<?php echo CHtml::encode($data->time_zone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_descriptions')); ?>:</b>
	<?php echo CHtml::encode($data->site_descriptions); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_skin')); ?>:</b>
	<?php echo CHtml::encode($data->site_skin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_email')); ?>:</b>
	<?php echo CHtml::encode($data->admin_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('google_analytics')); ?>:</b>
	<?php echo CHtml::encode($data->google_analytics); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_time')); ?>:</b>
	<?php echo CHtml::encode($data->created_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_time')); ?>:</b>
	<?php echo CHtml::encode($data->modified_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact')); ?>:</b>
	<?php echo CHtml::encode($data->contact); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('footercontent')); ?>:</b>
	<?php echo CHtml::encode($data->footercontent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('domain_default')); ?>:</b>
	<?php echo CHtml::encode($data->domain_default); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('favicon')); ?>:</b>
	<?php echo CHtml::encode($data->favicon); ?>
	<br />

	*/ ?>

</div>