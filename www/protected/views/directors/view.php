<?php
/* @var $this DirectorsController */
/* @var $model directors */

$this->breadcrumbs=array(
	'Directors'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List directors', 'url'=>array('index')),
	array('label'=>'Create directors', 'url'=>array('create')),
	array('label'=>'Update directors', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete directors', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage directors', 'url'=>array('admin')),
);
?>

<h1>View directors #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'comp_id',
		'name',
		'job_desc',
	),
)); ?>
