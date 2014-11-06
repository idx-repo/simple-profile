<?php
/* @var $this CommisionersController */
/* @var $model commisioners */

$this->breadcrumbs=array(
	'Commisioners'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List commisioners', 'url'=>array('index')),
	array('label'=>'Create commisioners', 'url'=>array('create')),
	array('label'=>'Update commisioners', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete commisioners', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage commisioners', 'url'=>array('admin')),
);
?>

<h1>View commisioners #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'comp_id',
		'name',
		'job_desc',
	),
)); ?>
