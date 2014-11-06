<?php
/* @var $this ShareholdersController */
/* @var $data shareholders */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comp_id')); ?>:</b>
	<?php echo CHtml::encode($data->comp_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shares')); ?>:</b>
	<?php echo CHtml::encode($data->shares); ?>
	<br />


</div>