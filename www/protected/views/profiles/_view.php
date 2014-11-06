<?php
/* @var $this ProfilesController */
/* @var $data profiles */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comp_id')); ?>:</b>
	<?php echo CHtml::encode($data->comp_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hq_address')); ?>:</b>
	<?php echo CHtml::encode($data->hq_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hq_phone')); ?>:</b>
	<?php echo CHtml::encode($data->hq_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hq_fax')); ?>:</b>
	<?php echo CHtml::encode($data->hq_fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
	<?php echo CHtml::encode($data->website); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('started_operation')); ?>:</b>
	<?php echo CHtml::encode($data->started_operation); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('associated_companies')); ?>:</b>
	<?php echo CHtml::encode($data->associated_companies); ?>
	<br />

	*/ ?>

</div>