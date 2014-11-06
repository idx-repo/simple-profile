<?php
/* @var $this CompaniesController */
/* @var $model companies */

$this->breadcrumbs=array(
	'Companies'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List companies', 'url'=>array('index')),
	array('label'=>'Create companies', 'url'=>array('create')),
	array('label'=>'Update companies', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete companies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage companies', 'url'=>array('admin')),
);
?>

<h1>View companies #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'name',
	),
)); ?>
